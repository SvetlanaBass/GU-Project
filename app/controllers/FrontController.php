<?php
namespace app\controllers;
use app\services\Request;
use app\base\App;
class FrontController extends Controller
{
    private $defaultController = 'main';

    public function actionIndex()
    {
        $request = App::call()->request; // несуществующее св-во. Создается объект new Request
        $controllerName = $request->getControllerName() ?: $this->defaultController; //(null)'main'
        $actionName = $request->getActionName(); // null
        $controllerClass = App::call()->config['controllers_namespaces'] . ucfirst($controllerName) . "Controller";
        // $controllerClass = 'app\controllers\MainController'
        if (class_exists($controllerClass)) {
            $controller = new $controllerClass( // new MainController(new TemplateRenderer())
                new \app\services\renderers\TemplateRenderer()
            );
            $controller->runAction($actionName); // new MainController->runAction(null)
                                                // runAction(null) - метод родителя (Controller.php)
        }
    }
}