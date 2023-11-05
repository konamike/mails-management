<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Filetreatment extends Model
{
    use HasFactory;

    protected $table = 'files';

    
    protected $fillable = [
        'contractor_id',
        'file_number',
        'category_id',        
        'received_by',
        'date_received',
        'document_author',
        'document_sender',
        'amount',
        'description',
        'hand_carried',
        'retrieved_by',
        'date_retrieved',
        'treated',
        'date_treated',
        'treated_by',
        'user_id',
        'remarks',
        'notes',
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
