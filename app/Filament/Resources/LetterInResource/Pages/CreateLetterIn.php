<?php

namespace App\Filament\Resources\LetterInResource\Pages;

use App\Filament\Resources\LetterInResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLetterIn extends CreateRecord
{
    protected static string $resource = LetterInResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
{
    $data['user_id'] = auth()->id();

    return $data;
}

}
