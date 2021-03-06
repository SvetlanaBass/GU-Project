<?php
namespace app\controllers;
use app\services\Request;
use app\models\Cart;
class DeleteFromCartController extends Controller
{
    public function actionDeleteFromCart()
    {
        $id_product = (new Request())->get('id_product');
        $id_user = (new Request())->get('id_user');
        $quantity = (new Request())->get('quantity');
        $cartEntity = (new Cart());
        $cartEntity->id_product = $id_product;
        $cartEntity->id_user = $id_user;
        $cartEntity->quantity = $quantity;
        $cartEntity->deleteFromCart($cartEntity);
    }
}