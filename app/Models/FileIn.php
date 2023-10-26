<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Contractor;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FileIn extends Model
{
    use HasFactory;

    protected $table = 'File_Ins';
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
        

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // public function filehandling(): HasOne
    // {
    //     return $this->hasOne(filehandling::class);
    // }

};