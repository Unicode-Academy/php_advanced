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
                if (!$user) {
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
                        return $response->redirect('/');
                    }
                }
            }

            return $response->redirect('/auth/login');
        }
        echo "Method " . strtoupper($request->getMethod()) . " not support";
    }

    public function register()
    {
        $this->data['body'] = 'auth/register';
        $this->data['dataView']['pageTitle'] = 'Đăng ký tài khoản';
        $this->render('layouts/auth', $this->data);
    }
}
