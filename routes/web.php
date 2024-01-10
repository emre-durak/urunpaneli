<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;



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
    return view('index');
})->name("/");


// Kayıt İşlemi
Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [RegisterController::class, 'register']);


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/urunler',"UrunController@index")->name("urunler")->middleware('auth');

Route::get("/urun","UrunController@create")->name("urun.create");
Route::post("/urun","UrunController@store")->name("urun.store");

Route::delete("/urun/{urun}","UrunController@destroy")->name("urun.destroy");

Route::get("/urun/{urun}","UrunController@edit")->name("urun.edit");
Route::put("/urun/{urun}","UrunController@update")->name("urun.update");
