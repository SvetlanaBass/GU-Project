<?php
namespace app\controllers;
use app\models\repositories\ProductRepository;

class CatalogController extends Controller
{
    public function actionCatalog()
    {
        $products = (new ProductRepository())->getAll();
        $goodsInCart = $this->countUserGoods();
        echo $this->render("catalog", ['products' => $products,
            'goodsInCart' => $goodsInCart]);
    }
}