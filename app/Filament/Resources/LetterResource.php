<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LetterResource\Pages;
use App\Filament\Resources\LetterResource\RelationManagers;
use App\Models\Letter;
use App\Models\Category;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LetterResource extends Resource
{
    protected static ?string $model = Letter::class;

    protected static ?string $navigationIcon = 'heroicon-s-briefcase';
    protected static ?string $navigationGroup = 'All Documents';
    protected static ?string $navigationLabel = 'Letters';
    // protected static ?string $modelLabel = 'cliente';

    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'success';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Select::make('category_id')
                    ->label('Category')
                    ->options(Category::where('document_type', 'LETTER')->pluck('name', 'id'))
                    ->preload()
                    ->native(false)
                    ->searchable(),
                Forms\Components\TextInput::make('author')
                    ->label('Author/Sender')
                    ->maxLength(255),
                Forms\Components\Select::make('contractor_id')
                    ->relationship('contractor', 'name')
                    ->default(1)
                    ->label('Contractor Name')
                    ->native(false),

                Forms\Components\TextInput::make('file_number')
                    ->maxLength(255),
                Forms\Components\TextInput::make('amount')
                    ->numeric(),
                Forms\Components\TextInput::make('phone')
                    ->minLength(11)
                    ->maxLength(11),
                Forms\Components\Select::make('received_by')
                    ->label('Received By')
                    ->placeholder('Select the Receiver of the Memo')
                    ->options(User::where('role', 'USER')->pluck('name', 'id'))
                    ->preload()
                    ->native(false)
                    ->searchable(),
                Forms\Components\DatePicker::make('date_received')
                    ->native(false)
                    ->required(),
//                Forms\Components\TextInput::make('hand_carried')
//                    ->maxLength(255),
//                Forms\Components\TextInput::make('retrieved_by')
//                    ->maxLength(255),
                Forms\Components\Textarea::make('remarks')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('author')
                    ->label('Author/Sender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('file_number')
                    ->searchable(),
                Tables\Columns\IconColumn::make('treated')
                    ->boolean(),
                Tables\Columns\IconColumn::make('dispatched')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListLetters::route('/'),
            'create' => Pages\CreateLetter::route('/create'),
            'view' => Pages\ViewLetter::route('/{record}'),
            'edit' => Pages\EditLetter::route('/{record}/edit'),
        ];
    }
}
