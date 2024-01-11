<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'quantity'];

    //* ACCESOR
    //* In this example, the accessor modifies the “price” attribute
    //* to include a dollar sign and format the value with two decimal places.
    public function getPriceAttribute($value)
    {
        return '$' . number_format($value, 2);
    }
}
