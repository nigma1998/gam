<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canteen extends Model
{
    use HasFactory;

    protected $table = "Canteen";



    public static array $allowedFields = ['id', 'image_url', 'total_time', 'exp', 'product_name', 'user', 'dat', 'button',
     'identifier', 'chat_nps', 'ingredient_one', 'amount_one', 'ingredient_two',
     'amount_two', 'ingredient_three', 'amount_three',
     'ingredient_four', 'ingredient_five', 'amount_five', 'ingredient_six', 'amount_six', 'exp', 'total_time' ];

    public static  array $yonListt = ['name'];

    protected $fillable = [
      'user', 'product_name', 'total_time', 'exp', 'image_url', 'dat', 'button', 'identifier', 'chat_nps', 'ingredient_one', 'amount_one', 'ingredient_two',
      'amount_two', 'ingredient_three', 'amount_three',
      'ingredient_four', 'ingredient_five', 'amount_five', 'ingredient_six', 'amount_six', 'exp', 'total_time'
    ];
}
