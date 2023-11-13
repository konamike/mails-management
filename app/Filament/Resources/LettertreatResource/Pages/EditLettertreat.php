<?php

namespace App\Filament\Resources\LettertreatResource\Pages;

use App\Filament\Resources\LettertreatResource;
use App\Mail\FileSentMail;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Mail;

class EditLettertreat extends EditRecord
{
    protected static string $resource = LettertreatResource::class;
    protected static ?string $title = 'Process for Dispatch';


    protected function getRedirectUrl(): string
    {
        Notification::make()
            ->success()
            ->title('Letter updated')
            ->body('The Letter has been successfully processed.');

        if (!empty($this->record->dispatch_email)) {
            $storedDataEmail = $this->record->dispatch_email;
        }
        $message = $this->record->description;
        Mail::to($storedDataEmail)->send(new FileSentMail($message));

        return $this->getResource()::getUrl('index');
    }
}

