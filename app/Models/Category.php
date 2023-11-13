<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\File;
use App\Models\Filetreatment;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'document_type',
        'name',
        'remarks',
    ];


    public function file(): HasMany
    {
        return $this->hasMany(file::class);
    }

    public function filetreatment(): HasMany
    {
        return $this->hasMany(filetreatment::class);
    }

}
