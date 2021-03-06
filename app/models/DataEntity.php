<?php
namespace app\models;
use app\models\repositories\ProductRepository;
use app\models\repositories\CartRepository;
use app\models\repositories\UserRepository;
abstract class DataEntity
{
    public function deleteProduct($entity)
    {
        $deleteEntity = new ProductRepository();
        $deleteEntity->delete($entity);
    }

    public function saveProduct($entity)
    {
        $saveEntity = new ProductRepository();
        $saveEntity->save($entity);
    }

    public function deleteFromCart($entity)
    {
        $deleteFromCartEntity = new CartRepository();
        $deleteFromCartEntity->deleteFromCart($entity);
    }

    public function saveUser($entity)
    {
        $saveEntity = new UserRepository();
        $saveEntity->saveNewUser($entity);
    }

    public function getUser($entity)
    {
        $getEntity = new UserRepository();  // переход в app\models\repositories\Repository.php
        return $getEntity->getOneUser($entity);
    }

}