<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterOut extends Model
{
    use HasFactory;
    
    protected $fillable = [  
        'out_date',
        'user_id',
        'in_letter_id',
        'hand_carried',
        'from',
        'send_to',
        'remarks',
        ];
}