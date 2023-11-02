<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FiletreatmentResource\Pages;
use App\Filament\Resources\FiletreatmentResource\RelationManagers;
use App\Models\Filetreatment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FiletreatmentResource extends Resource
{
    protected static ?string $model = Filetreatment::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    protected static ?string $navigationLabel = 'Processing Files';

    protected static ?string $navigationGroup = 'Processing Documents';



    protected static ?int $navigationSort = 1;
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
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


    /**
     * Summary of getEloquentQuery
     * @return \Illuminate\Database\Eloquent\Builder
     * Filter data based on treated documents     */
    public static function getEloquentQuery(): Builder
{
    return static::getModel()::query()->where('treated',0);
}

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('file_number')
                    ->disabled(),
                Forms\Components\Textarea::make('description')
                    ->disabled(),
                Forms\Components\DatePicker::make('date_treated')
                    ->native(false)
                    ->required(),
                Forms\Components\Toggle::make('treated')
                    ->label('File Treated')
                    ->required(),
                Forms\Components\Textarea::make('remarks')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('description')
                    ->label('Document Name')
                    ->wrap()
                    ->sortable(),

                Tables\Columns\TextColumn::make('contractor.name')
                    ->label("Contractor's Name")
                    ->wrap()
                    ->sortable(),

                Tables\Columns\TextColumn::make('file_number')
                    ->searchable(),

                Tables\Columns\TextColumn::make('amount')
                    ->numeric()
                    ->sortable(),

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
            'index' => Pages\ListFiletreatments::route('/'),
            // 'create' => Pages\CreateFiletreatment::route('/create'),
            'edit' => Pages\EditFiletreatment::route('/{record}/edit'),
        ];
    }
}
