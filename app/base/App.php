<?php
namespace app\base;
include "../app/traits/TSingleton.php";
class App
{
    use \app\traits\TSingleton; // подмешивается (подключается) код трейта

    public $config; // run() присваивает подключение к конфигурационному файлу
    public $components; // run() присваивает new Storage()

    public static function call()
    {
        return static::getInstance(); // вызывается статический метод TSingletonа,
                                    // создается объект класса App (new App)
    }

    public function run()
    {
        $this->config = include "../app/config/main.php"; // подключается конфигурационный файл
            // в свойство помещается массив из конфигурационного файла
        $this->autoloadRegister(); // подключается автозагрузчик классов
        $this->components = new Storage(); // автозагрузчик подключает файл Storage.php
        $this->mainController->runAction(); // несуществующее свойство
            // запускается магический метод __get($name), $name - mainController
            // в результате создается объект класса FrontController
            // и запускается метод его родителя runAction()
    }

    private function autoloadRegister()
    {
        require "../app/services/Autoloader.php";
        spl_autoload_register([new \app\services\Autoloader(), 'loadClass']);
        // 'loadClass' - имя функции
        // spl_autoload_register - функция ядра PHP. Создает объект класса Autoloader
        // и регистрирует (запоминает) его как автозагрузчик, вызывая его функцию loadClass()
    }

    public function createComponent($name) // метод запускается из Storage.php
    {
        if(isset($this->config['components'][$name])){
            //$this->config['components']['mainController']
            $params = $this->config['components'][$name];
            // $params - 'class' => string 'app\controllers\FrontController'
            $className = $params['class'];
            // $className - 'app\controllers\FrontController'
            if(class_exists($className)){
                unset($params['class']); // так как в конструкторе нет
                // параметра 'class', его нужно удалить
                $reflection = new \ReflectionClass($className);
                // var_dump($reflection) - object(ReflectionClass)[4]
                // public 'name' => string 'app\controllers\FrontController'
                return $reflection->newInstanceArgs($params); // $params - empty
                // с помощью new \ReflectionClass($className) можно получить
                // подробную информацию о классе или объекте
                // newInstanceArgs($params) - метод Reflection API,
                // создает новый объект на основе названия класса
                // и передает в конструктор параметры,
                // т.е. создается объект  new FrontController и
                // передается в Storage.php get(), а затем в App.php run()
            }
        }
        return null;
    }

    function __get($name)  // для protected $properties
        // или для доступа к несуществующим свойствам
        // в $name попадает mainController из run()
    {
        return $this->components->get($name);
        // $this->components это new Storage()
        // $name - mainController
    }
}