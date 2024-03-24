<?php

namespace App\Controllers\V1;

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

    public function find($id)
    {
        return successResponse(data: [$id], status: 201);
    }

    public function store()
    {
        $data = [
            'name' => input('name'),
            'email' => input('email'),
        ];
        return successResponse(data: $data, status: 201);
    }
}
