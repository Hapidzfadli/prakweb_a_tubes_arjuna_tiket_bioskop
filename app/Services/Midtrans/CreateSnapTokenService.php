<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;

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
        $faker = \Faker\Factory::create();
        $params = [
            'transaction_details' => [
                'order_id' => $faker->bothify('?????-#####'),
                'gross_amount' => str_replace(".", "", $this->order->price),
            ],
            'item_details' => [
                [
                    'id' => 1,
                    'quantity' => 1,
                    'name' => $this->order->movie,
                    'price' => str_replace(".", "", $this->order->price),
                    'brand' => 'Arjuna21',
                    'category' => $this->order->type,
                    'merchant_name' => 'Ticket Bioskop',
                ]
            ],
            'customer_details' => [
                'first_name' => 'Hapid Fadli',
                'email' => 'hapidzfadli@gmail.com',
                'phone' => '085797463762',
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }
}
