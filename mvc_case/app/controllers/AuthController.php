<?php
//AuthController Controller
class AuthController extends Controller
{

    private $data = [];
    private $userModel;

    public function __construct()
    {
        //construct
        $this->userModel = $this->model('User');
    }

    public function login()
    {
        $this->data['body'] = 'auth/login';
        $this->data['dataView']['pageTitle'] = 'Đăng nhập hệ thống';
        $this->data['msg'] = Session::flash('msg');
        $this->data['msgType'] = Session::flash('msg_type');
        $this->render('layouts/auth', $this->data);
    }

    public function handleLogin()
    {
        $request = new Request();
        $response = new Response();
        if ($request->isPost()) {
            $body = $request->getFields();
            if (empty($body['email']) || empty($body['password'])) {
                Session::flash('msg', 'Vui lòng nhập email và mật khẩu');
                Session::flash('msg_type', 'error');
            } else {
                $user = $this->userModel->getUser($body['email'], 'email');
                if (!$user || !$user['status']) {
                    Session::flash('msg', 'Email hoặc mật khẩu không chính xác');
                    Session::flash('msg_type', 'error');
                } else {
                    $passwordHash = $user['password'];
                    $verifyStatus = Hash::check($body['password'], $passwordHash);
                    if (!$verifyStatus) {
                        Session::flash('msg', 'Email hoặc mật khẩu không chính xác');
                        Session::flash('msg_type', 'error');
                    } else {
                        Session::data('user_login', $user);
                        $this->userModel->updateUser([
                            'session_id' => Session::id(),
                        ], $user['id']);

                        return $response->redirect('/');
                    }
                }
            }

            return $response->redirect('/auth/login');
        }
        echo "Method " . strtoupper($request->getMethod()) . " not support";
    }

    public function logout()
    {
        $response = new Response();
        Session::delete('user_login');
        Session::flash('msg', 'Đăng xuất thành công');
        Session::flash('msg_type', 'success');
        return $response->redirect('/auth/login');
    }

    public function register()
    {

        $this->data['body'] = 'auth/register';
        $this->data['dataView']['pageTitle'] = 'Đăng ký tài khoản';
        $this->data['msg'] = Session::flash('msg');
        $this->data['msgType'] = Session::flash('msg_type');
        $this->render('layouts/auth', $this->data);
    }

    public function handleRegister()
    {
        $request = new Request();
        if (!$request->isPost()) {
            echo 'Not Allow Method';
            return;
        }

        //Validate Form
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users:email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|callback_checkSamePassword',
        ];

        $messages = [
            'name.required' => 'Tên bắt buộc phải nhập',
            'email.required' => 'Email bắt buộc phải nhập',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại trên hệ thống',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải từ :min ký tự',
            'confirm_password.required' => 'Nhập lại mật khẩu không được để trống',
            'confirm_password.callback_checkSamePassword' => 'Nhập lại mật khẩu không khớp',
        ];
        $request->rules($rules);
        $request->message($messages);

        if (!$request->validate()) {
            Session::flash('msg', 'Vui lòng kiểm tra thông tin');
            Session::flash('msg_type', 'error');
            return (new Response())->redirect('/auth/register');
        }

        $body = $request->getFields();
        unset($body['confirm_password']);
        $body['password'] = Hash::make($body['password']);
        $body['group_id'] = 5;
        $status = $this->userModel->addUser($body);
        if ($status) {
            $userId = $this->userModel->getLastUserId();

            Session::data('user_active', $userId);
            //Tạo active token
            $activeToken = md5(uniqid()); //32 ký tự
            //Update active token vào bảng user

            $this->userModel->updateUser([
                'active_token' => $activeToken,
                'updated_at' => date('Y-m-d H:i:s'),
            ], $userId);

            //Tạo link kích hoạt
            $linkActive = _WEB_ROOT . '/auth/active/?token=' . $activeToken;

            //Gửi email
            $name = $body["name"];
            $subject = "$name hãy kích hoạt tài khoản";
            $content = <<<EOT
                <p>Chào bạn: $name</p>
                <p>Cảm ơn bạn đã đăng ký tài khoản trên website của chúng tôi</p>
                <p>Để tiếp tục sử dụng. Vui lòng click vào link dưới đây để kích hoạt tài khoản</p>
                <p>$linkActive</p>
                <p>Unicode Academy</p>
            EOT;
            Mail::send($body['email'], $subject, $content);

            return (new Response())->redirect('/auth/active-account');
        }

        Session::flash('msg', 'Lỗi máy chủ. Vui lòng thử lại sau');
        Session::flash('msg_type', 'error');
        return (new Response())->redirect('/auth/register');
    }

    public function showActive()
    {
        if (!Session::data('user_active')) {
            return (new Response())->redirect('/auth/register');
        }
        $this->data['body'] = 'auth/active-notice';
        $this->data['dataView']['pageTitle'] = 'Kích hoạt tài khoản';
        $this->data['msg'] = Session::flash('msg');
        $this->data['msgType'] = Session::flash('msg_type');
        $this->render('layouts/auth', $this->data);
    }

    public function active()
    {
        $request = new Request();
        $query = $request->getFields();
        if (!empty($query['token'])) {
            $token = $query['token'];
            $user = $this->userModel->getUser($token, 'active_token');
            if (empty($user)) {
                $this->data['dataView']['message'] = 'Liên kết không tồn tại hoặc đã hết hạn';
                $this->data['dataView']['type'] = 'error';
            } else {
                $this->userModel->updateUser([
                    'status' => 1,
                    'active_token' => null,
                    'updated_at' => date('Y-m-d H:i:s'),
                ], $user['id']);
                Session::delete('user_active');
                $this->data['dataView']['message'] = 'Kích hoạt tài khoản thành công';
                $this->data['dataView']['type'] = 'success';
            }
        }

        $this->data['body'] = 'auth/active-result';
        $this->data['dataView']['pageTitle'] = 'Kích hoạt tài khoản';
        $this->render('layouts/auth', $this->data);
    }

    public function resendActive()
    {
        $request = new Request;
        if ($request->isPost()) {
            $userId = Session::data('user_active');

            $user = $this->userModel->getUser($userId);

            //Tạo active token
            $activeToken = md5(uniqid()); //32 ký tự
            //Update active token vào bảng user

            $this->userModel->updateUser([
                'active_token' => $activeToken,
                'updated_at' => date('Y-m-d H:i:s'),
            ], $userId);

            //Tạo link kích hoạt
            $linkActive = _WEB_ROOT . '/auth/active/?token=' . $activeToken;

            //Gửi email
            $name = $user["name"];
            $subject = "$name hãy kích hoạt tài khoản";
            $content = <<<EOT
                <p>Chào bạn: $name</p>
                <p>Cảm ơn bạn đã đăng ký tài khoản trên website của chúng tôi</p>
                <p>Để tiếp tục sử dụng. Vui lòng click vào link dưới đây để kích hoạt tài khoản</p>
                <p>$linkActive</p>
                <p>Unicode Academy</p>
            EOT;
            Mail::send($user['email'], $subject, $content);

            Session::flash('msg', 'Đã gửi lại email kích hoạt thành công');
            Session::flash('msg_type', 'success');

            return (new Response)->redirect('/auth/active-account');
        }
        echo 'Method ' . strtoupper($request->getMethod()) . ' not support';
    }

    public function forgotPassword()
    {
        $this->data['body'] = 'auth/forgot-password';
        $this->data['dataView']['pageTitle'] = 'Lấy lại mật khẩu';
        $this->data['msg'] = Session::flash('msg');
        $this->data['msgType'] = Session::flash('msg_type');
        $this->render('layouts/auth', $this->data);

    }

    public function handleForgotPassword()
    {
        $request = new Request();
        $response = new Response();
        if ($request->isPost()) {
            $body = $request->getFields();
            if (empty($body['email'])) {
                Session::flash('msg', 'Vui lòng nhập email để lấy lại mật khẩu');
                Session::flash('msg_type', 'error');
            } else {
                $user = $this->userModel->getUser($body['email'], 'email');
                if (!$user || !$user['status']) {
                    Session::flash('msg', 'Email không tồn tại trên hệ thống');
                    Session::flash('msg_type', 'error');
                } else {
                    $userId = $user['id'];

                    //Tạo reset token
                    $resetToken = md5(uniqid()); //32 ký tự
                    //Update reset token vào bảng user

                    $this->userModel->updateUser([
                        'reset_token' => $resetToken,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ], $userId);

                    //Tạo link đặt lại mật khẩu
                    $linkReset = _WEB_ROOT . '/auth/reset/?token=' . $resetToken;

                    //Gửi email
                    $name = $user["name"];
                    $subject = "Yêu cầu đặt lại mật khẩu của bạn";
                    $content = <<<EOT
                        <p>Chào bạn: $name</p>
                        <p>Chúng tôi có nhận được yêu cầu đặt lại mật khẩu</p>
                        <p>Để xác nhận đây là yêu cầu của bạn. Vui lòng click vào link dưới đây để kích hoạt tài khoản</p>
                        <p>$linkReset</p>
                        <p>Unicode Academy</p>
                    EOT;
                    Mail::send($user['email'], $subject, $content);

                    Session::flash('msg', 'Vui lòng kiểm tra email để đặt lại mật khẩu');
                    Session::flash('msg_type', 'success');

                }
            }

            return (new Response())->redirect('/auth/forgot-password');
        }
        echo "Method " . strtoupper($request->getMethod()) . " not support";
    }
}

/*
Chức năng quên mật khẩu
1. Hiển thị form để người dùng nhập email
2. Kiểm tra email có hợp lệ hay không? --> Tồn tại trong Database
3. Tạo token
4. Gửi email kèm link đặt lại mật khẩu

Chức năng đặt lại mật khẩu
1. Người dùng click vào link trong email
2. Kiểm tra token có tồn tại và còn hạn trong Database hay không?
3. Hiển thị form đặt lại mật khẩu: Mật khẩu mới, nhập lại mật khẩu mới
4. Xử lý cập nhật lại mật khẩu
5. Gửi email thông báo
 */