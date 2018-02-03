<?php
namespace app\models\repositories;
use app\models\Repository;
use app\models\Cart;
class CartRepository extends Repository
{
    public static function getTableName()
    {
        return 'cart';
    }

    static public function getEntityClass()
    {
        return Cart::class;
    }
}