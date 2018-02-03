<?php
namespace app\models;

class Cart extends DataEntity
{
    public $id;
    public $id_product;
    public $quantity;
    public $id_user;
    public $id_order;

    public function __construct($id = null, $id_product = null, $quantity = null,
                                $id_user = null, $id_order = null)
    {
        $this->id = $id;
        $this->id_product = $id_product;
        $this->quantity = $quantity;
        $this->id_user = $id_user;
        $this->id_order = $id_order;
    }
}