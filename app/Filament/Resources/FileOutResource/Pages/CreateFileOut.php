<?php

namespace App\Filament\Resources\FileoutResource\Pages;

use App\Filament\Resources\FileoutResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFileout extends CreateRecord
{
    protected static string $resource = FileoutResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
    
        return $data;
    }
}
