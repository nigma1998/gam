<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $table = "levels";

    public static array $fileTaibl = ['lvl', 'exp_to_lvl', 'exp_total' ];

    public static array $fileyon = ['exp_to_lvl' ];

    protected $fillable = [
      'lvl', 'exp_to_lvl', 'exp_total'
    ];
}
