<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// imported Models
use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'place',
        'phone_number',
        'img',
        'opening_time',
        'closing_time',
        'shipping_cost',
        'closing_day',
    ];

    public function user() {
        return $this -> belongsTo(User::class);
    }

    public function products() {
        return $this -> hasMany(Product::class);
    }

    public function categories() {
        return $this -> belongsToMany(Category::class);
    }

    public function orders() {
        return $this -> hasMany(Order::class);
    }
}
