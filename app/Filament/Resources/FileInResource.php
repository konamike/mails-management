<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FileInResource\Pages;
use App\Filament\Resources\FileInResource\RelationManagers;
use App\Models\FileIn;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;

class FileInResource extends Resource
{
    protected static ?string $model = FileIn::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationLabel = 'Incoming Files';

    protected static ?string $navigationGroup = 'Incoming Documents';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('File Details')
                // ->description('Put details of file here')
                ->schema([
                    Forms\Components\TextInput::make('contractor_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('category_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('file_number')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('received_by')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('received_date')
                    ->required(),                    
                Forms\Components\TextInput::make('document_author')
                    ->maxLength(100),
                Forms\Components\TextInput::make('document_sender')
                    ->maxLength(100),
                Forms\Components\TextInput::make('amount')
                    ->numeric(),        
                ])
                ->columns(3),
                 
                Section::make('Description Details')->schema([

                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                // Forms\Components\TextInput::make('hand_carried')
                //     ->maxLength(255),
                // Forms\Components\TextInput::make('retrieved_by')
                //     ->maxLength(255),
                // Forms\Components\DatePicker::make('retrieved_date'),
                // Forms\Components\Toggle::make('treated')
                //     ->required(),
                // Forms\Components\DatePicker::make('treated_date')
                //     ->required(),
                Forms\Components\Textarea::make('remarks')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                  ])->columns(3)     
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('contractor_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('file_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('received_by')
                    ->searchable(),
                Tables\Columns\TextColumn::make('received_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('document_author')
                    ->searchable(),
                Tables\Columns\TextColumn::make('document_sender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hand_carried')
                    ->searchable(),
                Tables\Columns\TextColumn::make('retrieved_by')
                    ->searchable(),
                Tables\Columns\TextColumn::make('retrieved_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\IconColumn::make('treated')
                    ->boolean(),
                Tables\Columns\TextColumn::make('treated_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
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
            'index' => Pages\ListFileIns::route('/'),
            'create' => Pages\CreateFileIn::route('/create'),
            'view' => Pages\ViewFileIn::route('/{record}'),
            'edit' => Pages\EditFileIn::route('/{record}/edit'),
        ];
    }    
}
