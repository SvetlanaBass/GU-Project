<?php
namespace app\services;

class Request
{
    private $requestString;
    private $controllerName;
    private $actionName;
    private $params;

    private $pattern = "#(?P<controller>\w+)[/]?(?P<action>\w+)?[/]?[?]?(?P<params>.*)#ui";

    public function __construct()
    {
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->parseRequest();

    }

    private function parseRequest()
    {
        if (preg_match_all($this->pattern, $this->requestString, $matches)) {

            $this->controllerName = $matches['controller'][0];
            $this->actionName = $matches['action'][0];
            $this->params = $_REQUEST;
        }
    }

    public function getControllerName()
    {
        return $this->controllerName;   // null
    }

    public function getActionName()
    {
        return $this->actionName; // null
    }

    public function getParams()
    {
        return $this->params;
    }

    public function get($name)
    {
        if (key_exists($name, $this->params)) {
            return $this->params[$name];
        }
        return null;
    }
}