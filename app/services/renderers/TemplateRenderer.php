<?php
namespace app\services\renderers;
use app\interfaces\IRenderer;
use app\base\App;
class TemplateRenderer implements IRenderer
{
    public function render($template, $params)
    {
        ob_start();
        extract($params);
        $templatePath = App::call()->config['templates_dir'] . $template . ".php";
        include $templatePath;
        return ob_get_clean();
    }
}