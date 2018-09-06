<?php

class User extends \Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;

    public function findCurrentUser($username,$password)
    {
        return self::with($username)->Where('password', '=', $password)->get();
    }
}