<?php
namespace app\controllers;
use app\models\repositories\ProductRepository;
use app\services\Request;
class AddToCartController  extends Controller
{
    public function actionAddToCart()
    {
        $id = (new Request())->get('id');
        $cartEntity = (new ProductRepository())->getOne($id);
        $cartEntity->addToCart($cartEntity);
        echo $this->render("success", []);
    }
}