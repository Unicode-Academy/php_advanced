<?php
namespace App\Controllers\V1;

use App\Models\BlacklistToken;
use App\Models\RefreshToken;
use App\Models\User;
use App\Transformers\UserTransformer;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Rakit\Validation\Validator;
use Requtize\QueryBuilder\Exception\Exception;
use System\Core\Auth;

class AuthController
{
    public function login()
    {
        $email = input('email');
        $password = input('password');
        if (!$email || !$password) {
            return errorResponse(status: 400, message: "Vui lòng nhập email và mật khẩu");
        }

        $userModel = new User;
        $user = $userModel->getOne($email, 'email');
        if (!$user) {
            return errorResponse(status: 404, message: "Tài khoản không tồn tại");
        }

        $passwordHash = $user->password;

        if (!password_verify($password, $passwordHash)) {
            return errorResponse(status: 401, message: "Mật khẩu không chính xác");
        }

        //Tạo token
        $payload = [
            'sub' => $user->id,
            'exp' => time() + env('JWT_EXPIRE'),
            'iat' => time(),
        ];
        $accessToken = JWT::encode($payload, env('JWT_SECRET'), 'HS256');
        $refreshToken = JWT::encode([
            'exp' => time() + env('JWT_REFRESH_EXPIRE'),
            'sub' => $user->id,
            'iat' => time(),
        ], env('JWT_REFRESH_SECRET'), 'HS256');
        (new RefreshToken())->create(
            [
                'user_id' => $user->id,
                'refresh_token' => $refreshToken,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        return successResponse(data: [
            'access_token' => $accessToken,
            'refresh_token' => $refreshToken,
        ]);
    }

    public function profile()
    {
        $user = Auth::user();
        if ($user->avatar) {
            $user->avatar = (!empty($_SERVER['HTTPS']) ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $user->avatar;
        }
        return successResponse(data: $user);
    }

    public function updateProfile()
    {
        $id = Auth::user()->id;

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

        ];

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
        $data = [
            'name' => input('name'),
            'email' => input('email'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $avatar = input()->file('avatar');

        $allowed = ['image/jpg', 'image/jpeg', 'image/png'];
        if ($avatar) {
            if (in_array($avatar->getMime(), $allowed)) {
                $destinationFilname = sprintf('%s.%s', uniqid(), $avatar->getExtension());
                $status = $avatar->move(sprintf('./uploads/%s', $destinationFilname));
                if ($status) {
                    $data['avatar'] = "/uploads/" . $destinationFilname;
                }
            } else {
                return errorResponse(status: 400, message: "Định dạng ảnh không hợp lệ");
            }
        }

        //Update
        try {
            $model = new User();
            $status = $model->update($id, $data);
            if ($status) {
                $user = $model->getOne($id);
                $user->avatar = (!empty($_SERVER['HTTPS']) ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $user->avatar;
                return successResponse(data: $user);
            }

            throw new Error("Server Error");

        } catch (Exeption $e) {
            return errorResponse(500, "Server Error");
        } catch (Error $e) {
            return errorResponse(500, $e->getMessage());
        }
    }

    public function refresh()
    {
        $refreshToken = input('refresh_token');
        if (!$refreshToken) {
            return errorResponse(status: 401, message: "Unauthorize");
        }

        try {
            $decoded = JWT::decode($refreshToken, new Key(env('JWT_REFRESH_SECRET'), 'HS256'));
            $refreshTokenModel = new RefreshToken;
            $token = $refreshTokenModel->find($refreshToken, 'refresh_token');
            if (!$token) {
                throw new \Exception("Token is valid");
            }

            $userId = $decoded->sub;

            $payload = [
                'sub' => $userId,
                'exp' => time() + env('JWT_EXPIRE'),
                'iat' => time(),
            ];
            $accessToken = JWT::encode($payload, env('JWT_SECRET'), 'HS256');
            return successResponse(data: [
                'access_token' => $accessToken,
                'refresh_token' => $refreshToken,
            ]);

        } catch (\Exception $e) {
            return errorResponse(status: 401, message: 'Unauthorize', errors: $e->getMessage());
        }
    }

    public function logout()
    {
        $token = Auth::user()->token;
        $expire = Auth::user()->expire;
        if ($token && $expire) {
            $blacklist = new BlacklistToken;
            try {
                $blacklist->create([
                    'token' => $token,
                    'expire' => $expire,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
                $userTransformer = new UserTransformer(Auth::user());
                return successResponse(data: $userTransformer);
            } catch (Exception $e) {
                return errorResponse(status: 401, message: "User logged out");
            }

        }
    }
}
