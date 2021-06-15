<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostMediaController;
use App\Http\Controllers\CalenderEventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\gCalendarController;
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
Route::get('/postssortbyCreated', [PostsController::class, 'sortbyCreated']);
Route::resource('postmedia', PostMediaController::class);

Route::resource('profile', ProfileController::class);
Route::post('change-password', [ProfileController::class, 'changePassword']);

Route::resource('tasks', TasksController::class);
Route::post('completeTask/{task}', [TasksController::class, 'completeTask']);

Route::resource('calendar', gCalendarController::class);
Route::get('oauth', [gCalendarController::class, 'oauth'])->name('oauthCallback');
Route::get('eventsdata', [gCalendarController::class, 'events_raw_data']);

