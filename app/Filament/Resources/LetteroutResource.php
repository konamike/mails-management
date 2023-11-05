<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LetteroutResource\Pages;
use App\Filament\Resources\LetteroutResource\RelationManagers;
use App\Models\Letterout;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LetteroutResource extends Resource
{
    protected static ?string $model = Letterout::class;


    protected static ?string $navigationIcon = 'heroicon-s-briefcase';
    protected static ?string $navigationGroup = 'Outgoing Documents';

    protected static ?string $navigationLabel = 'Letters';
    protected static ?int $navigationSort = 2;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'warning';
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLetterouts::route('/'),
            'create' => Pages\CreateLetterout::route('/create'),
            'view' => Pages\ViewLetterout::route('/{record}'),
            'edit' => Pages\EditLetterout::route('/{record}/edit'),
        ];
    }    
}
