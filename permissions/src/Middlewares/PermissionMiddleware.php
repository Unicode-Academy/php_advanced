<?php

namespace App\Middlewares;

use Error;
use App\Models\User;
use System\Core\Auth;
use Pecee\Http\Request;
use System\Core\Session;
use Pecee\Http\Middleware\IMiddleware;

class PermissionMiddleware implements IMiddleware
{
    public function handle(Request $request): void
    {

        $userModel = new User;
        $user = Auth::user();
        $userId = $user->id;
        $permissions = $userModel->getPermissionsAll($userId);
        $permissionsData = [];
        foreach ($permissions as $item) {
            if (!in_array($item->value, $permissionsData)) {
                $permissionsData[] = $item->value;
            }
        }

        $currentUrl = $request->getUrl();
        $currentPath = $currentUrl->getPath();
        $pathArr = array_values(array_filter(explode('/', $currentPath)));
        $module = 'home';
        $action = 'read';

        if (!empty($pathArr[0])) {
            $module = $pathArr[0];
        }
        if (!empty($pathArr[1])) {
            $action = $pathArr[1];
        }
        if ($currentPath !== '/' && !in_array($module . '.' . $action, $permissionsData)) {
            throw new Error('Bạn không có quyền truy cập trang này', 403);
        }
    }
}

/*
URL: scheme + hostname + port + path + ? + querystring
*/