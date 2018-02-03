<?php
namespace app\controllers;
use app\services\Request;
use app\models\Cart;
class DeleteFromCartController extends Controller
{
    public function actionDeleteFromCart()
    {
        $id = (new Request())->get('id');
        $cartEntity = (new Cart());
        $cartEntity->id = $id;
        $cartEntity->deleteFromCart($cartEntity);
        echo $this->render("success", []);
    }
}