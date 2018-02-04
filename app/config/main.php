<?php
return [
    'root_dir' => $_SERVER['DOCUMENT_ROOT'] . "/../app/",
    'controllers_namespaces' => 'app\controllers\\',
    'templates_dir' => $_SERVER['DOCUMENT_ROOT'] . "/../app/views/templates/",
    'components' => [
        'db' => [
            'class' => \app\services\Db::class, // 'db' является эземпляром класса Db
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => '',
            'database' => 'shopshop',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => \app\services\Request::class  // 'request' является эземпляром класса Request
        ],
        'mainController' => [
            'class' => \app\controllers\FrontController::class
            // 'mainController' является эземпляром класса FrontController
            // ::class - специальная константа, которой на этапе компиляции
            // присваивается полное имя класса,
            // н-р, echo bar::class; // foo\bar (выводится назвние класса с пространством имен)
        ]
    ]
];

/*
define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT'] . "/../app/");
define('TEMPLATES_DIR', ROOT_DIR . "views/templates/");
define("CONTROLLERS_NAMESPACE", 'app\controllers\\');

$_SERVER['DOCUMENT_ROOT'] - константа корневой директории
string 'C:/OSPanel/domains/localhost/public'
т.е. выйти из папки public в корневую директорию (public/../)
*/