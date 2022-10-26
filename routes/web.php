<?php

use Illuminate\Support\Facades\Route;
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
});

Route::get('users', [UserController::class, 'index']);

Route::get('/home', function () {
    return view('home');
});
//Route::get('/profile', function () {
//    return view('profile');
//});
Route::get('/ship', function () {
    return view('ship_general');
});
Route::get('/ship_drive', function () {
    return view('ship_drive');
});
Route::get('/account', function () {
    return view('account');
});


Route::get('/shopping', [ShoppingController::class, 'show']);




Route::post('/account', [AccountController::class, 'descriptionRequest']);

Route::post("/", [UserController::class, 'userLogin']);

Route::get("/nopage", [NopageController::class, 'noPageYet']);




//tut group middleware
Route::group(['middleware' => ['protectedPage']], function(){
    Route::get('/profile', function () {
        return view('profile');
    });
});
//tut route middleware
// Route::get('/account', function () {
//     return view('account');
// })->middleware('ageProtected');
//route::view('url','filename')->middleware('1stroutename ','2ndroutename','another');

