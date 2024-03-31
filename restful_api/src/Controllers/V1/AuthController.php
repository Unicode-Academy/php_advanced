<?php
namespace App\Controllers\V1;

use App\Models\User;
use Firebase\JWT\JWT;

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
        return successResponse(data: [
            'access_token' => $accessToken,
        ]);
    }
}
