<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemoOut extends Model
{
    use HasFactory;

    protected $fillable = [
  
        'out_date',
        'user_id',
        'in_memo_id',
        'hand_carried',
        'from',
        'send_to',
        'remarks',
        ];
}