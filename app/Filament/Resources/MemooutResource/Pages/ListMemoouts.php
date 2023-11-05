<?php

namespace App\Filament\Resources\MemooutResource\Pages;

use App\Filament\Resources\MemooutResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMemoouts extends ListRecords
{
    protected static string $resource = MemooutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
