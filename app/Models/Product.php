<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "product";



    public static array $allowedFields = ['id', 'image_url', 'name', 'room' ];

    public static  array $yonListt = ['name'];

    public static  array $room = ['room'];


    protected $fillable = [ 'id', 'image_url', 'name', 'room' ];


}
