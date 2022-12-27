<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Services\Midtrans\CallbackService;

class PaymentCallbackController extends Controller
{
    public function receive(Request $request)
    {
        $json = json_decode($request->getContent());

        $order = Payment::where('order_id', $json->order_id)->first();

        if ($order == null) {
            return abort(404);
        }

        if ($order->signature_key != $json->signature_key) {
            return abort(404);
        }
        return $order->update([
            "transaction_status" => $json->transaction_status,
        ]);
    }
}
