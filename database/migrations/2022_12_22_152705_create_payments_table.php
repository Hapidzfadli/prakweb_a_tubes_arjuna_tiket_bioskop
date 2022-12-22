<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->timestamp('transaction_time')->useCurrent();
            $table->string('transaction_status');
            $table->string('transaction_id');
            $table->string('signature_key');
            $table->timestamp('settlement_time')->useCurrent();
            $table->string('payment_type');
            $table->string('order_id');
            $table->string('merchant_id');
            $table->integer('gross_amount');
            $table->string('fraud_status');
            $table->string('currency');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
