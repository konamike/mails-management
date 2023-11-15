<?php

namespace App\Filament\Engr\Resources\FileResource\Pages;

use App\Filament\Engr\Resources\FileResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFile extends CreateRecord
{
    protected static string $resource = FileResource::class;

    protected static bool $canCreateAnother = false;
}


