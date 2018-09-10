<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;
require_once "config.php";

//Capsule::schema()->dropIfExists('users');
//
//Capsule::schema()->create('users', function (Blueprint $table) {
//    $table->increments('id');
//    $table->string('name');
//    $table->string('login');
//    $table->string('password');
//    $table->integer('age');
//    $table->string('avatar');
//    $table->string('avatarURL');
//    $table->string('info');
//});
////=========================
//Capsule::schema()->dropIfExists('files');
//
//Capsule::schema()->create('files', function (Blueprint $table) {
//    $table->increments('id');
//    $table->string('userid');
//    $table->string('FileModel');
//    $table->string('filepath');
//
//});
Capsule::schema()->dropIfExists('goods');
Capsule::schema()->create('goods', function (Blueprint $table) {
    $table->increments('id');
    $table->string('good');
    $table->string('category');
});

