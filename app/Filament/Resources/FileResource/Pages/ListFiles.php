<?php

namespace App\Filament\Resources\FileResource\Pages;

use App\Filament\Resources\FileResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFiles extends ListRecords
{
    protected static string $resource = FileResource::class;
    protected static ?string $title = 'List of Files';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
