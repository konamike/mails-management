<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class File extends Model
{
    use HasFactory;


    protected $fillable = [
        'contractor_id',
        'file_number',
        'category_id',        
        'received_by',
        'received_date',
        'document_author',
        'document_sender',
        'amount',
        'description',
        'hand_carried',
        'retrieved_by',
        'retrieved_date',
        'user_id',
        'treated',
        'treated_date',
        'remarks',
    ];
    
    protected $casts = [
        'received_date' => 'date',
        'retrieved_date' => 'date',
        'treated_date' => 'date',
    ];

    public function contractor(): BelongsTo
    {
        return $this->belongsTo(Contractor::class);
    }
}
