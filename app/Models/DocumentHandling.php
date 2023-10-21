<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentHandling extends Model
{
    use HasFactory;


protected $fillable = [

    'user_id',
    'incoming_mail_id',
    'treated',
    'date_treated',
    'remark',
    ];

}