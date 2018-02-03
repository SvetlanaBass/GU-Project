<?php
namespace app\models;
use app\models\repositories\ProductRepository;
use app\models\repositories\CartRepository;
abstract class DataEntity
{
    public function deleteProduct($entity)
    {
        $deleteEntity = new ProductRepository();
        $deleteEntity->delete($entity);
    }

    public function saveProduct($entity)
    {
        $saveEntity = new ProductRepository();
        $saveEntity->save($entity);
    }

    public function addToCart($entity)
    {
        $addToCartEntity = new CartRepository();
        $addToCartEntity->addToCart($entity);
    }

    public function deleteFromCart($entity)
    {
        $deleteFromCartEntity = new CartRepository();
        $deleteFromCartEntity->delete($entity);
    }
}