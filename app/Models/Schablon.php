<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schablon extends Model
{
    use HasFactory;

protected $table = "schablon";

    public static array $allowedFields = ['id', 'url'];

    public static  array $yonListt = ['url'];

    protected $fillable = [
      'url'
    ];
}
