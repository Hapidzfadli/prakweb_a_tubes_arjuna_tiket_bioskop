<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(15)->create();
        Payment::insert([

            [
                "transaction_time" => "2021-06-15 18:45:13",
                "transaction_status" => "pending",
                "transaction_id" => "513f1f01-c9da-474c-9fc9-d5c64364b709",
                "signature_key" => "2496c78cac93a70ca08014bdaaff08eb7119ef79ef69c4833d4399cada077147febc1a231992eb8665a7e26d89b1dc323c13f721d21c7485f70bff06cca6eed3",
                "settlement_time" => "2021-06-15 18:45:28",
                "payment_type" => "gopay",
                "order_id" => "Order-5100",
                "pdf_url" => "G141532850",
                "gross_amount" => "154600.00",
                "fraud_status" => "accept",
                "currency" => "IDR",
                "status_code" => "200",
            ],
            [
                "transaction_time" => "2021-06-23 13:28:05",
                "transaction_status" => "settlement",
                "transaction_id" => "513f1f01-c9da-474c-9fc9-d5c64364b709",
                "signature_key" => "2496c78cac93a70ca08014bdaaff08eb7119ef79ef69c4833d4399cada077147febc1a231992eb8665a7e26d89b1dc323c13f721d21c7485f70bff06cca6eed3",
                "settlement_time" => "2021-06-23 13:28:21",
                "payment_type" => "shopeepay",
                "order_id" => "shopeepay-01",
                "pdf_url" => "G141532850",
                "gross_amount" => "16700.00",
                "fraud_status" => "accept",
                "currency" => "IDR",
                "status_code" => "200",
            ],
            [
                "transaction_time" => "2021-06-23 11:27:20",
                "transaction_status" => "cancel",
                "transaction_id" => "9aed5972-5b6a-401e-894b-a32c91ed1a3a",
                "signature_key" => "fe5f725ea770c451017e9d6300af72b830a668d2f7d5da9b778ec2c4f9177efe5127d492d9ddfbcf6806ea5cd7dc1a7337c674d6139026b28f49ad0ea1ce5107",
                "settlement_time" => "2021-06-23 11:27:50",
                "payment_type" => "bank_transfer",
                "order_id" => "bca-va-01",
                "pdf_url" => "G141532850",
                "gross_amount" => "100000.00",
                "fraud_status" => "accept",
                "currency" => "IDR",
                "status_code" => "201",
            ],
            [
                "transaction_time" => "2021-06-23 11:41:33",
                "transaction_status" => "return",
                "transaction_id" => "9aed5972-5b6a-401e-894b-a32c91ed1a3a",
                "signature_key" => "fe5f725ea770c451017e9d6300af72b830a668d2f7d5da9b778ec2c4f9177efe5127d492d9ddfbcf6806ea5cd7dc1a7337c674d6139026b28f49ad0ea1ce5107",
                "settlement_time" => "2021-06-23 11:42:03",
                "payment_type" => "bank_transfer",
                "order_id" => "bni-va-01",
                "pdf_url" => "G141532850",
                "gross_amount" => "150000.00",
                "fraud_status" => "accept",
                "currency" => "IDR",
                "status_code" => "201",
            ],

        ]);
    }
}
