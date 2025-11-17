<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(UserController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('view/{id}', 'view');
    Route::view('add', 'users.add');
    Route::get('edit/{id}', 'edit');
    Route::post('add-save', 'addSave');
    Route::post('edit-save/{id}', 'editSave');
    Route::delete('delete/{id}', 'destroy');
});