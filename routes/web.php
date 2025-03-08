<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueryLogController;

Route::get('/', function () {

    User::create([
        "name" => "mahdyar",
        "email" => "mahdyadaasfaaaaaaaasaaaaddsar@gmail.com",
        "password" => bcrypt("password")
    ]);



    return "User created!";
});

Route::post('/log-query', [QueryLogController::class, 'store']);