<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index()
    {
        return view('order.index', [
            'title' => 'Pembayaran',
            'active' => 'active',
            "cities" => Movie::getCities(),
        ]);
    }

    public function pay(Request $request)
    {
        return $request;
    }
}
