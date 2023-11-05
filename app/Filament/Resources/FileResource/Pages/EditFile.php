<?php

namespace App\Filament\Resources\FileResource\Pages;

use App\Filament\Resources\FileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFile extends EditRecord
{
    protected static string $resource = FileResource::class;
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

    protected function mutateFormDataBeforeSave($data): array
    {
        $data['treated_by'] = auth()->id();
    
        return $data;
    }

    

}
