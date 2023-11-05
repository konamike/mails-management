<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Memo;

class MemoOut extends Model
{
    use HasFactory;
    protected $table = 'memoouts';

    protected $fillable = [
        'from',
        'send_to',      
        'date_out',
        'phone',
        'user_id',
        'memo_id',
        'email',
        'remarks',
    ];



    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function memo(): BelongsTo
    {
        return $this->belongsTo(Memo::class);
    }

protected $casts = [
    'out_date' => 'datetime:Y-m-d',
];

}