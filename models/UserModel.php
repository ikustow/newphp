<?php

class UserModel extends \Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;
    public $table = "users";

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public static function findCurrentUser($username, $password)
    {
        return  UserModel::Query()->Where("login", '=', $username)->Where('password', '=', $password)->get()->toArray();
    }

    public static function findUserbyID($id)
    {
        return  self::Query()->Where("id", '=', $id)->get()->toArray();
    }
}
