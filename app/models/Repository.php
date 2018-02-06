<?php
namespace app\models;
use app\base\App;
abstract class Repository
{
    public function getOne($id)
    {
        $tableName = static::getTableName();
        $primaryKey = static ::getPrimaryKeyName($tableName);
        $sql = "SELECT * FROM {$tableName} WHERE {$primaryKey} = :id";
        return static::getDb()->queryObject($sql, [':id' => $id], static::getEntityClass());

        // static::getEntityClass() - app\models\Product - путь, который передается в \PDO
    }

    public function getAll()
    {
        $tableName = static::getTableName();
        // таблица того объекта, который создан в MainController, т.е. ProductRepository
        // т.е. 'products'
        $primaryKey = static ::getPrimaryKeyName($tableName); // метод Repository.php
        $maxID = $this->countObjects($tableName, $primaryKey); // метод Repository.php
        $sqlOne = "SELECT * FROM {$tableName} WHERE {$primaryKey} = :id";
        return static::getDb()->queryObjectsAll($sqlOne, $maxID, static::getEntityClass());
    }

    public function getCart()
    {
        $sql = "SELECT * FROM cart, products WHERE cart.id_product = products.id_product";
        return static::getDb()->queryAll($sql, []);
    }

    public function getUserCart($userID)
    {
        $sql = "SELECT * FROM cart WHERE id_user = {$userID}";
        return static::getDb()->queryAll($sql, []);
    }

    public function countObjects($tableName, $primaryKey)
    {
        $sql = "SELECT MAX({$primaryKey}) FROM {$tableName}";
        $maxID = static::getDb()->maxValue($sql, []);
        return $maxID;
    }

    public function delete(DataEntity $entity) // функцией могут пользоваться только
                                            // наследники класса DataEntity
    {
        $tableName = $this->getTableName();
        $primaryKey = static ::getPrimaryKeyName($tableName);
        $sql = "DELETE FROM {$tableName} WHERE {$primaryKey} = :id";
        static::getDb()->execute($sql, [':id' => $entity->$primaryKey]);
    }

    private function insert(DataEntity $entity)
    {
        $params = [];
        $columns = [];
        foreach ($entity as $key => $value) {
            if ($value != '' || $value != null) {
                $params[":$key"] = $value;
                $columns[] = $key;
            }
        }
        $columns = implode(", ", $columns);
        $placeholders = implode(", ", array_keys($params));
        $tableName = $this->getTableName();
        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$placeholders})";
        static::getDb()->execute($sql, $params);
    }

    private function update(DataEntity $entity)
    {
        $tableName = $this->getTableName();
        $primaryKey = static ::getPrimaryKeyName($tableName);
        $params = [];
        $set = [];
        foreach ($entity as $key => $value) {
            if ($key == $primaryKey) { // чтобы не перезаписывался первичный ключ
                continue;
            } else if ($value != '' || $value != null){
                $set[] = "$key = :$key";
                $params[":$key"] = $value;
            }
        }
        $set = implode(", ", $set);
        $sql = "UPDATE {$tableName} SET {$set} WHERE {$primaryKey} = {$entity->$primaryKey}";
        static::getDb()->execute($sql, $params);
    }

    public function save(DataEntity $entity)
    {
        if ($entity->id_product == ''){
            $this->insert($entity);
        } else {
            $this->update($entity);
        }
    }

    public function addToCart($product, $user)
    {
        $tableName = $this->getTableName();
        $params = [':id' => $product->id_product, ':quantity' => 1, ':id_user' => $user->id_user];
        $sql = "INSERT INTO {$tableName} (id_product, quantity, id_user) VALUES (:id, :quantity, :id_user)";
        static::getDb()->execute($sql, $params);
    }

    public static function getDb()
    {
        return App::call()->db;
    }

    public static function getPrimaryKeyName($tableName)
    {
        $sql = "SHOW KEYS FROM {$tableName} WHERE Key_name = 'PRIMARY'";
        $sql = static::getDb()->queryAll($sql); // массив, содержащий название столбца primary key
        $primaryKey = $sql[0]['Column_name'];
        return $primaryKey;
    }

    public function saveNewUser(DataEntity $entity)
    {
        $this->insert($entity);
    }

    public function getOneUser(DataEntity $entity)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE login = :login";
        return static::getDb()->queryObject($sql, [':login' => $entity->login], static::getEntityClass());
    }

    abstract static public function getTableName();

    abstract static public function getEntityClass();
}