<?php

use System\Core\Transformer;
function successResponse($status = 200, $data = [], $meta = [])
{
    if ($data instanceof Transformer) {
        $data = $data->response();
    }
    return response()->httpCode($status)->json([
        'status' => $status,
        'message' => 'Success',
        'data' => $data,
        'meta' => $meta,
    ]);
}

function errorResponse($status, $message, $errors = [], $meta = [])
{
    return response()->httpCode($status)->json([
        'status' => $status,
        'message' => $message,
        'errors' => $errors,
        'meta' => $meta,
    ]);
}
