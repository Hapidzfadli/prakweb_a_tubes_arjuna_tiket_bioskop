<?php

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\OrderAjaxController;

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

Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/upcoming', function () {
    $upcoming = Movie::getUpcoming();
    return view('page.upcoming', [
        'title' => 'upcoming',
        'active' => 'upcoming',
        'posts' => $upcoming
    ]);
});
Route::get('/cities', function () {
    $cities = Movie::getCities();
    return $cities;
});

Route::get('/theater/{city_id}', function ($city_id) {
    $theater = Movie::getTheaters($city_id);
    return view('page.theater', [
        'title' => 'theater',
        'active' => 'theater',
        'posts' => $theater
    ]);
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

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/dashboard', function () {
    $listnavitem = [
        [
            'title' => 'Dashboard',
            'icon' => 'home-outline',
        ],
        [
            'title' => 'Customers',
            'icon' => 'people-outline',
        ],
        [
            'title' => 'Messege',
            'icon' => 'chatbubble-outline',
        ],
        [
            'title' => 'Help',
            'icon' => 'help-outline',
        ],
        [
            'title' => 'Setting',
            'icon' => 'settings-outline',
        ],
        [
            'title' => 'Password',
            'icon' => 'lock-closed-outline',
        ],
        [
            'title' => 'Sign Out',
            'icon' => 'log-out',
        ],
    ];
    return view('dashboard.index', [
        'title' => 'Dashboard',
        'listnav' => $listnavitem,
    ]);
});
