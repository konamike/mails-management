<?php

namespace App\Filament\Resources\TreatResource\Pages;

use App\Filament\Resources\TreatResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTreat extends CreateRecord
{
    protected static string $resource = TreatResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
{
    $data['user_id'] = auth()->id();

    return $data;
}

}
