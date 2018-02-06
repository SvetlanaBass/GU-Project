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

        // достаем пользователя из базы данных по логину
        $dbUser = $entity->getUser($entity);   // переход в app\models\DataEntity.php

        // и проверяем соответствие логина и паролей пользователя и в базе данных
        if ($dbUser === false){
            echo "Нет такого пользователя";
        } else if ($dbUser->password !== $password){
            echo "Неправильный пароль";
        } else {
            $this->proceedLogin($dbUser->login, $dbUser->password);
            echo $this->render("authorizationMain", []);
        }
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