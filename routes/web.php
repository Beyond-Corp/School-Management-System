<?php

use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});


Route::resource('students', StudentsController::class);