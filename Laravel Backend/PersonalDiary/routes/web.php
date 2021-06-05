<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostMediaController;
use App\Http\Controllers\CalenderEventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TasksController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);

Route::resource('posts', PostsController::class);
Route::get('/postsSortbyTitle', [PostsController::class, 'sortbyTitle']);
// Route::get('/deletepostmedia', [PostsController::class, 'deletePostMedia']);

Route::resource('postmedia', PostMediaController::class);
Route::resource('calendarEvents', CalenderEventController::class);
Route::resource('profile', ProfileController::class);
Route::resource('tasks', TasksController::class);