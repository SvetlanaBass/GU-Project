<?php
namespace app\services\renderers;
use app\interfaces\IRenderer;
use app\base\App;
class TemplateRenderer implements IRenderer
{
    public function render($template, $params) // $template - 'site/main', 'layouts/main'
        // $params - array (size=1)'products' => array (size=10 - объекты Product)
    {
        ob_start();
        extract($params);
        $templatePath = App::call()->config['templates_dir'] . $template . ".php";
        // $templatePath = 'C:/OSPanel/domains/localhost/public/../app/views/templates/layouts/main.php'
        // $templatePath = string 'C:/OSPanel/domains/localhost/public/../app/views/templates/site/main.php'
        include $templatePath;
        return ob_get_clean();
    }
}