<?php

namespace App\Controllers;

class UserController
{
    public function index()
    {
        $data = ["User 1", "User 2"];
        // return successResponse(
        //     data: $data,
        //     status: 201
        // );
        return errorResponse(
            status: 500,
            message: 'Server Error',
        );
    }
}
