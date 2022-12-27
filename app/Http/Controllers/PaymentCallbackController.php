<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Services\Midtrans\CallbackService;

class PaymentCallbackController extends Controller
{
    public function receive()
    {
        $callback = new CallbackService;

        if ($callback->isSignatureKeyVerified()) {
            $notification = $callback->getNotification();
            $order = $callback->getOrder();

            if ($callback->isSuccess()) {
                Payment::where('id', $order->id)->update([
                    'transaction_status' => $notification->transaction_status,
                ]);
            }

            if ($callback->isExpire()) {
                Payment::where('id', $order->id)->update([
                    'transaction_status' => 'expire',
                ]);
            }

            if ($callback->isCancelled()) {
                Payment::where('id', $order->id)->update([
                    'transaction_status' => 'cancel',
                ]);
            }

            return response()
                ->json([
                    'success' => true,
                    'message' => 'Notifikasi berhasil diproses',
                ]);
        } else {
            return response()
                ->json([
                    'error' => true,
                    'message' => 'Signature key tidak terverifikasi',
                ], 403);
        }
    }
}
