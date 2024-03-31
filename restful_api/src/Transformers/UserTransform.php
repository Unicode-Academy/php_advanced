<?php
namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class UserTransform extends TransformerAbstract
{
    public function transform($user)
    {
        return [
            'id' => (int) $user->id,
            'fullname' => $user->name,
            'email' => $user->email,
            'status' => (bool) $user->status,
            'createdAt' => $user->created_at,
            'updatedAt' => $user->updated_at,
        ];
    }
}
