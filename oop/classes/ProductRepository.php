<?php
class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{

    //Lấy model tương ứng với module product (Làm việc với table product trong Database)
    public function getModel()
    {
        return 'Product Model';
        //return new ProductModel();
    }


    //Lấy danh sách sản phẩm
    public function getProduct(){
        return $this->getAll();
    }

    //Lấy thông tin 1 sản phẩm có id = 1
    public function getDetailProduct($id){
        return $this->find($id);
    }

    //Thêm sản phẩm
    public function addProduct($data)
    {
        return $this->create($data);
    }
}