<?php
return [
    'root_dir' => $_SERVER['DOCUMENT_ROOT'] . "/../app/",
    'controllers_namespaces' => 'app\controllers\\',
    'templates_dir' => $_SERVER['DOCUMENT_ROOT'] . "/../app/views/templates/",
    'components' => [
        'db' => [
            'class' => \app\services\Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => '',
            'database' => 'shopshop',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => \app\services\Request::class
        ],
        'mainController' => [
            'class' => \app\controllers\FrontController::class
        ]
    ]
];



/*
define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT'] . "/../app/");
define('TEMPLATES_DIR', ROOT_DIR . "views/templates/");
define("CONTROLLERS_NAMESPACE", 'app\controllers\\');
*/