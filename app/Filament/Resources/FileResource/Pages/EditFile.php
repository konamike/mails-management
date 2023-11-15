<?php

namespace App\Filament\Resources\FileResource\Pages;

use App\Filament\Resources\FileResource;
use App\Models\User;
use Auth;
use Filament\Actions;

//use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Mail;
use Filament\Notifications\Actions\Action;

class EditFile extends EditRecord
{
    protected static string $resource = FileResource::class;
    protected static ?string $title = 'Edit File';


    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    public function getSavedNotification(): ?Notification
    {
        $name = \Illuminate\Support\Facades\Auth::user()->name;
        return
            Notification::make()
                ->success()
                ->title('Changes to a file.')
                ->duration(4000)
                ->body('The File: ' . $this->record->description . ' was updated by ' . $name)
                ->actions([
                    Action::make('View File')
                        ->url(FileResource::getUrl('view', ['record' => $this->record]))
                        ->button(),
                ])
                ->sendToDatabase(User::whereIn('role', ['ADMIN', 'USER']));
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }


}
