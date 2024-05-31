<?php

namespace App\Middlewares;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;
use System\Core\Auth;
use System\Core\Session;

class AuthMiddleware implements IMiddleware
{
    public function handle(Request $request): void
    {
        $user = Session::data('user_login');

        if (!$user) {
            redirect(url('auth.login'));
        }

        Auth::setUser($user); //Lưu user
    }
}
