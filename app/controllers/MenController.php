<?php
namespace app\controllers;
use app\models\repositories\ProductRepository;

class MenController extends Controller
{
    public function actionMen()
    {
        $products = (new ProductRepository())->getAll();
        $goodsInCart = $this->countUserGoods();
        echo $this->render("men", ['products' => $products,
            'goodsInCart' => $goodsInCart]);
    }
}