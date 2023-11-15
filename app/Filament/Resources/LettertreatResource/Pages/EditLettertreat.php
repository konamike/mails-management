<?php

namespace App\Filament\Resources\LettertreatResource\Pages;

use App\Filament\Resources\LettertreatResource;
use App\Mail\FileSentMail;
use App\Models\User;
use Auth;
use Filament\Actions;
use Filament\Actions\Action;
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

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (User::where('role', 'CoS')) {
            $data['dispatched'] = 1;
            $data['dispatched_by'] = auth()->id();
            $data['dispatch_email'] = Auth::user()->email;
            $data['dispatch_remarks'] = 'Treated by Chief of Staff';
            $data['dispatch_phone'] = '08030000000';
            $data['date_dispatched'] = now();
        }
        return $data;
    }

/*    protected function getHeaderActions(): array
    {
        $actions = parent::getFormActions();

        return [
            Action::make('save')
                ->label('Save changes')
                ->action('save'),
        ];
    }*/

}

