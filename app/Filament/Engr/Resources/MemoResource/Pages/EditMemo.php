<?php

namespace App\Filament\Engr\Resources\MemoResource\Pages;

use App\Filament\Engr\Resources\MemoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMemo extends EditRecord
{
    protected static string $resource = MemoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
