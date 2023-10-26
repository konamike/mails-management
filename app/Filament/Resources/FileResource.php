<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FileResource\Pages;
use App\Filament\Resources\FileResource\RelationManagers;
use App\Models\Category;
use App\Models\Contractor;
use App\Models\File;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
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

    protected static ?string $navigationLabel = 'Incoming Files';

    protected static ?string $navigationGroup = 'Incoming Documents';

    protected static ?int $navigationSort = 1;
    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                Section::make('File Details')
                    ->schema([
                        Select::make('contractor_id')
                            ->options(Contractor::all()->pluck('name', 'id'))
                            ->preload()
                            ->searchable()
                            ->label('Contractor Name')
                            ->required(),

                        Select::make('category_id')
                            ->options(Category::where('document_type', '=',  'FILE')->pluck('name', 'id'))
                            ->preload()
                            ->searchable()
                            ->label('Category Name')
                            ->required(),

                        Forms\Components\TextInput::make('file_number')
                            ->required()
                            ->maxLength(50),
                        Forms\Components\TextInput::make('received_by')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('received_date')
                            ->native(false)
                            ->displayFormat('d/m/Y'),
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
                Tables\Columns\TextColumn::make('received_date')
                ->date()
                ->sortable(),
                Tables\Columns\TextColumn::make('contractor.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->limit(150)
                    ->wrap()
                    ->sortable(),
                // Tables\Columns\TextColumn::make('file_number')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('received_by')
                //     ->searchable(),

                // Tables\Columns\TextColumn::make('document_author')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('document_sender')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('amount')
                    ->numeric(
                        decimalPlaces: 2,
                        decimalSeparator: '.',
                        thousandsSeparator: ','
                    ),
                // Tables\Columns\TextColumn::make('hand_carried')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('retrieved_by')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('retrieved_date')
                //     ->date()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
