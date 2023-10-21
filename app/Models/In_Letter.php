<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class In_Letter extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'file_number',
        'received_by',
        'received_date',
        'document_originator',
        'document_sender',
        'phone',
        'amount',
        'description',
        'hand_carried',
        'retrieved_by',
        'retrieved_date',
        'treated',
        'treated_date',
        'remarks',
        'user_id',
    ];



    protected $casts = [
        'received_date' => 'date',
        'retrieved_date' => 'date',
        'treated_date' => 'date',

    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
        
};

