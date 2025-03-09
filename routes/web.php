<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueryLogController;

Route::get('/', function () {

    User::create([
        "name" => "mahdyar",
        "email" => "ssssad@gmail.com",
        "password" => bcrypt("password")
    ]);

    return "User created!";
});