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
        echo $this->render("card", ['product' => $product]);
    }
}