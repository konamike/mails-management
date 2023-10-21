<?php

namespace App\Filament\Resources\MemoInResource\Pages;

use App\Filament\Resources\MemoInResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMemoIn extends ViewRecord
{
    protected static string $resource = MemoInResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
