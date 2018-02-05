<?php
namespace app\controllers;
use app\models\User;

class SaveNewUserController extends Controller
{
    public function actionExecute(){
        $entity = (new User());

        $firstName = $_POST['username'];
        $entity->first_name = $firstName;

        $lastName = $_POST['usersurname'];
        $entity->last_name = $lastName;

        $login = $_POST['login'];
        $entity->login = $login;

        $password = md5($_POST['password']); // md5 - защита пароля
        $entity->password = $password;

        $entity->saveUser($entity);  // переход в app\models\DataEntity.php
        echo $this->render("successUserRegistration", []);
    }
}