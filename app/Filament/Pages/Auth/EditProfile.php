<?php
 
namespace App\Filament\Pages\Auth;
 
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;
 
class EditProfile extends BaseEditProfile
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('email')
                    ->readOnly()
                    ->maxLength(255),
                $this->getNameFormComponent(),
                // $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ]);

        
    }

    protected function getRedirectUrl(): string
    {

        return url(filament()->getUrl());
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
        ->success()
        ->title('Profile Updated')
        ->body('Profile has been updated successfully');
    }

}