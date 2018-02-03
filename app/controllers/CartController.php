<?php
namespace app\controllers;
use app\models\repositories\CartRepository;
class CartController extends Controller
{
    public function actionCart(){
        $cart = (new CartRepository())->getCart();
        echo $this->render("cart", ['cart' => $cart]);
    }

}