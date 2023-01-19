<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model
{
    use HasFactory;
    protected $table = "ambulance";



    public static array $allowedFields = ['id', 'image_url', 'total_time', 'exp', 'coins', 'product_name',
     'updated_at', 'user', 'dat', 'button', 'identifier',
     'drug_one', 'amount_one', 'drug_two', 'amount_two', 'drug_three', 'amount_three', 'drug_four', 'amount_four',
     'drug_five', 'amount_five', 'drug_six', 'amount_six', 'complaint_button', 'inspection_button', 'button_treatment',
     'drink_button'];
 
     public static  array $yonListt = ['updated_at'];
 
     public static  array $yonLi = ['total_time'];
 
     protected $fillable = [
       'user', 'product_name', 'total_time', 'exp', 'coins', 'image_url', 'dat', 'button', 'identifier', 'chat_nps', 'updated_at',
       'drug_one', 'amount_one', 'drug_two', 'amount_two', 'drug_three', 'amount_three', 'drug_four', 'amount_four',
       'drug_five', 'amount_five', 'drug_six', 'amount_six', 'complaint_button', 'inspection_button', 'button_treatment',
       'drink_button'
     ];
}
