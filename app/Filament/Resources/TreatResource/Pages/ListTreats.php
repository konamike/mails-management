<?php

namespace App\Filament\Resources\TreatResource\Pages;

use App\Filament\Resources\TreatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTreats extends ListRecords
{
    protected static string $resource = TreatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
