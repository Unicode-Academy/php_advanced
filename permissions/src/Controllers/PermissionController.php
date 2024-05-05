<?php
namespace App\Controllers;

use App\Models\Action;
use App\Models\Module;
use App\Models\Role;

class PermissionController
{
    private $roleModel, $moduleModel, $actionModel;
    public function __construct()
    {
        $this->roleModel = new Role;
        $this->moduleModel = new Module;
        $this->actionModel = new Action;
    }
    public function index()
    {
        $pageTitle = 'Phân quyền';
        $roles = $this->roleModel->getRoles();

        return view('permissions.index', compact('pageTitle', 'roles'));
    }

    public function add()
    {
        $pageTitle = 'Thêm vai trò';
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

        return view('permissions.add', compact('pageTitle', 'modules'));
    }
}