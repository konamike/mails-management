<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LettertreatResource\Pages;
use App\Filament\Resources\LettertreatResource\RelationManagers;
use App\Models\Lettertreat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LettertreatResource extends Resource
{
    protected static ?string $model = Lettertreat::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';
    protected static ?string $navigationGroup = 'Under Process';
    protected static ?string $navigationLabel = 'Letters';
    protected static ?int $navigationSort = 2;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('treated', false)->count();
    }
    public static function getEloquentQuery(): Builder
    {
        return static::getModel()::query()->where('treated', 0);
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'warning';
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }




    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('author')
                    ->disabled(),
                Forms\Components\Textarea::make('description')
                    ->disabled(),
                Forms\Components\DatePicker::make('date_treated')
                    ->native(false)
                    ->required(),
                Forms\Components\Toggle::make('treated')
                    ->label('Treated Letter?')
                    ->required(),
                Forms\Components\Textarea::make('notes')
                    ->label('Document Note')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('author')
                    ->label("Author/Sender's Name")
                    ->searchable()
                    ->wrap()
                    ->sortable(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->searchable()
                    ->wrap()
                    ->sortable(),
                Tables\Columns\TextColumn::make('file_number')
                    ->searchable(),
                Tables\Columns\IconColumn::make('treated')
                    ->boolean(),
                Tables\Columns\TextColumn::make('date_received')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                // No bulk delete
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
            'index' => Pages\ListLettertreats::route('/'),
            // 'create' => Pages\CreateLettertreat::route('/create'),
            // 'edit' => Pages\EditLettertreat::route('/{record}/edit'),
        ];
    }
}
