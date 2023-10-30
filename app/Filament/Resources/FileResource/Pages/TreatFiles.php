<?php

namespace App\Filament\Resources\FileResource\Pages;

use App\Filament\Resources\FileResource;
use Filament\Resources\Pages\Page;
use Filament\Resources\Pages\ViewRecord;
use Filament\Resources\Pages\EditRecord;

use Filament\Actions;

class TreatFiles extends ViewRecord
{
    protected static string $resource = FileResource::class;
    

    protected static string $view = 'filament.resources.file-resource.pages.treat-files';

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\EditAction::make(), 
        ];
    }
}
