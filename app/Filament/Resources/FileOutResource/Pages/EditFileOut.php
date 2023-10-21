<?php

namespace App\Filament\Resources\FileOutResource\Pages;

use App\Filament\Resources\FileOutResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFileOut extends EditRecord
{
    protected static string $resource = FileOutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
