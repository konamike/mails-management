<?php

namespace App\Filament\Engr\Resources\FileResource\Pages;

use App\Filament\Engr\Resources\FileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFile extends EditRecord
{
    protected static string $resource = FileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
