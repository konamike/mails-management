<?php

namespace App\Filament\Resources\MemoOutResource\Pages;

use App\Filament\Resources\MemoOutResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMemoOut extends EditRecord
{
    protected static string $resource = MemoOutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
