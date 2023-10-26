<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\File;

class Treat extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'file_id',
        'treated',
        'date_treated',
        'remarks',
        'user_id',
    ];

    /**
     * Summary of filein
     * @return 
     */
    public function file(): BelongsTo
    {
        return $this->belongsTo(file::class);
    }

    /**
     * Summary of user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
