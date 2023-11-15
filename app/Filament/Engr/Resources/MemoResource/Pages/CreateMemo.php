<?php

namespace App\Filament\Engr\Resources\MemoResource\Pages;

use App\Filament\Engr\Resources\MemoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMemo extends CreateRecord
{
    protected static string $resource = MemoResource::class;
}
