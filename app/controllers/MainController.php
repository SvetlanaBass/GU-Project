<?php
namespace app\controllers;
use app\models\repositories\ProductRepository;
class MainController extends Controller
{
    public function actionIndex()
    {
        $products = (new ProductRepository())->getAll();
        echo $this->render("main", ['products' => $products]);
    }
}