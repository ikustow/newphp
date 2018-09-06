<?php
namespace App;
class User extends \Illuminate\Database\Eloquent\Model
{

    public $timestamps = false;

    public  function findUser($username,$password)
    {
        return User::where('name', '=', $username)->Where('password', '=', $password)->get();
    }
}