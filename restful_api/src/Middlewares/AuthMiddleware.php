<?php
namespace App\Middlewares;

use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;
use System\Core\Auth;

class AuthMiddleware implements IMiddleware
{
    public function handle(Request $request): void
    {
        // $apiKeyStatus = env('API_KEY_SYSTEM');
        // $apiKey = $request->getHeader('x-api-key');
        // if ($apiKey) {

        //     if ($apiKeyStatus == 'true') {

        //         if ($apiKey != env('API_KEY')) {
        //             errorResponse(status: 401, message: 'Unauthorize', errors: "API Key not match");
        //         }
        //     } else {

        //         $userModel = new User();
        //         $user = $userModel->findUserByKey($apiKey);
        //         if (!$user) {
        //             errorResponse(status: 401, message: 'Unauthorize', errors: "API Key not match");
        //         }
        //     }

        // } else {
        //     errorResponse(status: 401, message: 'Unauthorize', errors: "No provide API Key");
        // }
        $authorization = $request->getHeader('Authorization');
        if (!$authorization) {
            errorResponse(status: 401, message: 'Unauthorize');
        } else {
            $token = trim(str_replace('Bearer', '', $authorization));
            try {
                $decoded = JWT::decode($token, new Key(env('JWT_SECRET'), 'HS256'));
                $userId = $decoded->sub;
                $userModel = new User;
                $user = $userModel->getOne($userId);
                if (!$user) {
                    errorResponse(status: 404, message: 'User not found');
                } else if (!$user->status) {
                    errorResponse(status: 404, message: 'User Blocked');
                } else {
                    Auth::setUser($user);
                }

            } catch (\Exception $e) {
                errorResponse(status: 401, message: 'Unauthorize');
            }

        }
    }
}
