<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmaceuticals extends Model
{
    use HasFactory;
    protected $table = "lab";



    public static array $allowedFields = ['id', 'image_url', 'price', 'product_name', 'user', 'dat', 'total_time', 'exp', 'delivery', 'identifier' ];



    protected $fillable = [
      'image_url', 'total_time', 'exp', 'product_name', 'income',  'amount', 'price', 'user', 'delivery', 'identifier'
    ];
}
