<?php
require_once  $_SERVER["DOCUMENT_ROOT"]."/vendor/autoload.php";
class User extends \Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;
    public $table = "users";

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function findCurrentUser($username, $password)
    {
        return  User::newQuery()->Where("login", '=', $username)->Where('password', '=', $password)->get()->toArray();
    }

    public function findUserbyID($id)
    {
        return  self::Query()->Where("id", '=', $id)->get()->toArray();
    }
}
