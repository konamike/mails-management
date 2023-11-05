<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FileResource\Pages;
use App\Filament\Resources\FileResource\RelationManagers;
use App\Models\File;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FileResource extends Resource
{
    protected static ?string $model = File::class;


    protected static ?string $navigationIcon = 'heroicon-s-briefcase';
    protected static ?string $navigationGroup = 'Incoming Documents';
    protected static ?string $navigationLabel = 'Files';

    protected static ?int $navigationSort = 1;

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
                Forms\Components\Textarea::make('description')
                ->label('File Description')
                ->required()
                ->maxLength(65535)
                ->columnSpanFull(),
                Forms\Components\Select::make('contractor_id')
                    ->relationship('contractor', 'name')
                    ->searchable()
                    ->preload()
                    ->native(false),
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->preload()
                    ->native(false)
                    ->searchable(),
                Forms\Components\TextInput::make('file_number')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('received_by')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date_received')
                    ->native(false)
                    ->required(),
                Forms\Components\TextInput::make('document_author')
                    ->maxLength(255),
                Forms\Components\TextInput::make('document_sender')
                    ->maxLength(255),
                Forms\Components\TextInput::make('amount')
                    ->numeric(),
                Forms\Components\TextInput::make('hand_carried')
                    ->maxLength(255),
                Forms\Components\TextInput::make('retrieved_by')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date_retrieved')
                    ->native(false),
                Forms\Components\Textarea::make('remarks')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('contractor.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('file_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('received_by')
                    ->wrap('')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_received')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('treated')
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
                // Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListFiles::route('/'),
            'create' => Pages\CreateFile::route('/create'),
            'view' => Pages\ViewFile::route('/{record}'),
            'edit' => Pages\EditFile::route('/{record}/edit'),
        ];
    }  
    
    
    
    
}
