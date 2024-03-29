<?php
namespace App\Middlewares;

use App\Models\User;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class AuthMiddleware implements IMiddleware
{
    public function handle(Request $request): void
    {
        $apiKeyStatus = env('API_KEY_SYSTEM');
        $apiKey = $request->getHeader('x-api-key');
        if ($apiKey) {

            if ($apiKeyStatus == 'true') {

                if ($apiKey != env('API_KEY')) {
                    errorResponse(status: 401, message: 'Unauthorize', errors: "API Key not match");
                }
            } else {

                $userModel = new User();
                $user = $userModel->findUserByKey($apiKey);
                if (!$user) {
                    errorResponse(status: 401, message: 'Unauthorize', errors: "API Key not match");
                }
            }

        } else {
            errorResponse(status: 401, message: 'Unauthorize', errors: "No provide API Key");
        }

    }
}
