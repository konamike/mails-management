<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outgoing_Mail extends Model
{
    use HasFactory;

    protected $fillable = [

  
        'out_date',
        'user_id',
        'incoming_mail_id',
        'document_handling_id',
        'hand_carried',
        'from',
        'send_to',
        'processed_by',
        'remark',
    ];


    protected $cast = [
        'out_date' => 'date'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function incoming_mail(): BelongsTo
    {
        return $this->belongsTo(Incoming_Mail::class);
    }

    public function document_handling(): BelongsTo
    {
        return $this->belongsTo(DocumentHanding::class);
    }

}