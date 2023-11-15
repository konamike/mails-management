<?php

namespace App\Filament\Engr\Resources;
use App\Filament\Engr\Resources\FileResource\Pages;
use App\Filament\Engr\Resources\FileResource\RelationManagers;
use App\Models\File;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Notifications\Notification;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use function GuzzleHttp\default_ca_bundle;

class FileResource extends Resource
{
    protected static ?string $model = File::class;
    protected static ?string $navigationIcon = 'heroicon-s-briefcase';
    protected static ?string $navigationGroup = 'All Documents';
    protected static ?string $navigationLabel = 'Files';
    protected static ?int $navigationSort = 1;
    
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'info';
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
            Tables\Columns\TextColumn::make('contractor.name')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('document_author')
                ->wrap()
                ->searchable(),
            Tables\Columns\TextColumn::make('description')
                ->wrap()
                ->searchable(),
            Tables\Columns\TextColumn::make('date_received')
                ->date()
                ->sortable(),
               Tables\Columns\TextColumn::make('amount')
                   ->numeric()
                   ->sortable(),
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
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                ExportBulkAction::make(),
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
            // 'create' => Pages\CreateFile::route('/create'),
            'view' => Pages\ViewFile::route('/{record}'),
            // 'edit' => Pages\EditFile::route('/{record}/edit'),
        ];
    }
}
