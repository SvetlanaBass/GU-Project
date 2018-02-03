<?php
namespace app\controllers;
use app\models\Product;

class SaveController extends Controller
{
    public function actionSave()
    {
        echo $this->render("save", []);
    }

    public function actionExecute()
    {
        if (isset($_POST['id']) ||
            isset($_POST['name']) ||
            isset($_POST['price'])){

            $entity = (new Product());

            if (isset($_POST['id'])){
                $id = $_POST['id'];
                $entity->id_product = $id;
            }
            if (isset($_POST['name'])){
                $name = $_POST['name'];
                $entity->product_name = $name;
            }
            if (isset($_POST['price'])){
                $price = $_POST['price'];
                $entity->product_price = $price;
            }

            $entity->saveProduct($entity);
            echo $this->render("success", []);

        } else {
            echo $this->render("error", []);
        }
    }
}