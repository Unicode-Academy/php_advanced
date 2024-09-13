<?php

namespace App\Middlewares;

use App\Models\User;
use Error;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;
use Pecee\SimpleRouter\SimpleRouter;
use System\Core\Auth;

class PermissionMiddleware implements IMiddleware
{
    private $alias = [
        'index' => 'read',
        'edit' => 'update',
    ];
    private $ignore = [
        'permissions.user_role_permission',
        'permissions.data.permissions'
    ];
    public function handle(Request $request): void
    {
        $request->permissions = $this->getPermissions(Auth::user());

        if ($this->checkPermission($request, $this->getPermissions(Auth::user()))) {
            throw new Error('Bạn không có quyền truy cập trang này', 403);
        }
    }


    private function getPermissions($user)
    {
        $userModel = new User;
        $permissionsFromRoles = $userModel->getPermissionsFromRoles($user->id);
        $permissiosFromUser = $userModel->getPermissionsFromUser($user->id);
        $pemissions = array_merge($permissionsFromRoles, $permissiosFromUser);
        $permissionsData = [];
    
        foreach ($pemissions as $item) {
            if (!in_array($item->value, $permissionsData)) {
                $permissionsData[] = $item->value;
            }
        }

        return $permissionsData;
    }

    private function getModuleAction()
    {
        $routeName = $this->getRouteName();
        if (!$routeName || in_array($routeName, $this->ignore)) {
            return false;
        }
        $routeNameArr = explode('.', $routeName);
        $module = reset($routeNameArr);
        $action = $this->getActionName();

        return ['module' => $module, 'action' => $action];
    }

    private function checkPermission($request, $permissionsData)
    {
        $moduleAction = $this->getModuleAction($request);
        if (!$moduleAction) {
            return false;
        }
        ['module' => $module, 'action' => $action] = $moduleAction;
        $currentUrl = $request->getUrl();
        $currentPath = $currentUrl->getPath();
        return $currentPath !== '/' && !in_array($module . '.' . $action, $permissionsData);
    }

    private function getRouteName()
    {
        $router = SimpleRouter::router()->getCurrentProcessingRoute();
        $routeName = $router->getName();
        return $routeName;
    }

    private function getActionName()
    {
        $routeName = $this->getRouteName();
        $routeNameArr = explode('.', $routeName);
        $lastRouteName = end($routeNameArr);
        return $this->alias[$lastRouteName] ?? $lastRouteName;
    }
}