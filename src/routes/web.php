<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

Route::resource('company', CompanyController::class);
Route::get('/', function () {
    return view('welcome');
});

