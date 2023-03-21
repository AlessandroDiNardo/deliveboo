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
        Schema::table('restaurants', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id') -> unique();
 
            $table->foreign('user_id')->references('id')->on('users') -> onDelete('cascade');
        });

        Schema::table('products', function (Blueprint $table) {
            $table -> foreignId('restaurant_id') -> constrained() -> onDelete('cascade');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table -> foreignId('restaurant_id') -> constrained() -> onDelete('cascade');
        });

        Schema::table('category_restaurant', function (Blueprint $table) {
            $table -> foreignId('restaurant_id') -> constrained() -> onDelete('cascade');

            $table -> foreignId('category_id') -> constrained();
        });  
        
        Schema::table('order_product', function (Blueprint $table) {
            $table -> foreignId('product_id') -> constrained() -> onDelete('cascade');

            $table -> foreignId('order_id') -> constrained() -> onDelete('cascade');
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table -> dropForeign('restaurants_user_id_foreign');
        });

        Schema::table('products', function (Blueprint $table) {
            $table -> dropForeign('products_restaurant_id_foreign');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table -> dropForeign('orders_restaurant_id_foreign');
        });

        Schema::table('category_restaurant', function (Blueprint $table) {
            $table -> dropForeign('category_restaurant_restaurant_id_foreign');

            $table -> dropForeign('category_restaurant_category_id_foreign');
        });

        Schema::table('order_product', function (Blueprint $table) {
            $table -> dropForeign('order_product_product_id_foreign');

            $table -> dropForeign('order_product_order_id_foreign');
        });
    }
};
