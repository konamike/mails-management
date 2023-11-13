<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letterdispatch extends Model
{
    use HasFactory;
    protected $table = 'letters';

    protected $fillable = [
        'date_dispatched',
        'sent_to',
        'sent_from',
        'dispatch_phone',
        'dispatch_email',
        'dispatched_by',
        'dispatch_remarks',
        'dispatched'
    ];

    protected $casts = [
        'date_dispatched' => 'date',
    ];

}
