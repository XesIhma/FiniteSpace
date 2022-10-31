<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\NopageController;
use App\Http\Controllers\ShoppingController;

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
    return view('welcome');
})->name('root');

Route::get('users', [UserController::class, 'index']);

Route::post('/account', [AccountController::class, 'descriptionRequest']);

//Route::post("/", [UserController::class, 'userLogin']);

Route::post("/login", [AuthController::class, 'login']);
Route::post("/register", [AuthController::class, 'register']);
Route::get("/logout", [AuthController::class, 'logout']);

Route::get("/nopage", [NopageController::class, 'noPageYet']);

Route::middleware('auth')->group(function(){

    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/profile', function () {
        return view('profile');
    });

    Route::get('/ship', function () {
        return view('ship_general');
    });

    Route::get('/ship_drive', function () {
        return view('ship_drive');
    });

    Route::get('/shopping', [ShoppingController::class, 'show']);

    Route::get('/account', function () {
        return view('account');
    });

});
