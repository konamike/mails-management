<?php

namespace App\Filament\Resources\MemooutResource\Pages;

use App\Filament\Resources\MemooutResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMemoout extends EditRecord
{
    protected static string $resource = MemooutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
