<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    // @var array

    protected $fillable = [
        'image',
        'tittle',
        'description',
        'price',
        'stock',
    ];
    //
}
