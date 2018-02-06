<?php
namespace app\controllers;


class LogoutController extends Controller
{
    public function actionLogout(){
        session_start();    // Инициализируем сессию
        $_SESSION = array();    // Удаляем все переменные сессии
        setcookie("site_hash", "", time() - 3600);  //Удаляем сессионные cookie
        setcookie("site_login", "", time() - 3600);
        session_destroy();  // Уничтожаем сессию
        header('Location: /');  // Перенаправление пользователя на главную страницу
    }
}