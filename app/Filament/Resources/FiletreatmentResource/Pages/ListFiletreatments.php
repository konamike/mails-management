<?php

namespace App\Filament\Resources\FiletreatmentResource\Pages;

use App\Filament\Resources\FiletreatmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFiletreatments extends ListRecords
{
    protected static string $resource = FiletreatmentResource::class;
    protected static ?string $title = 'Files To Be Treated';
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
