<?php

use App\Http\Controllers\TodolistController;
use Illuminate\Support\Facades\Route;
Route::get('/', [TodolistController::class,'index'])->name('index');

Route::post('/', [TodolistController::class,'store'])->name('store');

//Route::get('/{todolist:id}', [TodolistController::class,'destroy'])->name('destroy');

 //Route::delete('/todolist/{id}', 'TodolistController@destroy');
 Route::delete('/todolist/{id}', 'App\Http\Controllers\TodolistController@destroy');



 Route::POST('/todolist/{id}', 'App\Http\Controllers\TodoListController@update');

 //Route::patch('/todolist/{id}', 'TodoListController@update');

