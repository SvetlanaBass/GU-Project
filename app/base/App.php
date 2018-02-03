<?php
namespace app\base;
include "../app/traits/TSingleton.php";
class App
{
    use \app\traits\TSingleton;

    public $config;
    public $components;

    public static function call()
    {
        return static::getInstance();
    }

    public function run()
    {
        $this->config = include "../app/config/main.php";
        $this->autoloadRegister();
        $this->components = new Storage();
        $this->mainController->runAction();
    }

    private function autoloadRegister()
    {
        require "../app/services/Autoloader.php";
        spl_autoload_register([new \app\services\Autoloader(), 'loadClass']); // 'loadClass' - имя функции
    }

    public function createComponent($name)
    {
        if(isset($this->config['components'][$name])){
            $params = $this->config['components'][$name];
            $className = $params['class'];
            if(class_exists($className)){
                unset($params['class']);
                $reflection = new \ReflectionClass($className);
                return $reflection->newInstanceArgs($params);
            }
        }
        return null;
    }

    function __get($name)
    {
        return $this->components->get($name);
    }
}