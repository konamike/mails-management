<?php

namespace App\Filament\Resources\MemoInResource\Pages;

use App\Filament\Resources\MemoInResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMemoIn extends EditRecord
{
    protected static string $resource = MemoInResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
