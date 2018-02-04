<?php
namespace app\traits;

trait TSingleton  // trait - примесь, псевдокласс, который может подмешиваться в другие классы
                // отдельный объект от traitа создать нельзя
{
    static $instance = null;
    // в этом свойстве будет храниться ссылка на переменную объекта new App()
    // т.е. существует экземпляр класса new App()или нет

    private function __construct(){} // private запрещает создание нового объекта снаружи класса
    private function __clone(){} // запрещает копирование объекта
    private function __wakeup(){} 

    public static function getInstance()
    {
        if(is_null(static::$instance)){
            static::$instance = new static();
            // т.е. создаем экземпляр текущего класса (т.е. того класса, куда подмешан  трэйт)
            // т.к. в данном случае TSingleton подмешан в класс App
            // new static() равносильно new App()
            // в данном случае гарантируется, что будет создан только один класс new App()(программы)
        }
        return static::$instance;
    }
}