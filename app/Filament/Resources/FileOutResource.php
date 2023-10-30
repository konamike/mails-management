<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FileoutResource\Pages;
use App\Filament\Resources\FileoutResource\RelationManagers;
use App\Models\File;
use App\Models\Fileout;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FileoutResource extends Resource
{
    protected static ?string $model = Fileout::class;

    protected static ?string $navigationIcon = 'heroicon-s-briefcase';

    protected static ?string $navigationLabel = 'Outgoing Files';

    protected static ?string $navigationGroup = 'Outgoing Documents';

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
                Select::make('file_id')
                ->options(File::where('treated', '=', '1')->pluck('description','id'))
                ->preload()
                ->searchable()
                ->label('File Name')
                ->required(),
                Forms\Components\TextInput::make('from')
                    ->maxLength(255),
                Forms\Components\TextInput::make('send_to')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date_out')
                    ->native(false)
                    ->required(),
                Forms\Components\Textarea::make('remarks')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('file.date_received')
                ->label('Date Received'),
                Tables\Columns\TextColumn::make('file.file_number')
                ->label('File Number'),
                Tables\Columns\TextColumn::make('file.description')
                    ->label('Document Name')
                    ->wrap()
                    ->sortable(),
                Tables\Columns\TextColumn::make('from')
                    ->default('MD/CEO'),
                Tables\Columns\TextColumn::make('send_to')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_out')
                    ->date()
                    ->label('Date Sent')
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
            'index' => Pages\ListFileouts::route('/'),
            'create' => Pages\CreateFileout::route('/create'),
            'view' => Pages\ViewFileout::route('/{record}'),
            'edit' => Pages\EditFileout::route('/{record}/edit'),
        ];
    }    
}
