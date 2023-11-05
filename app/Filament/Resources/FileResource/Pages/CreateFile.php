<?php

namespace App\Filament\Resources\FileResource\Pages;

use App\Filament\Resources\FileResource;
use App\Models\User;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateFile extends CreateRecord
{
    protected static string $resource = FileResource::class;
    // protected function afterCreate(): void
    // {
    //     $file = $this->record;
    //     $adminuser = User::where('role', '=','ADMIN')->get();
    //     Notification::make()
    //         ->title('New File Created')
    //         ->success()
    //         ->icon('heroicon-o-shopping-bag')
    //         ->body("**New File Created: {$file->description} **")
    //         ->actions([
    //             Action::make('View')->url(
    //                 FileResource::getUrl('edit', ['record' => $file])
    //             ),
    //         ])
    //         ->sendToDatabase($adminuser);
    // }


    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();   
        return $data;
    }

    
    
}
