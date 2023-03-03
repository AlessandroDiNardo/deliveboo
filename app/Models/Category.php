<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// imported Models
use App\Models\Restaurant;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function restaurants() {
        return $this -> belongsToMany(Restaurant::class);
    }
}
