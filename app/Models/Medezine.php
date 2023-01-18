<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medezine extends Model
{
    use HasFactory;
    protected $table = "medicines";



    public static array $allowedFields = ['id', 'user', 'medicines_name', 'amount'];



    protected $fillable = [
     'id', 'user', 'medicines_name', 'amount'
    ];
}
