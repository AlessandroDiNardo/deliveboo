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
            $table->id();

            $table->string('code', 64);
            $table->decimal('price', $precision = 6, $scale = 2);
            $table->dateTime('order_date');
            $table->string('rider_phone_number', 32);
            $table->string('buyer_first_name', 64);
            $table->string('buyer_last_name', 64);
            $table->string('buyer_email', 64);
            $table->string('buyer_phone_number', 32);
            $table->string('address', 128);

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
