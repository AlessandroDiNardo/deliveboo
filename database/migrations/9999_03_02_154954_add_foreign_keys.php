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
        Schema::table('users', function (Blueprint $table) {
            $table -> foreignId('restaurant_id') -> constrained();
        });

        Schema::table('restaurant_product', function (Blueprint $table) {
            $table -> foreignId('restaurant_id') -> constrained();

            $table -> foreignId('product_id') -> constrained();
        });

        Schema::table('restaurant_category', function (Blueprint $table) {
            $table -> foreignId('restaurant_id') -> constrained();

            $table -> foreignId('category_id') -> constrained();
        });  
        
        Schema::table('product_order', function (Blueprint $table) {
            $table -> foreignId('product_id') -> constrained();

            $table -> foreignId('order_id') -> constrained();
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table -> dropForeign('users_restaurant_id_foreign');
        });

        Schema::table('restaurant_product', function (Blueprint $table) {
            $table -> dropForeign('restaurant_product_restaurant_id_foreign');

            $table -> dropForeign('restaurant_product_product_id_foreign');
        });

        Schema::table('restaurant_category', function (Blueprint $table) {
            $table -> dropForeign('restaurant_category_restaurant_id_foreign') -> constrained();

            $table -> dropForeign('restaurant_category_category_id_foreign') -> constrained();
        });

        Schema::table('product_order', function (Blueprint $table) {
            $table -> dropForeign('product_order_product_id_foreign') -> constrained();

            $table -> dropForeign('product_order_order_id_foreign') -> constrained();
        });
    }
};
