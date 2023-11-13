<?php

namespace App\Filament\Resources\LetterResource\Pages;

use App\Filament\Resources\LetterResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Mail\FileReceived;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
class CreateLetter extends CreateRecord
{
    protected static string $resource = LetterResource::class;

    protected static bool $canCreateAnother = false;


    protected function getRedirectUrl(): string
    {
        $name = Auth::user()->name;
        $storedDataEmail = $this->record->email;
//        $storeDataID = $this->record->id;
        $storedDataDescription = $this->record->description;
        Notification::make()
            ->success()
            ->title('A New Letter: ' . $storedDataDescription . ' was created by ' . $name)
            ->sendToDatabase(User::whereIn('role', ['ADMIN', 'USER', 'ENGINEER', 'CoS'])->get());

        Mail::to($storedDataEmail)->send(new FileReceived($storedDataDescription));
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }
}
