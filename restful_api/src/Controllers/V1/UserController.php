<?php

namespace App\Controllers\V1;

use App\Models\User;
use Error;
use Rakit\Validation\Validator;
use Requtize\QueryBuilder\Exception\Exception;

class UserController
{
    public function index()
    {
        $sort = input('sort') ?? 'id';
        $order = input('order') ?? 'asc';
        $status = input('status');
        $query = input('query');
        $page = input('page') ?? 1;
        $limit = input('limit');
        $user = new User;
        try {
            $offset = 0;
            if ($limit) {
                $offset = ($page - 1) * $limit;
            }
            $users = $user->get(
                compact('sort', 'order', 'status', 'query', 'page', 'limit', 'offset')
            );
            $count = $user->getCount(compact('sort', 'order', 'status', 'query', 'page'));

            return successResponse(data: $users, meta: $limit ? [
                'current_page' => (int) $page,
                'total_rows' => (int) $count,
                'total_pages' => ceil($count / $limit),
            ] : []);
        } catch (Exception $e) {
            return errorResponse(
                status: 500,
                message: 'Server Error',
                errors: $e->getMessage()
            );
        }

    }

    public function find($id)
    {
        try {
            $user = (new User)->getOne($id);
            if (!$user) {
                throw new Error('User Not found');
            }
            return successResponse(data: $user);
        } catch (Exception $e) {
            return errorResponse(
                status: 500,
                message: 'Server Error',
                errors: $e->getMessage()
            );
        } catch (Error $e) {
            return errorResponse(
                status: 404,
                message: $e->getMessage(),
            );
        }

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
