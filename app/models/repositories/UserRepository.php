<?php
namespace app\models\repositories;
use app\models\Repository;
use app\models\User;
class UserRepository extends Repository
{
    public static function getTableName()
    {
        return 'users';
    }

    static public function getEntityClass()
    {
        return User::class;
    }
}