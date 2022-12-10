<?php

use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Models\Movie;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/movie/{id}', [DetailController::class, 'index']);

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
