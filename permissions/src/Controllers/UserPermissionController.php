<?php
namespace App\Controllers;

use App\Models\Permission;
use App\Models\User;

class UserPermissionController
{
    private $userModel;
    private $permissionModel;
    public function __construct()
    {
        $this->userModel = new User;
        $this->permissionModel = new Permission;

    }
    public function updateUserRolePermission()
    {
        $users = input('users');
        $roles = input('roles');
        $permissions = input('permissions');

        if ($users) {
            foreach ($users as $userId) {
                $this->userModel->deleteUserRole($userId);
                $this->userModel->deleteUserPermission($userId);
                $this->updateUserRole($userId, $roles);
                $this->updateUserPermission($userId, $permissions);
            }
        }
        return redirect('/permissions');
    }

    public function getDataRoles($userId)
    {
        $roles = $this->userModel->getRoles($userId);
        foreach ($roles as $key => $role) {
            $roles[$key] = $role->role_id;
        }
        return response()->json(['roles' => $roles]);
    }

    public function getDataPermissions($userId)
    {
        $permissions = $this->userModel->getPermissions($userId);
        foreach ($permissions as $key => $permission) {
            $permissionData = $this->permissionModel->getPermission($permission->permission_id);
            $permissions[$key] = $permissionData->value;
        }
        return response()->json(['permissions' => $permissions]);
    }

    private function updateUserRole($userId, $roles)
    {
        if ($roles) {
            foreach ($roles as $roleId) {
                $this->userModel->addUserRole($userId, $roleId);
            }
        }
    }

    private function updateUserPermission($userId, $permissions)
    {
        if ($permissions) {
            foreach ($permissions as $value) {
                $permission = $this->permissionModel->getPermission($value, 'value');
                if (!$permission) {
                    $permissionId = $this->permissionModel->addPermission([
                        'value' => $value,
                    ]);
                } else {
                    $permissionId = $permission->id;
                }
                $this->userModel->addUserPermission($userId, $permissionId);
            }
        }
    }
}
