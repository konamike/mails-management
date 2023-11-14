<?php

namespace App\Filament\Resources\FiledispatchResource\Pages;

use App\Filament\Resources\FiledispatchResource;
use App\Mail\FileSentMail;
use App\Models\User;
use Auth;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Mail;

class EditFiledispatch extends EditRecord
{
    protected static string $resource = FiledispatchResource::class;
    protected static ?string $title = 'Letter for Dispatch';


    protected function getRedirectUrl(): string
    {
//        Notification::make()
//            ->success()
//            ->title('File updated')
//            ->body('The file has been successfully sent for dispatch.');

        $storedDataEmail = $this->record->dispatch_email;
        $message = $this->record->description;
        Mail::to($storedDataEmail)->send(new FileSentMail($message));

        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('A File Dispatch created')
            ->body('A file was created for dispatch successfully')
            ->duration(4000);
    }

}
