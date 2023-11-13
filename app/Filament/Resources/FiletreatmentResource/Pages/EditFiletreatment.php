<?php

namespace App\Filament\Resources\FiletreatmentResource\Pages;

use App\Filament\Resources\FiletreatmentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
use Auth;
use App\Models\User;
use Filament\Actions\Action;
use Illuminate\Support\Facades\Mail;

class EditFiletreatment extends EditRecord
{
    protected static string $resource = FiletreatmentResource::class;

    protected static ?string $title = 'Edit File';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        $name = Auth::user()->name;
        $storedDataDescription = $this->record->description;
        Notification::make()
            ->success()
            ->title('The File: '. $storedDataDescription. ' was treated by '. $name)
            ->sendToDatabase(User::whereIn('role', ['ADMIN','MD'])->get());

        return $this->getResource()::getUrl('index');
    }
}
