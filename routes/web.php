<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('base');
// });


Route::get('/', [MainController::class, 'home'])->name('home');
Route::get('/tolotra', [MainController::class, 'tolotra']);
Route::get('/info', [MainController::class, 'info']);
Route::get('/contact', [MainController::class, 'contact']);
Route::get('/fidirana', [MainController::class, 'fidirana']);
Route::post('/fidirana', [MainController::class, 'fidirana_form']);
Route::get('/admin', [MainController::class, 'admin']); 
Route::post('/admin',[MainController::class,'add_post']);
Route::delete('/clients/{id}', [MainController::class, 'delete_client'])->name('delete_client');
Route::get('/delete_post', [MainController::class, 'delete_post'])->name('delete_post');