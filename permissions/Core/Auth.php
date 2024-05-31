<?php

namespace System\Core;

use App\Models\User;

class Auth
{
    private static $user = null;

    public static function setUser($user)
    {
        $userModel = new User;
        $user = $userModel->findUser($user->id);
        self::$user = $user;
    }

    public static function user()
    {
        return self::$user;
    }
}
