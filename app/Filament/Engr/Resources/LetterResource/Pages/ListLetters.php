<?php

namespace App\Filament\Engr\Resources\LetterResource\Pages;

use App\Filament\Engr\Resources\LetterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLetters extends ListRecords
{
    protected static string $resource = LetterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
