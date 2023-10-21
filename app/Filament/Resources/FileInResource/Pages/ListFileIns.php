<?php

namespace App\Filament\Resources\FileInResource\Pages;

use App\Filament\Resources\FileInResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFileIns extends ListRecords
{
    protected static string $resource = FileInResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
