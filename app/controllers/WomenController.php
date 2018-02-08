<?php
namespace app\controllers;
use app\models\repositories\ProductRepository;

class WomenController extends Controller
{
    public function actionWomen()
    {
        $products = (new ProductRepository())->getAll();
        $goodsInCart = $this->countUserGoods();
        echo $this->render("women", ['products' => $products,
            'goodsInCart' => $goodsInCart]);
    }
}