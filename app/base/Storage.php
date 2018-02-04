<?php
namespace app\base;

class Storage   // получает из конфигурационного файла компоненты
                // и создает из них объекты методом get($key)
{
    protected $items = [];

    public function set($object, $key)
    {
        $this->items[$key] = $object;
    }

    public function get($key) // если объект не задан
        // $key - название компонента ('components') из конфигурационного файла
        // при первом запуске программы сюда передается $name/$key - 'mainController'
        // из App()-> __get($name)
    {
        if(!isset($this->items[$key])){ //$key - 'mainController'
            $this->items[$key] = App::call()->createComponent($key);
            // создается компонент (object(app\controllers\FrontController))
        }
        return $this->items[$key];
    }
}