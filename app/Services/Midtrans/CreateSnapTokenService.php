<?php

namespace App\Services\Midtrans;

use App\Models\User;
use Midtrans\Snap;
use Illuminate\Support\Facades\DB;

class CreateSnapTokenService extends Midtrans
{
    protected $order;

    public function __construct($order)
    {
        parent::__construct();

        $this->order = $order;
    }

    public function getSnapToken()
    {
        $customer = DB::table('users')->where('id',  $this->order->user_id)->first();

        $params = [
            'transaction_details' => [
                'order_id' => $this->order->order_id,
                'gross_amount' => $this->order->total_price,
            ],
            'item_details' => [
                [
                    'id' => 1,
                    'quantity' => 1,
                    'name' => $this->order->movie,
                    'price' => $this->order->total_price,
                    'brand' => 'Arjuna21',
                    'category' => $this->order->type,
                    'merchant_name' => 'Ticket Bioskop',
                ]
            ],
            'customer_details' => [
                'first_name' => $customer->name,
                'email' => $customer->email,
                'phone' => $customer->no_telphone,
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }
}
