<?php
namespace System\Core;

class Auth
{
    private static $user = [];

    public static function setUser($user)
    {
        self::$user = $user;
    }

    public static function user()
    {
        return self::$user;
    }
}
