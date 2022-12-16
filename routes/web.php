<?php

use App\Models\Movie;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\OrderAjaxController;
use Illuminate\Http\Request;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/movie/{id}', [DetailController::class, 'index']);

Route::get('/login', function () {
    return view('login.index',  [
        'title' => 'login',
        'active' => 'playing'
    ]);
});

Route::get('/register', function () {
    return view('register.index',  [
        'title' => 'register',
        'active' => 'playing'
    ]);
});

Route::get('/upcoming', function () {
    $upcoming = Movie::getUpcoming();
    return $upcoming;
});
Route::get('/cities', function () {
    $cities = Movie::getCities();
    return $cities;
});
Route::get('/theater/{city_id}', function ($city_id) {
    $theater = Movie::getTheaters($city_id);
    return $theater;
});

Route::get('/schedules/{theater}', function ($theater) {
    $schedules = Movie::getSchedules($theater);
    return $schedules;
});
Route::get('/schedules/{theater}/{id}', function ($theater, $id) {
    $schedules = Movie::getSchedulesDetail($theater, $id);
    return $schedules;
});

Route::get('/order', [OrderController::class, 'index']);
Route::controller(OrderAjaxController::class)->group(function () {
    Route::post('order-ajax-cities', 'cities')->name('order.cities');
    Route::post('order-ajax-theaters', 'theaters')->name('order.theaters');
    Route::post('order-ajax-schedules', 'schedules')->name('order.schedules');
    Route::post('order-ajax-schedules-details', 'schedulesDetails')->name('order.schedules.details');
});

Route::post('/pay', [OrderController::class, 'insertData']);
Route::post('/payment', [OrderController::class, 'order']);
Route::get('/payment', [OrderController::class, 'order']);
