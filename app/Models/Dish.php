<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    protected $table = "dish";



    public static array $allowedFields = ['id', 'image_url', 'name', 'ingredient_one', 'amount_one', 'ingredient_two',
    'amount_two', 'ingredient_three', 'amount_three',
    'ingredient_four', 'ingredient_five', 'amount_five', 'ingredient_six', 'amount_six', 'exp', 'total_time' ];

    public static  array $yonListt = ['name'];

    protected $fillable = [
      'id', 'image_url', 'name', 'ingredient_one', 'amount_one', 'ingredient_two',
      'amount_two', 'ingredient_three', 'amount_three',
      'ingredient_four', 'ingredient_five', 'amount_five', 'ingredient_six', 'amount_six', 'exp', 'total_time'
    ];
}
