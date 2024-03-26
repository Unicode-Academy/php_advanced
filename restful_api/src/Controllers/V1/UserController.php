<?php

namespace App\Controllers\V1;

use App\Models\User;
use Rakit\Validation\Validator;

class UserController
{
    public function index()
    {
        $user = new User;
        $users = $user->get();
        return successResponse(data: $users);
    }

    public function find($id)
    {
        return successResponse(data: [$id], status: 201);
    }

    public function store()
    {
        $validator = new Validator;
        $validator->setMessages([
            'required' => ':attribute bắt buộc phải nhập',
            'email:email' => ':attribute phải là định dạng email',
            'min' => ':attribute phải từ :min ký tự',
        ]);
        $validation = $validator->make(input()->all(), [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                function ($email) {
                    $user = new User;
                    if ($user->existEmail($email)) {
                        return ":attribute đã tồn tại trên hệ thống";
                    }
                    return true;
                },
            ],
            'password' => 'required|min:6',
            'status' => [function ($value) {
                if ($value == 'true' || $value == 'false' || is_bool($value)) {
                    return true;
                }
                return ':attribute không hợp lệ';
            }],
        ]);
        $validation->setAliases([
            'name' => 'Tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'status' => 'Trạng thái',
        ]);
        $validation->validate();
        if ($validation->fails()) {
            $errors = $validation->errors();
            return errorResponse(
                status: 400,
                message: 'Bad Request',
                errors: $errors->firstOfAll()
            );
        }
        $data = [
            'name' => input('name'),
            'email' => input('email'),
            'password' => password_hash(input('password'), PASSWORD_DEFAULT),
            'status' => input('status') == 'true',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $user = (new User)->create($data);
        return successResponse(data: $user, status: 201);
    }
}