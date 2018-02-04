<?php
namespace app\services;
use app\base\App;
class Autoloader
{
    private $fileExtension = ".php";

    public function loadClass($className) // $className - сюда автоматически попадает
        // название класса создаваемого или вызываемого объекта, н-р, $className = 'app\base\Storage'
    {
        $className = str_replace(["app\\", "\\"], [App::call()->config['root_dir'] , "/"], $className);
        // $className = 'C:/OSPanel/domains/localhost/public/../app/base/Storage'
        $className .= $this->fileExtension;
        // $className = 'C:/OSPanel/domains/localhost/public/../app/base/Storage.php'
        if(file_exists($className)){
            require $className;  // если файл существует, подключаем его
        }
    }
}
