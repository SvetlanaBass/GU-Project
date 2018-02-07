<?php
namespace app\controllers;
use app\models\repositories\CartRepository;

class CartController extends Controller
{
    public function actionCart(){
        $goodsInCart = $this->countUserGoods(); // подсчитываем количество товаров для значка корзины

        $user = $this->getUserEntity(); // находим пользователя для ID

        $cart = (new CartRepository())->getCart($user);
        echo $this->render("cart", ['cart' => $cart, 'goodsInCart' => $goodsInCart]);
    }

}