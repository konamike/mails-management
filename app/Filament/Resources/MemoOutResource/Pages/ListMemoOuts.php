<?php

namespace App\Filament\Resources\MemoOutResource\Pages;

use App\Filament\Resources\MemoOutResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMemoOuts extends ListRecords
{
    protected static string $resource = MemoOutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
