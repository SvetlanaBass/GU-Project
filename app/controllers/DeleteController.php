<?php
namespace app\controllers;
use app\models\Product;

class DeleteController extends Controller
{
    public function actionDelete(){
        $id = $_GET['id'];
        $entity = (new Product());
        $entity->id_product = $id;
        $entity->deleteProduct($entity);
        echo $this->render("success", []);
    }
}