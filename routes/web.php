<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;   
Route::get('/',[CustomerController::class,'index'])->name('customer.index');
