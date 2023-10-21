<?php

namespace App\Filament\Resources\MemoOutResource\Pages;

use App\Filament\Resources\MemoOutResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMemoOut extends ViewRecord
{
    protected static string $resource = MemoOutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
