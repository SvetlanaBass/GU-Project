<?php
namespace app\controllers;

class LoginController extends Controller
{
    public function actionRenderLoginPage()
    {
        echo $this->render("login", []);
    }
}