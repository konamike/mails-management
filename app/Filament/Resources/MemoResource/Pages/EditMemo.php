<?php

namespace App\Filament\Resources\MemoResource\Pages;

use App\Filament\Resources\MemoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMemo extends EditRecord
{
    protected static string $resource = MemoResource::class;
    protected static ?string $title = 'Edit File';

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}


    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
