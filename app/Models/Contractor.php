<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FileIn;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Contractor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',        
        'phone',
        'email',
        'contact_person',
        'contact_phone',
    ];

    public function filein(): HasOne
    {
        return $this->hasOne(fileIn::class);
    }
}
