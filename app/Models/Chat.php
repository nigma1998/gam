<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory; 
    protected $table = "chat";



    public static array $allowedFields = ['id', 'user', 'text' ];


    protected $fillable = [
        'id', 'user', 'text' 
    ];
}
