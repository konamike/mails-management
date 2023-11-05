<?php

namespace App\Filament\Resources\FiletreatmentResource\Pages;

use App\Filament\Resources\FiletreatmentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFiletreatment extends EditRecord
{
    protected static string $resource = FiletreatmentResource::class;

    protected static ?string $title = 'Edit File';

    protected function getHeaderActions(): array
    {
        return [
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
