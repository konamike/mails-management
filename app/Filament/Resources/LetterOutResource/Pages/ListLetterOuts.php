<?php

namespace App\Filament\Resources\LetterOutResource\Pages;

use App\Filament\Resources\LetterOutResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLetterOuts extends ListRecords
{
    protected static string $resource = LetterOutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
