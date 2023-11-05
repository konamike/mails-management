<?php

namespace App\Filament\Resources\LettertreatResource\Pages;

use App\Filament\Resources\LettertreatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLettertreats extends ListRecords
{
    protected static string $resource = LettertreatResource::class;
    protected static ?string $title = 'Letters To Be Treated';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
