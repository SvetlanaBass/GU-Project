<?php
namespace app\controllers;
use app\interfaces\IRenderer;
use app\models\User;
use app\models\repositories\CartRepository;

abstract class Controller
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $useLayout = true;

    private $renderer; // object(app\services\renderers\TemplateRenderer)

    public function __construct(IRenderer $renderer = null)
        // новый объект new TemplateRenderer создается в момент
        // new $controllerClass(new TemplateRenderer),н-р, во FrontControllerе
    {
        $this->renderer = $renderer;
    }

    public function runAction($action = null) // $_GET['action']
    {
        $this->action = $action ?: $this->defaultAction; // 'index'
        $method = "action" . ucfirst($this->action);
        // формируем название метода (actionIndex)
        // ucfirst — Преобразует первый символ строки в верхний регистр
        if(method_exists($this, $method)){
            $this->$method();
        } else {
            echo "404";
        }
    }

    public function render($template, $params = [])
        // $template = "main", $params = ['products' => $products]
    {
        if($this->useLayout){
            return $this->renderTemplate("layouts/{$this->layout}",
                ['content' => $this->renderTemplate("site/$template", $params)]);
        } else {
            return $this->renderTemplate("site/$template", $params);
        }
    }

    public function renderTemplate($template, $params = [])
    {
        return $this->renderer->render($template, $params);
    }
    // renderer - создается new app\services\renderers\TemplateRenderer
    // т.к. TemplateRenderer реализует интерфейс IRenderer
    // render() - метод TemplateRenderer

    public function countUserGoods(){
        if (isset($_COOKIE['site_login'])){
            $entity = (new User());
            $login = $_COOKIE['site_login'];
            $entity->login = $login;

            // достаем пользователя из базы данных по логину
            $dbUser = $entity->getUser($entity);   // переход в app\models\DataEntity.php

            // достаем список товаров пользователя из корзины в БД
            $userCart = (new CartRepository())->getUserCart($dbUser->id_user);

            // подсчитываем количество товаров
            $goodsInCart = count($userCart);

        } else {
            $goodsInCart = 0;
        }
        return $goodsInCart;
    }
}