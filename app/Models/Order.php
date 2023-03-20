<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// imported Models
use App\Models\Product;
use App\Models\Restaurant;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'price',
        'order_date',
        'rider_phone_number',
        'buyer_first_name',
        'buyer_last_name',
        'buyer_email',
        'buyer_phone_number',
        'address',
    ];

    public function products() {
        return $this -> belongsToMany(Product::class);
    }

    public function restaurant() {
        return $this -> belongsTo(Restaurant::class);
    }
}
