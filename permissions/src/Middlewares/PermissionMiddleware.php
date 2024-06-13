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
        $permissions = $userModel->getPermissionsAll($user->id);
        $permissionsData = [];
        foreach ($permissions as $item) {
            if (!in_array($item->value, $permissionsData)) {
                $permissionsData[] = $item->value;
            }
        }

        return $permissionsData;
    }

    private function getModuleAction()
    {
        $routeName = $this->getRouteName();
        $routeNameArr = explode('.', $routeName);
        $module = reset($routeNameArr);
        $action = $this->getActionName();

        return ['module' => $module, 'action' => $action];
    }

    private function checkPermission($request, $permissionsData)
    {
        ['module' => $module, 'action' => $action] = $this->getModuleAction($request);
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
