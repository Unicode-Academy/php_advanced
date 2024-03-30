<?php
namespace App\Transformers;

use System\Core\Transformer;

class UserTransformer extends Transformer
{
    public function response()
    {
        return [
            'id' => $this->id,
            'fullname' => $this->name,
            'email' => $this->email,
            'status' => $this->status,
            'statusText' => $this->status ? 'Kích hoạt' : 'Chưa kích hoạt',
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
