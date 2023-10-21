<?php

namespace App\Filament\Resources\MemoInResource\Pages;

use App\Filament\Resources\MemoInResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMemoIns extends ListRecords
{
    protected static string $resource = MemoInResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
