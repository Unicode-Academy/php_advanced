<?php
namespace App\Controllers;

use App\Models\User;

class UserPermissionController
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = new User;
    }
    public function updateUserRole()
    {
        $users = input('users');
        $roles = input('roles');
        if ($users) {
            foreach ($users as $userId) {
                if ($roles) {
                    foreach ($roles as $roleId) {
                        $this->userModel->addUserRole($userId, $roleId);
                    }
                }
            }
        }
        return redirect('/permissions');
    }
}
