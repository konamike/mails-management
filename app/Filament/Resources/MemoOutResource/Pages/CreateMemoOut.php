<?php

namespace App\Filament\Resources\MemoOutResource\Pages;

use App\Filament\Resources\MemoOutResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMemoOut extends CreateRecord
{
    protected static string $resource = MemoOutResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
{
    $data['user_id'] = auth()->id();

    return $data;
}

}
