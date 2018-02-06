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
            $errorNote = "Looks like either your email address or password were incorrect. Try again.";
            echo $this->render("login", ['errorNote' => $errorNote]);
        } else if ($dbUser->password !== $password){
            $errorNote = "Looks like either your email address or password were incorrect. Try again.";
            echo $this->render("login", ['errorNote' => $errorNote]);
        } else {
            $this->proceedLogin($dbUser->login, $dbUser->password);
            //header("Location: ".$_SERVER['HTTP_REFERER']);  //Автоматический возврат на предыдущую страницу.
            header('Location: /');
            //echo $this->render("main", []);
        }
    }

     function proceedLogin($login, $dbPass) {
        $_SESSION['login'] = $login;

         setcookie("site_hash", md5($dbPass), time() + 3600);
         setcookie("site_login", $login, time() + 3600);

         //setcookie("site_hash", md5($dbPass));  // удаляются в момент закрытия браузера
         //setcookie("site_login", $login);

         // запомнить пользователя на неделю
        //setcookie("site_hash", md5($dbPass), time() + 3600*24*7);
        //setcookie("site_login", $login, time() + 3600*24*7);

    }

}