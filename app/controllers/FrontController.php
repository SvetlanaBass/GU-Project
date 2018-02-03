<?php
namespace app\controllers;
use app\services\Request;
use app\base\App;
class FrontController extends Controller
{
    private $defaultController = 'main';

    public function actionIndex()
    {
        $request = App::call()->request;
        $controllerName = $request->getControllerName() ?: $this->defaultController;
        $actionName = $request->getActionName();

        $controllerClass = App::call()->config['controllers_namespaces'] . ucfirst($controllerName) . "Controller";

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass(
                new \app\services\renderers\TemplateRenderer()
            );
            $controller->runAction($actionName);
        }
    }
}