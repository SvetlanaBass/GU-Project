<?php
namespace app\services;
class Db
{
    private $conn;

    private $config;

    static $instance = null;

    public function __construct($driver, $host, $login, $password, $database, $charset)
    {
        $this->config['driver'] = $driver;
        $this->config['host'] = $host;
        $this->config['login'] = $login;
        $this->config['password'] = $password;
        $this->config['database'] = $database;
        $this->config['charset'] = $charset;
    }

    private function getConnection()
    {
        if (is_null($this->conn)) {
            $this->conn = new \PDO(
                $this->prepareDsnString(),
                $this->config['login'],
                $this->config['password']
            );
            $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        return $this->conn;
    }

    private function prepareDsnString()
    {
        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );

    }

    private function query($sql, $params = [])
    {
        $PdoStatement = $this->getConnection()->prepare($sql);
        $PdoStatement->execute($params);
        return $PdoStatement;
    }

    public function execute($sql, $params = [])
    {
        $this->query($sql, $params);
        return true;
    }
    public function maxValue($sql, $params)
    {
        $values = $this->query($sql, $params);
        $values = $values->fetch();
        foreach ($values as $key => $value){
            $maxValue = $value;
        }
        return $maxValue;
    }

    public function queryOne($sql, $params = [])
    {
        return $this->queryAll($sql, $params)[0];
    }

    public function queryAll($sql, $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }

    public function queryObject($sql, $params, $class)
    {
        $smtp = $this->query($sql, $params);
        $smtp->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
        return $smtp->fetch();
    }

    public function queryObjectsAll($sqlOne, $maxID, $class)
    {
        $id = 0;
        $arrOfObjects = []; // массив, в который будем складывать объекты
        while ($id <= $maxID) {
            $params = [':id' => $id++];
            $smtp = $this->query($sqlOne, $params); // подготовленная строка запроса в базу данных
            $smtp->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
            $smtp = $smtp->fetch();
            if ($smtp == false) {
                continue;
            } else {
                array_push($arrOfObjects, $smtp);
            }
        }
        return $arrOfObjects;
    }
}