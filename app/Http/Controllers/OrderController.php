<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class OrderController extends Controller
{
    //
    public function index()
    {
        $faker = Faker::create('id_ID');
        $order_id = $faker->bothify('?????-#####');
        return view('order.index', [
            'title' => 'Pembayaran',
            'active' => 'active',
            "cities" => Movie::getCities(),
            "order_id" => $order_id
        ]);
    }

    public function pay(Request $request)
    {
        $midtrans = new CreateSnapTokenService($request);
        $snapToken = $midtrans->getSnapToken();
        $movie = Movie::getDetails($request['id-movie']);

        return view('order.pay', [
            'title' => 'payment',
            'active' => 'active',
            'snap' => $snapToken,
            'tiket' => $request,
            'movie' => $movie,
        ]);
    }
}
