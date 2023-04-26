<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::resource('company', CompanyController::class);

Route::resource('department', DepartmentController::class);

Route::get('/', function () {
    return view('welcome');
});

