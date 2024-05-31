<?php

namespace App\Middlewares;

use System\Core\Auth;
use Pecee\Http\Request;
use System\Core\Session;
use Pecee\Http\Middleware\IMiddleware;

class CheckUserActiveMiddleware implements IMiddleware
{
    public function handle(Request $request): void
    {
        $user = Auth::user();
        if (!$user->status) {
            Session::delete('user_login');
            Session::flash('msg', 'Tài khoản đã bị khóa. Vui lòng liên hệ ban quản trị');
            redirect(url('auth.login'));
        }
    }
}
