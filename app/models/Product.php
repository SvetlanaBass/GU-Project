<?php
namespace app\models;

class Product extends DataEntity
{
    public $id_product;
    public $product_name;
    public $product_price;
    public $id_category;

    public function __construct($id_product = null, $product_name = null,
                                $product_price = null, $id_category = null)
    {
        $this->id_product = $id_product;
        $this->product_name = $product_name;
        $this->product_price = $product_price;
        $this->id_category = $id_category;
    }
}