<?php
namespace app\controllers;

class RegisterController extends Controller
{
    public function actionRenderRegisterPage()
    {
        echo $this->render("registerPage", []);
    }
}