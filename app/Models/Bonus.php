<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    use HasFactory;
    protected $table = "bonus";



    public static array $allowedFields = ['id', 'image_url', 'total_time', 'exp', 'name', 'price' ];


    protected $fillable = [
      'id', 'image_url', 'total_time', 'exp', 'name', 'price'
    ];
}
