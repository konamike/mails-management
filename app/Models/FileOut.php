<?php

namespace App\Models;

use App\Models\File;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FileOut extends Model
{
    use HasFactory;

    protected $table = 'fileouts';

    protected $fillable = [
        'from',
        'send_to',      
        'date_out',
        'user_id',
        'file_id',
        'remarks',
    ];



    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function file(): BelongsTo
    {
        return $this->belongsTo(File::class);
    }

}
