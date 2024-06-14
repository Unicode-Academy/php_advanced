<?php

namespace App\Controllers;

use Error;
use App\Models\User;
use App\Models\Permission;

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
        if (!can('permissions.assign')) {
            throw new Error('Bạn không có quyền truy cập trang này', 403);
        }

        $users = input('users');
        $roles = input('roles');
        $permissions = input('permissions');

        $this->updateUsersRoles($users, $roles);

        $this->updateUsersPermissions($users, $permissions);
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

    private function updateUsersRoles($users, $roles)
    {
        $data = [];
        foreach ($users as $user) {
            foreach ($roles as $role) {
                $data[] = [
                    $user,
                    $role,
                ];
            }
        }

        $this->userModel->deleteUserRole($users);
        if ($data) {
            $this->userModel->addUsersRoles($data);
        }
    }

    private function updateUsersPermissions($users, $permissions)
    {
        $data = [];
        foreach ($users as $user) {
            foreach ($permissions as $value) {
                $permission = $this->permissionModel->getPermission($value, 'value');
                if (!$permission) {
                    $permissionId = $this->permissionModel->addPermission([
                        'value' => $value,
                    ]);
                } else {
                    $permissionId = $permission->id;
                }

                $data[] = [
                    $user,
                    $permissionId,
                ];
            }
        }
        $this->userModel->deleteUserPermission($users);
        if ($data) {
            $this->userModel->addUsersPermissions($data);
        }
    }
}
