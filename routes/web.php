<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $user = User::create([
        "name" => "mahdyar",
        "email" => "mahdyadaasfaaaaaaaasaaaaddsar@gmail.com",
        "password" => bcrypt("password")
    ]);



    return "User created!";
});
