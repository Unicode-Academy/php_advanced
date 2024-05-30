<?php
namespace System\Core;

class Session
{
    /*
     * data(key, value) => set session
     * data(key) => get session
     * */
    public static function data($key = '', $value = '')
    {
        $sessionKey = self::isInvalid();

        if (!empty($value)) {
            if (!empty($key)) {
                $_SESSION[$sessionKey][$key] = $value; //set session
                return true;
            }
            return false;
        } else {
            if (empty($key)) {
                if (isset($_SESSION[$sessionKey])) {
                    return $_SESSION[$sessionKey];
                }
            } else {
                if (isset($_SESSION[$sessionKey][$key])) {
                    return $_SESSION[$sessionKey][$key]; //get session
                }
            }
        }
    }

    /*
     * delete(key) => Xoá session với key
     * delete() => Xoá hết session
     * */
    public static function delete($key = '')
    {
        $sessionKey = self::isInvalid();
        if (!empty($key)) {
            if (isset($_SESSION[$sessionKey][$key])) {
                unset($_SESSION[$sessionKey][$key]);
                return true;
            }
            return false;
        } else {
            unset($_SESSION[$sessionKey]);
            return true;
        }
        return false;
    }

    /*
     * Flash Data
     * - set flash data => giống như set session
     * - get flash data => giống như get session, xoá luôn session sau khi get
     *
     * */
    public static function flash($key = '', $value = '')
    {
        $dataFlash = self::data($key, $value);
        if (empty($value)) {
            self::delete($key);
        }
        return $dataFlash;
    }

    public static function isInvalid()
    {
        return 'unicode_permissions';
    }

    public static function id()
    {
        return session_id();
    }
}
