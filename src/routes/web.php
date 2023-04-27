<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Route;

Route::resource('company', CompanyController::class);

Route::resource('department', DepartmentController::class);

Route::resource('position', PositionController::class);

Route::resource('employee', EmployeeController::class);


Route::get('/', function () {
    return view('welcome');
});

