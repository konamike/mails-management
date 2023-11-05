<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemooutResource\Pages;
use App\Filament\Resources\MemooutResource\RelationManagers;
use App\Models\Memoout;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MemooutResource extends Resource
{
    protected static ?string $model = Memoout::class;


    protected static ?string $navigationIcon = 'heroicon-s-briefcase';
    protected static ?string $navigationGroup = 'Outgoing Documents';

    protected static ?string $navigationLabel = 'Memos';
    protected static ?int $navigationSort = 3;

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
            'index' => Pages\ListMemoouts::route('/'),
            'create' => Pages\CreateMemoout::route('/create'),
            'view' => Pages\ViewMemoout::route('/{record}'),
            'edit' => Pages\EditMemoout::route('/{record}/edit'),
        ];
    }    
}
