<?php

namespace App\Filament\Resources\LetterResource\Pages;

use App\Filament\Resources\LetterResource;
use App\Models\User;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateLetter extends CreateRecord
{
    protected static string $resource = LetterResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    // protected function afterCreate(): void
    // {
    //     $letter = $this->record;
    //     $adminuser = User::where('role', '=','ADMIN')->get();
    //     Notification::make()
    //         ->title('New File Created')
    //         ->success()
    //         ->icon('heroicon-o-shopping-bag')
    //         ->body("**New File Created: {$letter->description} **")
    //         ->actions([
    //             Action::make('View')->url(
    //                 LetterResource::getUrl('edit', ['record' => $letter])
    //             ),
    //         ])
    //         ->sendToDatabase($adminuser);
    // }



    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
    
        return $data;
    }
    

}
