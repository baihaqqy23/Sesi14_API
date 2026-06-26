<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
 // Kolom yang diizinkan untuk diisi massal
 protected $fillable = ['name', 'price', 'stock'];
}
