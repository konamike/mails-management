<?php

namespace App\Filament\Resources\MemotreatResource\Pages;

use App\Filament\Resources\MemotreatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMemotreat extends EditRecord
{
    protected static string $resource = MemotreatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    
    protected function mutateFormDataBeforeSave($data): array
    {
        $data['treated_by'] = auth()->id();
    
        return $data;
    }

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
