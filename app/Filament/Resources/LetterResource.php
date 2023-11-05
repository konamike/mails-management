<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LetterResource\Pages;
use App\Filament\Resources\LetterResource\RelationManagers;
use App\Models\Letter;
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
    protected static ?string $navigationGroup = 'Incoming Documents';
    protected static ?string $navigationLabel = 'Letter';



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
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->label('Category'),
                Forms\Components\TextInput::make('file_number')
                    ->maxLength(100),
                Forms\Components\TextInput::make('author')
                    ->label('Author/Sender')
                    ->maxLength(255),
                Forms\Components\Select::make('contractor_id')
                    ->relationship('contractor', 'name')
                    ->default(0)
                    ->label('Contractor Name'),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('amount')
                    ->numeric(),
                Forms\Components\TextInput::make('phone')
                    ->string()
                    ->maxLength(11),
                Forms\Components\TextInput::make('received_by')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date_received')
                     ->required()
                     ->native(false),
                Forms\Components\TextInput::make('hand_carried')
                    ->maxLength(255),
                Forms\Components\TextInput::make('retrieved_by')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date_retrieved')
                ->native(false),
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
                    ->label('Category')
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->wrap()
                    ->label('Document Title'),
                // Tables\Columns\TextColumn::make('contractor.name')
                //     ->numeric()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('treated_by')
                //     ->numeric()
                //     ->sortable(),
                Tables\Columns\TextColumn::make('date_received')
                    ->date()
                    ->label('Date Received')
                    ->sortable(),
                Tables\Columns\TextColumn::make('author')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('file_number')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('amount')
                //     ->numeric()
                //     ->sortable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('received_by')
                //     ->searchable(),

                // Tables\Columns\TextColumn::make('hand_carried')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('retrieved_by')
                //     ->searchable(),
                Tables\Columns\IconColumn::make('treated')
                    ->boolean(),

                // Tables\Columns\TextColumn::make('date_treated')
                //     ->date()
                //     ->sortable(),
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
