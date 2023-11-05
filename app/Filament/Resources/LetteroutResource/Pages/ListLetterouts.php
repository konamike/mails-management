<?php

namespace App\Filament\Resources\LetteroutResource\Pages;

use App\Filament\Resources\LetteroutResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLetterouts extends ListRecords
{
    protected static string $resource = LetteroutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
