<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lettertreat extends Model
{
    use HasFactory;

    protected $table = 'letters';

    protected $fillable = [
        'date_received',
        'author',
        'file_number',
        'category_id',
        'contractor_id',
        'description',
        'amount',
        'phone',
        'retrieved_by',
        'date_retrieved',
        'hand_carried',
        'retrieved_by',
        'date_retrieved',
        'treated',
        'date_treated',
        'treated_by',
        'user_id',
        'notes',
        'remarks',
        'date_dispatched',
        'sent_from',
        'sent_to',
        'dispatch_phone',
        'dispatch_email',
        'dispatched_by',
        'dispatch_remarks',
        'dispatched',
    ];

    protected $casts = [
        'date_received' => 'date',
        'date_dispatched' => 'date',
        'date_treated' => 'date',
    ];

    public function contractor(): BelongsTo
    {
        return $this->belongsTo(Contractor::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
