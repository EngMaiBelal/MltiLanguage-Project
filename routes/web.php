<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/create-category',[CategoryController::class,'create']);
    Route::post('/store-category',[CategoryController::class,'store'])->name('category.store'); 
});