<?php

use App\Http\Controllers\authController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', 'authController@login')->name('login');
Route::post('/loginPost', 'authController@loginPost');
Route::get('/logout', 'authController@logout');

Route::group(['auth' => 'login'], function () {

    Route::get('/dashboard', 'homeController@getDashboard');
    
    // foods
    Route::get('/foods', 'foodController@getFoods');
    Route::post('/create-food', 'foodController@createFoods');
    Route::match(['get','post'], '/foods/edit{id}','foodController@updateFoods');
    Route::get('/delete-foods/{id}', 'foodController@deleteFoods');

    // drinks
    Route::get('/drinks', 'drinkController@getDrinks');
    Route::post('/create-drink', 'drinkController@createDrinks');
    Route::match(['get','post'], '/edit{id}','drinkController@updateDrinks');
    Route::get('/delete-drinks/{id}', 'drinkController@deleteDrinks');

    // profile
    Route::get('/profile', 'homeController@getProfile');
    Route::get('/laporan/{id}', 'homeController@getLaporan');

    // pesanan
    Route::get('/pesanan-all', 'pesananController@getPesanan');
    Route::post('/create-sell', 'pesananController@createSells');
    Route::match(['get','post'], '/pesanan/edit{id}','pesananController@updatePesanan');
    Route::get('/delete-pesanan/{id}', 'pesananController@deletePesanan');
    
    // pesanan active only
    Route::get('/pesanan/active', 'pesananActiveController@pesananactive');
    Route::post('/create-sell/active', 'pesananActiveController@createpesanActive');
    Route::match(['get','post'], '/pesanan/active/edit{id}','pesananActiveController@updatepesananactive');
    Route::get('/delete-pesanan/active/{id}', 'pesananActiveController@deletePesananActive');
});