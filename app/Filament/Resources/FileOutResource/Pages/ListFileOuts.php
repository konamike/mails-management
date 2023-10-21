<?php

namespace App\Filament\Resources\FileOutResource\Pages;

use App\Filament\Resources\FileOutResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFileOuts extends ListRecords
{
    protected static string $resource = FileOutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
