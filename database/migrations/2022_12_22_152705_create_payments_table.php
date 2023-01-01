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
            $table->timestamp('transaction_time')->useCurrent()->nullable();;
            $table->string('transaction_status');
            $table->string('transaction_id')->nullable();
            $table->string('signature_key')->nullable();
            $table->timestamp('settlement_time')->useCurrent()->nullable();
            $table->string('payment_type');
            $table->string('order_id')->unique()->nullable();
            $table->string('status_code');
            $table->string('pdf_url')->nullable();
            $table->integer('gross_amount')->nullable();
            $table->string('fraud_status')->nullable();
            $table->string('currency')->nullable();
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
