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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();

            $table->string('name', 64);
            $table->text('description');
            $table->string('place', 64);
            $table->smallInteger('phone_number');
            $table->string('img');
            $table->time('opening_time');
            $table->time('closing_time');
            $table->decimal('shipping_cost', $precision = 4, $scale = 2);
            $table->string('closing_day', 16);

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
        Schema::dropIfExists('restaurants');
    }
};
