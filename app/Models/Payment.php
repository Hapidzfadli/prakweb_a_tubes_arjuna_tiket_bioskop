<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function pending($result)
    {
        $data = [
            'payment_type' => $result->data['payment_type'],
            'pdf_url' => $result->has('data.pdf_url') ? $result->data['pdf_url'] : null,
            'status_code' => $result->data['status_code'],
            'gross_amount' => $result->gross_amount . ".00",
            'order_id' =>  $result->order_id,
            'transaction_status' => $result->data['transaction_status'],
        ];

        $signature_key = $data['order_id'] . $data['status_code'] . $data['gross_amount'] . env('MIDTRANS_SERVER_KEY');
        $data['signature_key'] = hash("sha512", $signature_key);

        $data_order = strval($result->order_id);

        $cekorder = Payment::where('order_id', '=', $data_order)->first();

        if ($cekorder) {
            Payment::where('order_id', '=', $data_order)->update($data);
        } else {
            Payment::create($data);
        }

        return $result;
    }

    public static function success($result)
    {
        $data = [
            'transaction_time' => $result->has('data.transaction_time') ? $result->data['transaction_time'] : null,
            'transaction_status' => $result->has('data.transaction_status') ? $result->data['transaction_status'] : null,
            'transaction_id' => $result->has('data.transaction_id') ? $result->data['transaction_id'] : null,
            'settlement_time' => $result->has('data.settlement_time') ? $result->data['settlement_time'] : null,
            'payment_type' => $result->has('data.payment_type') ? $result->data['payment_type'] : null,
            'status_code' => $result->has('data.status_code') ? $result->data['status_code'] : null,
            'order_id' => $result->has('data.order_id') ? $result->data['order_id'] : null,
            'pdf_url' => $result->has('data.pdf_url') ? $result->data['pdf_url'] : null,
            'gross_amount' => $result->has('data.gross_amount') ? $result->data['gross_amount'] : null,
            'fraud_status' => $result->has('data.fraud_status') ? $result->data['fraud_status'] : null,
        ];

        $signature_key = $result->data['order_id'] . $result->data['status_code'] . $result->data['gross_amount'] . env('MIDTRANS_SERVER_KEY');

        $data['signature_key'] = hash("sha512", $signature_key);

        $data_order = strval($data['order_id']);

        $cekorder = Payment::where('order_id', '=', $data_order)->first();

        if ($cekorder) {
            Payment::where('order_id', '=', $data_order)->update($data);
        } else {
            Payment::create($data);
        }

        return $data;
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'order_id');
    }
}
