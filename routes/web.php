<?php

use App\Http\Controllers\DonasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {  
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/user', [UserController::class, 'index']);
Route::get('/login', [UserController::class, 'viewLogin']);
Route::get('/register', [UserController::class, 'viewRegister']);
Route::get('/update', [UserController::class, 'viewUpdate']);
Route::get('/security', [UserController::class, 'viewSecurity']);
Route::post('/user/login', [UserController::class, 'login']);
Route::post('/user/register', [UserController::class, 'register']);
Route::post('/user/update', [UserController::class, 'update']);
Route::post('/user/password', [UserController::class, 'password']);
Route::get('/user/logout', [UserController::class, 'logout']);

Route::get('/donasi', [DonasiController::class, 'index']);
Route::any('/donasi/add', [DonasiController::class, 'create']);
Route::get('/donasi/{id}', [DonasiController::class, 'open']);
Route::any('/donasi/{id}/bayar', [DonasiController::class, 'bayar']);
// Route::post('/donasi/add/submit', [DonasiController::class, 'create']);

Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/{slug}', [PostController::class, 'show']);