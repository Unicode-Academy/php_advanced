<?php
//UserController Controller

use LDAP\Result;

class UserController extends Controller
{

    private $data = [];
    private $userModel;
    private $groupModel;
    private $config = [];

    public function __construct()
    {
        global $config;
        $this->config = $config['app'];
        $this->userModel = $this->model('User');
        $this->groupModel = $this->model('Group');
    }

    public function index()
    {
        $request = new Request();
        $query = $request->getFields();

        $this->data['body'] = 'users/index';
        $this->data['dataView']['pageTitle'] = 'Quản lý người dùng';

        $filters = [];

        if (!empty($query)) {
            extract($query);

            if (isset($status) && ($status == 'active' || $status == 'inactive')) {
                $filters['status'] = $status == 'active' ? 1 : 0;
            }

            if (!empty($group_id)) {
                $filters['group_id'] = $group_id;
            }
        }

        $userPaginate = $this->userModel->getUsers($filters, $keyword ?? '', $this->config['page_limit']);

        $users = $userPaginate['data'];

        $links = $userPaginate['link'];

        $groups = $this->groupModel->getGroups();

        $this->data['dataView']['users'] = $users;
        $this->data['dataView']['groups'] = $groups;
        $this->data['dataView']['request'] = $request;
        $this->data['dataView']['links'] = $links;
        $this->data['msg'] = Session::flash('msg');
        $this->data['msgType'] = Session::flash('msg_type');

        $this->render('layouts/layout', $this->data);
    }

    public function create()
    {
        $this->data['body'] = 'users/add';
        $this->data['dataView']['pageTitle'] = 'Thêm người dùng';
        $groups = $this->groupModel->getGroups();
        $this->data['dataView']['groups'] = $groups;
        $this->data['msg'] = Session::flash('msg');
        $this->data['msgType'] = Session::flash('msg_type');
        $this->render('layouts/layout', $this->data);
    }

    public function store()
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
            'status' => 'callback_checkStatus',
            'group_id' => 'callback_checkGroup'
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
            'status.callback_checkStatus' => 'Trạng thái không hợp lệ',
            'group_id.callback_checkGroup' => 'Nhóm không hợp lệ',
        ];
        $request->rules($rules);
        $request->message($messages);

        if (!$request->validate()) {
            Session::flash('msg', 'Vui lòng kiểm tra thông tin');
            Session::flash('msg_type', 'error');
            return (new Response())->redirect('/users/create');
        }


        $body = $request->getFields();
        unset($body['confirm_password']);
        $body['password'] = Hash::make($body['password']);
        $status = $this->userModel->addUser($body);
        if ($status) {
            Session::flash('msg', 'Thêm người dùng thành công');
            Session::flash('msg_type', 'success');
            return (new Response())->redirect('/users');
        }

        Session::flash('msg', 'Lỗi máy chủ. Vui lòng thử lại sau');
        Session::flash('msg_type', 'error');
        return (new Response())->redirect('/users/create');
    }

    public function edit($id)
    {
        $user = $this->userModel->getUser($id);
        if (!$user) {
            Session::flash('msg', 'Người dùng không tồn tại');
            Session::flash('msg_type', 'error');
            return (new Response())->redirect('/users');
        }

        $this->data['body'] = 'users/edit';
        $this->data['dataView']['pageTitle'] = 'Cập nhật người dùng';
        $groups = $this->groupModel->getGroups();
        $this->data['dataView']['groups'] = $groups;
        $this->data['dataView']['user'] = $user;
        $this->data['dataView']['id'] = $id;
        $this->data['msg'] = Session::flash('msg');
        $this->data['msgType'] = Session::flash('msg_type');
        $this->render('layouts/layout', $this->data);
    }

    public function update($id)
    {
        $request = new Request();
        if (!$request->isPost()) {
            echo 'Not Allow Method';
            return;
        }
        $body = $request->getFields();
        //Validate Form
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users:email:id=' . $id,
            //'password' => 'required|min:6',
            //'confirm_password' => 'required|callback_checkSamePassword',
            'status' => 'callback_checkStatus',
            'group_id' => 'callback_checkGroup'
        ];

        $messages = [
            'name.required' => 'Tên bắt buộc phải nhập',
            'email.required' => 'Email bắt buộc phải nhập',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại trên hệ thống',
            //'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải từ :min ký tự',
            'confirm_password.required' => 'Nhập lại mật khẩu không được để trống',
            'confirm_password.callback_checkSamePassword' => 'Nhập lại mật khẩu không khớp',
            'status.callback_checkStatus' => 'Trạng thái không hợp lệ',
            'group_id.callback_checkGroup' => 'Nhóm không hợp lệ',
        ];

        if ($body['password']) {
            $rules['password'] = ':min';
            $rules['confirm_password'] = 'required|callback_checkSamePassword';
        }

        $request->rules($rules);
        $request->message($messages);

        if (!$request->validate()) {
            Session::flash('msg', 'Vui lòng kiểm tra thông tin');
            Session::flash('msg_type', 'error');
            return (new Response())->redirect('/users/edit/' . $id);
        }
        //Xử lý update
        $data = $body;
        unset($data['confirm_password']);
        unset($data['password']);
        if (!empty($body['password'])) {
            $data['password'] = Hash::make($body['password']);
        }

        $status = $this->userModel->updateUser($data, $id);

        if ($status) {
            Session::flash('msg', 'Cập nhật người dùng thành công');
            Session::flash('msg_type', 'success');
        } else {
            Session::flash('msg', 'Lỗi máy chủ. Vui lòng thử lại sau');
            Session::flash('msg_type', 'error');
        }

        return (new Response())->redirect('/users/edit/' . $id);
    }

    public function checkSamePassword($value)
    {
        $request = new Request();
        $body = $request->getFields();
        if ($body['password'] == $value) {
            return true;
        }
        return false;
    }

    public function checkStatus($value)
    {
        return $value == 0 || $value == 1;
    }

    public function checkGroup($value)
    {
        return filter_var($value, FILTER_VALIDATE_INT, [
            'options' => ['min_range' => 1]
        ]);
    }

    public function deletes()
    {
        $request = new Request();
        $response = new Response();
        if ($request->isPost()) {
            $body = $request->getFields();
            if (empty($body['ids'])) {
                //Gắn thông báo vào flash
                Session::flash('msg', 'Vui lòng chọn người cần xóa');
                Session::flash('msg_type', 'error');
                return $response->redirect('/users');
            }
            $ids = explode(',', $body['ids']);
            $this->userModel->deletes($ids);
            Session::flash('msg', 'Xóa người dùng thành công');
            Session::flash('msg_type', 'success');

            return $response->redirect('/users');;
        }
        echo "Method not support";
    }
}
