<?php
namespace app\controllers;
use app\models\repositories\CartRepository;
use app\models\repositories\ProductRepository;
use app\services\Request;

class AddToCartController extends Controller
{
    public function actionAddToCart()
    {
        if(isset($_COOKIE['site_login'])){
            $productID = (new Request())->get('id'); // получаем ID добавляемого товара
            $quantity = (new Request())->get('quantity'); // получаем ID добавляемого товара
            $product = (new ProductRepository())->getOne($productID);   // выбираем товар из БД
            $user = $this->getUserEntity(); // получаем пользователя, который добавляет товар
            $cartEntity = (new CartRepository());
            $cartEntity->addToCart($product, $user, $quantity);
        }
    }
}