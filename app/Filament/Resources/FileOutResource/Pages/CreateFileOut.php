<?php

namespace App\Filament\Resources\FileOutResource\Pages;

use App\Filament\Resources\FileOutResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFileOut extends CreateRecord
{
    protected static string $resource = FileOutResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
{
    $data['user_id'] = auth()->id();

    return $data;
}

}
