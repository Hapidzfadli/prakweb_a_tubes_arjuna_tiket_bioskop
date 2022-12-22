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
        Schema::create('orders', function (Blueprint $table) {
            $table->string('order_id')->primary();
            $table->foreignId('user_id');
            $table->string('payment_id')->foreignId();
            $table->string('seat_id')->foreignId();
            $table->string('city');
            $table->string('type');
            $table->string('theater');
            $table->string('date');
            $table->string('time');
            $table->string('jml_tiket');
            $table->string('total_price');
            $table->string('movie');
            $table->string('id_movie');
            $table->string('snap_token');
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
        Schema::dropIfExists('orders');
    }
};
