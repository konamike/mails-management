<?php

namespace App\Filament\Engr\Resources\MemoResource\Pages;

use App\Filament\Engr\Resources\MemoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMemo extends ViewRecord
{
    protected static string $resource = MemoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
