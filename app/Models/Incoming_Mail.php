<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incoming_Mail extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'in_date',
        'document_type',
        'user_id',
        'document_author',
        'document_sender',
        'category_id',
        'file_number',
        'phone',
        'description',
        'contractor_id',
        'amount',
        'hand_carried',
        'retrieved_by',
        'remarks',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */


    protected $casts = [
        'in_date' => 'date',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}