<?php
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PassportAuthController;
use App\Http\Controllers\API\DonasiController;
use App\Http\Controllers\API\TransaksiDonasiController;
use App\Http\Controllers\API\TransaksiDonasiGuestController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);
Route::get('donasi', [DonasiController::class, 'all']);
Route::get('donasi/{id}', [DonasiController::class, 'showDonasi']);
Route::get('donasi/{id}/gettransaksi', [DonasiController::class, 'showTransaksi']);
Route::resource('transaksi', TransaksiDonasiGuestController::class);


Route::middleware('auth:api')->group(function () {
    Route::post('logout', [PassportAuthController::class, 'logout']);
    Route::get('profile', [PassportAuthController::class, 'show']);
    Route::post('update', [PassportAuthController::class, 'update']);
    Route::post('password', [PassportAuthController::class, 'password']);
    Route::resource('user/donasis', DonasiController::class);
    Route::get('user/transaksis', [DonasiController::class, 'showTransaksi']);
    Route::resource('donasis/transaksi', TransaksiDonasiController::class);
});
