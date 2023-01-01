<?php

use App\Http\Controllers\AdminCustomer;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminSalesController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\SettingController;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberOrders;
use App\Http\Controllers\MemberTiketController;
use App\Http\Controllers\OrderAjaxController;
use App\Http\Controllers\PaymentCallbackController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TheaterController;
use App\Http\Controllers\TicketController;

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
Route::get('/logout', [LoginController::class, 'logout']);
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

Route::get('/theater/', [TheaterController::class, 'index']);


Route::get('/schedules/{theater}', function ($theater) {
    $schedules = Movie::getSchedules($theater);
    return $schedules;
});
Route::get('/schedules/{theater}/{id}', function ($theater, $id) {
    $schedules = Movie::getSchedulesDetail($theater, $id);
    return $schedules;
});

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::post('payments/midtrans-notification', [PaymentCallbackController::class, 'receive']);
Route::post('search', [AjaxController::class, 'ajaxSearch'])->name('search');
Route::get('search', [SearchController::class, 'index']);

//route admin 
Route::middleware('admin')->group(function () {
    Route::resource('/dashboard/sales', AdminSalesController::class);
    Route::resource('/dashboard/orders', AdminOrderController::class);
    Route::resource('/dashboard/customers', AdminCustomer::class);
});

// route auth
Route::middleware('auth')->group(function () {
    //order
    Route::get('/order', [OrderController::class, 'index']);
    Route::post('/pay', [OrderController::class, 'insertData']);
    Route::post('/payment', [OrderController::class, 'order']);
    Route::get('/payment', [OrderController::class, 'order']);
    Route::controller(OrderAjaxController::class)->group(function () {
        Route::post('order-ajax-cities', 'cities')->name('order.cities');
        Route::post('order-ajax-pending-payment', 'pendingPayment')->name('order.pending.payment');
        Route::post('order-ajax-success-payment', 'successPayment')->name('order.success.payment');
        Route::post('order-ajax-theaters', 'theaters')->name('order.theaters');
        Route::post('order-ajax-schedules', 'schedules')->name('order.schedules');
        Route::post('order-ajax-schedules-details', 'schedulesDetails')->name('order.schedules.details');
    });

    //dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/dashboard/member/orders', MemberOrders::class);
    Route::resource('/dashboard/member/tiket', MemberTiketController::class);
    Route::get('/dashboard/orders/pdf/{id}', [AdminOrderController::class, 'pdf'])->name('pdf');
    Route::get('/dashboard/orders/downloadpdf/{id}', [AdminOrderController::class, 'downloadPDF'])->name('down.pdf');
    Route::resource('/dashboard/member/setting', SettingController::class);
    Route::resource('/dashboard/setting', SettingController::class);
    Route::resource('/dashboard/member/password', PasswordController::class);
    Route::resource('/dashboard/password', PasswordController::class);
    Route::get('/dashboard/tiket/{id}', [TicketController::class, 'index']);
});
