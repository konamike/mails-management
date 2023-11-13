<?php

namespace App\Filament\Resources\LetterdispatchResource\Pages;

use App\Filament\Resources\FiledispatchResource;
use App\Filament\Resources\LetterdispatchResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewLetterdispatch extends ViewRecord
{
    protected static string $resource = LetterdispatchResource::class;
    protected static ? string $title = 'Letter Dispatch Details';

    protected function getHeaderActions(): array
    {
        return [
            // Actions\EditAction::make(),
        ];
    }
}
