<?php

namespace App\Controllers\V1;

use Error;
use App\Models\User;
use League\Fractal\Manager;
use Rakit\Validation\Validator;
use League\Fractal\Resource\Item;
use App\Transformers\UserTransform;
use App\Transformers\UserTransformer;
use League\Fractal\Resource\Collection;
use Requtize\QueryBuilder\Exception\Exception;

class UserController
{
    private $fractal;
    public function __construct()
    {
        $this->fractal = new Manager();
    }
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

            // $userTransformer = new UserTransformer($users);
            $userTransformer = new Collection($users, new UserTransform);

            return successResponse(data: $this->fractal->createData($userTransformer), meta: $limit ? [
                'current_page' => (int) $page,
                'total_rows' => (int) $count,
                'total_pages' => ceil($count / $limit),
            ] : []);
        } catch (Exception $e) {
            return errorResponse(
                status: 500,
                message: 'Server Error',

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
            // $userTransformer = new UserTransformer($user);
            $userTransformer = new Item($user, new UserTransform);

            return successResponse(data: $this->fractal->createData($userTransformer));
        } catch (Exception $e) {
            return errorResponse(
                status: 500,
                message: 'Server Error',

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
        return successResponse(data: new UserTransformer($user), status: 201);
    }

    public function update($id)
    {
        $method = request()->getMethod();

        return $method === 'put' ? $this->updatePut($id) : $this->updatePatch($id);
    }

    private function updatePatch($id)
    {
        $validator = new Validator;
        $validator->setMessages([
            'required' => ':attribute bắt buộc phải nhập',
            'email:email' => ':attribute phải là định dạng email',
            'min' => ':attribute phải từ :min ký tự',
        ]);
        $rules = [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                function ($email) use ($id) {
                    $user = new User;
                    if ($user->existEmail($email, $id)) {
                        return ":attribute đã tồn tại trên hệ thống";
                    }
                    return true;
                },
            ],
            'status' => [function ($value) {
                if ($value == 'true' || $value == 'false' || is_bool($value)) {
                    return true;
                }
                return ':attribute không hợp lệ';
            }],
        ];
        $data = [];
        if (input('password')) {
            $rules['password'] = 'min:6';
            $data['password'] = password_hash(input('password'), PASSWORD_DEFAULT);
        }

        $validation = $validator->make(input()->all(), $rules);
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
        $data = array_merge($data, [
            'name' => input('name'),
            'email' => input('email'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        if (input('status') == 'true' || input('status') == 'false') {
            $data['status'] = input('status') == 'true';
        }
        //Update
        try {
            $model = new User();
            $status = $model->update($id, $data);
            if ($status) {
                $user = $model->getOne($id);
                return successResponse(data: new UserTransformer($user));
            }

            throw new Error("Server Error");

        } catch (Exeption $e) {
            return errorResponse(500, "Server Error");
        } catch (Error $e) {
            return errorResponse(500, $e->getMessage());
        }

    }

    private function updatePut($id)
    {
        /*
        - Kiểm tra xem trường nào được gửi lên
        - Xóa dữ liệu của các trường còn lại trên Database
         */
        $model = new User();

        $validator = new Validator;
        $validator->setMessages([
            'required' => ':attribute bắt buộc phải nhập',
            'email:email' => ':attribute phải là định dạng email',
            'min' => ':attribute phải từ :min ký tự',
        ]);
        $rules = [];
        $data = [
            'name' => null,
            'email' => null,
            'status' => null,
        ];

        if (input('name')) {
            $rules['name'] = 'min:2';
            $data['name'] = input('name');
        }

        if (input('email')) {
            $rules['email'] = [
                'required',
                'email',
                function ($email) use ($id) {
                    $user = new User;
                    if ($user->existEmail($email, $id)) {
                        return ":attribute đã tồn tại trên hệ thống";
                    }
                    return true;
                },
            ];
            $data['email'] = input('email');
        }

        if (input('status') == 'true' || input('status') == 'false') {
            $data['status'] = input('status') == 'true';
        }

        if (input('password')) {
            $rules['password'] = 'min:6';
            $data['password'] = password_hash(input('password'), PASSWORD_DEFAULT);
        }

        $validation = $validator->make(input()->all(), $rules);
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

        //Update
        try {
            $model = new User();
            $status = $model->update($id, $data);
            if ($status) {
                $user = $model->getOne($id);
                return successResponse(data: new UserTransformer($user));
            }

            throw new Error("Server Error");

        } catch (Exeption $e) {
            return errorResponse(500, "Server Error");
        } catch (Error $e) {
            return errorResponse(500, $e->getMessage());
        }

    }

    public function delete($id)
    {
        try {
            $model = new User;
            $user = $model->getOne($id);
            if (!$user) {
                throw new Error('User Not found');
            }

            $status = $model->delete($id);
            if ($status) {
                return successResponse(
                    data: new UserTransformer($user)
                );
            }

            throw new Error("Server Error");

        } catch (Exception $e) {
            return errorResponse(
                status: 500,
                message: 'Server Error',
            );
        } catch (Error $e) {
            return errorResponse(
                status: 404,
                message: $e->getMessage(),
            );
        }
    }

    public function deletes()
    {
        /*
        Header
        Query Params
        Body
         */
        $ids = input('ids');
        if (!$ids || !is_array($ids)) {
            return errorResponse(status: 400, message: "Bad Request");
        }

        $model = new User();
        try {
            $status = $model->deletes($ids);
            if ($status) {
                return successResponse(data: $ids);
            }

            throw new Error("Server Error");
        } catch (Exception $e) {
            return errorResponse(
                status: 500,
                message: 'Server Error',
            );
        } catch (Error $e) {
            return errorResponse(
                status: 500,
                message: 'Server Error',
            );
        }

    }
}