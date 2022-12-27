<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Order;
use App\Models\Seat;
use App\Models\User;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function index()
    {
        return view('order.index', [
            'title' => 'Pembayaran',
            'active' => 'order',
            "cities" => Movie::getCities(),
        ]);
    }

    public function order(Order $order)
    {
        $order_id = session()->get('order_id');
        $seat = Seat::where('order_id', $order_id)->get();

        $order = Order::find($order_id);
        $movie = Movie::getDetails($order->id_movie);
        return view('order.pay', [
            'title' => "Pembayaran",
            'active' => 'active',
            'order' => $order,
            'seat' => $seat,
            'movie' => $movie,
            'snap' => $order->snap_token,
        ]);
    }

    public function insertData(Request $request)
    {
        $request['user_id'] = auth()->user()->id;
        $faker = Faker::create('id_ID');
        $order_id = $faker->bothify('?????-#####');
        $request['order_id'] = $order_id;

        $midtrans = new CreateSnapTokenService($request);
        $snapToken = $midtrans->getSnapToken();

        $validatedData = $request->validate([
            'order_id' => 'required|min:9|max:255',
            'total_price' => 'required|numeric|between:1,99999999999999',
            'city' => 'required',
            'theater' => 'required',
            'type' => 'required',
            'date' => 'required',
            'time' => 'required',
            'movie' => 'required',
            'id_movie' => 'required',
            'jml_tiket' => 'required|numeric|between:1,20',
        ]);
        $validatedData['user_id'] = $request->user_id;
        $validatedData['snap_token'] = $snapToken;
        $validatedData['payment_id'] = $order_id;
        $validatedData['seat_id'] = $order_id;

        $id = Order::find($order_id);

        if ($id == null) {
            Order::create($validatedData);
            $seat = array();

            foreach ($request->seat as $item) {
                array_push($seat, [
                    'order_id' => $order_id,
                    'no_seat' => $item,
                    "created_at" =>  date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s'),
                ]);
            }

            Seat::insert($seat);
        }
        session()->forget('order_id');
        session()->put('order_id', $order_id);

        return redirect('payment');
    }
}
