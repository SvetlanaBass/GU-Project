<?php
namespace app\models;

class User extends DataEntity
{
    public $id_user;
    public $first_name;
    public $last_name;
    public $login;
    public $password;

    public function __construct($id_user = null, $first_name = null,
                                $last_name = null, $login = null, $password = null)
    {
        $this->id_user = $id_user;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->login = $login;
        $this->password = $password;
    }
}