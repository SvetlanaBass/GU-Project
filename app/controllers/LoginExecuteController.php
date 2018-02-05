<?php
namespace app\controllers;
use app\models\User;

class LoginExecuteController extends Controller
{
    public function actionExecute(){
        $entity = (new User());

        $login = $_POST['login']; // получили из формы (login.php) логин
        $entity->login = $login;

        $password = md5($_POST['password']); // получили защищенный пароль
        $entity->password = $password;

        // достаем пользователя из базы данных по логину
        // и проверяем соответствие паролей пользователя и в базе данных
        if ($entity->getUser($entity) === false){    // переход в app\models\DataEntity.php

        }





        // если пароли совпадают, вызываем функцию proceedLogin($login, $dbPass)

        // рендерим главную страницу с данными пользователя
    }




    // описываем функцию proceedLogin($login, $dbPass)
    /*
     function proceedLogin($login, $dbPass) {
        $_SESSION['login'] = $login;

        if($_POST['rememberme'] == 'on'){
            setcookie("site_hash", md5($dbPass), time() + 3600*24*7);
            setcookie("site_login", $login, time() + 3600*24*7);
        } else {
            setcookie("site_hash", md5($dbPass));
            setcookie("site_login", $login);
        }
    }
     */

}