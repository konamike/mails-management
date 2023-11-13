<?php

namespace App\Filament\Resources\FileResource\Pages;

use App\Filament\Resources\FileResource;
use App\Mail\FileReceived;
use App\Models\User;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CreateFile extends CreateRecord
{
    protected static string $resource = FileResource::class;

    protected static bool $canCreateAnother = false;


    protected function getRedirectUrl(): string
    {
        $name = Auth::user()->name;
        $storedDataEmail = $this->record->email;
        $storeDataID = $this->record->id;
        $storedDataDescription = $this->record->description;
        Notification::make()
            ->success()
            ->title('A New File: ' . $storedDataDescription . ' was created by ' . $name)
            ->sendToDatabase(User::whereIn('role', ['ADMIN', 'USER', 'ENGINEER'])->get());


        Mail::to($storedDataEmail)->send(new FileReceived($storedDataDescription));

        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('File Created')
            ->body('The file was created successfully')
            ->duration(4000);
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }


}
