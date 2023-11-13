<?php

namespace App\Filament\Resources\MemoResource\Pages;

use App\Filament\Resources\MemoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Mail\FileReceived;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
class CreateMemo extends CreateRecord
{
    protected static string $resource = MemoResource::class;


    protected static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        $name = Auth::user()->name;
        $storedDataEmail = $this->record->email;
//        $storeDataID = $this->record->id;
        $storedDataDescription = $this->record->description;
        Notification::make()
            ->success()
            ->title('A New Memo: ' . $storedDataDescription . ' was created by ' . $name)
            ->sendToDatabase(User::whereIn('role', ['ADMIN', 'USER', 'ENGINEER', 'HSD'])->get());

        Mail::to($storedDataEmail)->send(new FileReceived($storedDataDescription));
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }

    public function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Memo Created')
            ->body('The memo was created successfully')
            ->duration(4000);
    }
}
