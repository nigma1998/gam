<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $table = "delivery";



    public static array $allowedFields = ['id', 'image_url', 'total_time', 'exp', 'product_name', 'income',  'amount', 'price' ];



    protected $fillable = [
      'id', 'image_url', 'total_time', 'exp', 'product_name', 'income',  'amount', 'price'
    ];
}
