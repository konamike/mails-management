<?php

namespace App\Filament\Resources\MemoInResource\Pages;

use App\Filament\Resources\MemoInResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMemoIn extends CreateRecord
{
    protected static string $resource = MemoInResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
{
    $data['user_id'] = auth()->id();

    return $data;
}

}
