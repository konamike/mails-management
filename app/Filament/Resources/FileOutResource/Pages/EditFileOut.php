<?php

namespace App\Filament\Resources\FileoutResource\Pages;

use App\Filament\Resources\FileoutResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFileout extends EditRecord
{
    protected static string $resource = FileoutResource::class;
    protected static ?string $title = 'Edit File';

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
