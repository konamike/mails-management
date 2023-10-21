<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Out_File extends Model
{
    use HasFactory;

    protected $guarded = [
        'out_date',
        'user_id',
        'in_file_id',
        'document_handling_id',
        'hand_carried',
        'from',
        'send_to',
        'remarks',
    ];
}
