<?php

namespace App\Filament\Resources\LetterOutResource\Pages;

use App\Filament\Resources\LetterOutResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLetterOut extends CreateRecord
{
    protected static string $resource = LetterOutResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
{
    $data['user_id'] = auth()->id();

    return $data;
}

}
