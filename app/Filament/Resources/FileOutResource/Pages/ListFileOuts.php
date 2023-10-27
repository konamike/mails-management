<?php

namespace App\Filament\Resources\FileoutResource\Pages;

use App\Filament\Resources\FileoutResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFileouts extends ListRecords
{
    protected static string $resource = FileoutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
