<?php
namespace App\Controllers;

use App\Models\Action;
use App\Models\Module;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

class PermissionController
{
    private $roleModel, $moduleModel, $actionModel, $permissionModel;
    public function __construct()
    {
        $this->roleModel = new Role;
        $this->moduleModel = new Module;
        $this->actionModel = new Action;
        $this->permissionModel = new Permission;
        $this->userModel = new User;
    }
    public function index()
    {
        $pageTitle = 'Phân quyền';
        $roles = $this->roleModel->getRoles();
        $users = $this->userModel->getUsers();

        return view('permissions.index', compact('pageTitle', 'roles', 'users'));
    }

    public function add()
    {
        $pageTitle = 'Thêm vai trò';

        $modules = $this->getModules();

        return view('permissions.add', compact('pageTitle', 'modules'));
    }

    public function handleAdd()
    {
        $name = input('name');
        $permissions = input('permissions');
        $roleId = $this->roleModel->addRole([
            'name' => $name,
        ]);
        if ($roleId) {
            foreach ($permissions as $value) {
                $permission = $this->permissionModel->getPermission($value, 'value');
                if (!$permission) {
                    $permissionId = $this->permissionModel->addPermission([
                        'value' => $value,
                    ]);
                } else {
                    $permissionId = $permission->id;
                }
                $this->roleModel->addPermission($roleId, $permissionId);
            }

        }
        return redirect('/permissions');
    }

    public function edit($id)
    {
        $pageTitle = 'Cập nhật vai trò';
        $role = $this->roleModel->getRole($id);
        if (!$role) {
            throw new \Error('Vai trò không tồn tại', 404);
        }
        $permissions = $this->roleModel->getPermissions($role->id);
        $role->permissions = $permissions;
        $modules = $this->getModules();
        return view('permissions.edit', compact('pageTitle', 'modules', 'role'));
    }

    public function update($id)
    {
        $name = input('name');
        $permissions = input('permissions');
        $this->roleModel->updateRole($id, ['name' => $name]);
        if ($permissions) {
            $this->roleModel->deletePermissions($id);
            foreach ($permissions as $value) {
                $permission = $this->permissionModel->getPermission($value, 'value');
                if (!$permission) {
                    $permissionId = $this->permissionModel->addPermission([
                        'value' => $value,
                    ]);
                } else {
                    $permissionId = $permission->id;
                }
                $this->roleModel->addPermission($id, $permissionId);
            }
        }

        return redirect('/permissions/edit/' . $id);
    }

    public function delete($id)
    {
        $this->roleModel->deleteRole($id);
        return redirect('/permissions');
    }

    private function getModules()
    {
        $modules = $this->moduleModel->getModules();
        $moduleIds = [];
        foreach ($modules as $module) {
            $moduleIds[] = $module->id;
        }

        $actions = $this->actionModel->getActions($moduleIds);

        foreach ($modules as $module) {
            foreach ($actions as $action) {
                if ($action->module_id == $module->id) {
                    $module->actions[] = $action;
                }
            }
        }
        return $modules;
    }

}
