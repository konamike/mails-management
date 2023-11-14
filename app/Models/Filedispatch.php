<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Filedispatch extends Model
{  
    use HasFactory;
    protected $table = 'files';
    

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
