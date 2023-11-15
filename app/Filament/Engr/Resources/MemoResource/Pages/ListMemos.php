<?php

namespace App\Filament\Engr\Resources\MemoResource\Pages;

use App\Filament\Engr\Resources\MemoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMemos extends ListRecords
{
    protected static string $resource = MemoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
