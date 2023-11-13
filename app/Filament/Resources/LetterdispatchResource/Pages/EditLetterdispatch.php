<?php

namespace App\Filament\Resources\LetterdispatchResource\Pages;

use App\Filament\Resources\FileResource;
use App\Filament\Resources\LetterdispatchResource;
use App\Models\User;
use Filament\Actions;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditLetterdispatch extends EditRecord
{
    protected static string $resource = LetterdispatchResource::class;
    protected static ?string $title = 'Process for Dispatch';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function getSavedNotification(): ?Notification
    {
        $name = \Illuminate\Support\Facades\Auth::user()->name;
        return
            Notification::make()
                ->success()
                ->title('A letter has been placed on dispatch.')
                ->duration(4000)
                ->body('The File: ' . $this->record->description . ' was updated by ' . $name)
                ->actions([
                    Action::make('View File')
                        ->url(FileResource::getUrl('view', ['record' => $this->record]))
                        ->button(),
                ])
                ->sendToDatabase(User::whereIn('role', ['ADMIN', 'USER', 'MD'])->get());
    }
}
