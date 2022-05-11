<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Post_controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Post_controller::class, 'index']);

Route::post('/add_post', [Post_controller::class, 'add_post'])->name('add_post');

Route::get('/edit/{post}', [Post_controller::class, 'edit']);
Route::put('/edit_post/{post}', [Post_controller::class, 'edit_post']);

Route::delete('/delete_post/{post}', [Post_controller::class, 'delete_post']);
