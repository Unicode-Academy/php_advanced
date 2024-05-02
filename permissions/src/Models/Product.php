<?php
namespace App\Models;

use System\Core\Model;

class Product extends Model
{
    public function getProducts()
    {
        return $this->db->table('products')->orderBy('id', 'DESC')->all();
    }

    public function addProduct($data)
    {
        return $this->db->table('products')->insert($data);
    }

    public function updateProduct($id, $data)
    {
        return $this->db->table('products')->where('id', $id)->update($data);
    }

    public function findProduct($id)
    {
        return $this->db->table('products')->where('id', $id)->first();
    }

    public function deleteProduct($id)
    {
        return $this->db->table('products')->where('id', $id)->delete();
    }
}
