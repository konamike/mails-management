<?php

namespace App\Filament\Resources\FileInResource\Pages;

use App\Filament\Resources\FileInResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFileIn extends EditRecord
{
    protected static string $resource = FileInResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
