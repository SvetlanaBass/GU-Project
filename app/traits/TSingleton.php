<?php
namespace app\traits;

trait TSingleton
{
    static $instance = null; // экземпляр соединения

    private function __construct(){} // private запрещает создание нового объекта снаружи класса
    private function __clone(){} // запрещает копирование объекта
    private function __wakeup(){} 

    public static function getInstance()
    {
        if(is_null(static::$instance)){
            static::$instance = new static();  // new static() равносильно new Db() т.е. создаем экземпляр текущего класса (т.е. того класса, куда подмешан  трэйт)
        }
        return static::$instance;
    }
}