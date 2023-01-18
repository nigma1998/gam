<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = "users";



    public static array $allowedFields = ['id', 'name', 'email', 'lvl', 'exp', 'klan', 'klans_name' ];

    protected $fillable = [
      'id', 'name', 'email', 'lvl', 'exp', 'klan', 'klans_name'
    ];
}
