<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// imported Models
use App\Models\Restaurant;
use App\Models\Order;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ingredients',
        'price',
        'img',
        'visible',

    ];

    public function restaurant() {
        return $this -> belongsTo(Restaurant::class);
    }

    public function orders() {
        return $this -> belongsToMany(Order::class);
    }
}
