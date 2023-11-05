<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Letter;

class LetterOut extends Model
{
    use HasFactory;

    protected $table = 'letterouts';

    protected $fillable = [
        'from',
        'send_to',      
        'date_out',
        'phone',
        'user_id',
        'letter_id',
        'email',
        'remarks',
    ];



    /**
     * Summary of user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function file(): BelongsTo
    {
        return $this->belongsTo(Letter::class);
    }

    protected $casts = [
        'out_date' => 'datetime:Y-m-d',
    ];
}
