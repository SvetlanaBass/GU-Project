<?php
namespace app\services;
use app\base\App;
class Autoloader
{
    private $fileExtension = ".php";

    public function loadClass($className)
    {
        $className = str_replace(["app\\", "\\"], [App::call()->config['root_dir'] , "/"], $className);
        $className .= $this->fileExtension;
        if(file_exists($className)){
            require $className;
        }
    }
}
