<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $table = "images";



   public static array $allowedFields = ['id', 'image_url', 'total_time', 'description', 'exp', 'product_name', 'drug_one', 'amount_one', 'drug_two', 'amount_two', 'drug_three', 'amount_three', 'drug_four', 'amount_four',
    'drug_five', 'amount_five', 'drug_six', 'amount_six','complaint_button', 'inspection_button', 'button_treatment',
    'drink_button' ];

    protected $fillable = [
      'product_name', 'total_time', 'exp', 'image_url', 'description', 'drug_one', 'amount_one', 'drug_two', 'amount_two', 'drug_three', 'amount_three', 'drug_four', 'amount_four',
      'drug_five', 'amount_five', 'drug_six', 'amount_six','complaint_button', 'inspection_button', 'button_treatment',
      'drink_button'
    ];
}
