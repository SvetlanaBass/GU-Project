<?php
namespace app\controllers;
use app\models\repositories\ProductRepository;

class MainController extends Controller
{
    public function actionIndex()
    {
        $products = (new ProductRepository())->getAll();  // метод родителя Repository.php
        // получаем массив с объектами new Product
        // длиной, н-р, 10 (т.е. столько, сколько в базе данных)

        $goodsInCart = $this->countUserGoods();
        echo $this->render("main", ['products' => $products,
            'goodsInCart' => $goodsInCart]);

    }
}