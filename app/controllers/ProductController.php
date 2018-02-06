<?php
namespace app\controllers;
use app\models\repositories\ProductRepository;
use app\services\Request;
class ProductController extends Controller
{
    public function actionCard()
    {
        $id = (new Request())->get('product/card?id');
        $product = (new ProductRepository())->getOne($id);

        $goodsInCart = $this->countUserGoods();

        echo $this->render("card", ['product' => $product,
            'goodsInCart' => $goodsInCart]);
    }
}