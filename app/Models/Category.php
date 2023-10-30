<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\File;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'document_type',
        'name',
        'remarks',
    ];


    public function filein(): HasMany
    {
        return $this->hasMany(file::class);
    }
        
}
