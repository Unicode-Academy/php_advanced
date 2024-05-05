<?php
namespace App\Controllers;

use App\Models\Role;

class PermissionController
{
    private $roleModel;
    public function __construct()
    {
        $this->roleModel = new Role;
    }
    public function index()
    {
        $pageTitle = 'Phân quyền';
        $roles = $this->roleModel->getRoles();

        return view('permissions.index', compact('pageTitle', 'roles'));
    }
}
