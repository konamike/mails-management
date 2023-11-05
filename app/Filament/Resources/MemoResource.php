<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemoResource\Pages;
use App\Filament\Resources\MemoResource\RelationManagers;
use App\Models\Memo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MemoResource extends Resource
{
    protected static ?string $model = Memo::class;

    protected static ?string $navigationIcon = 'heroicon-s-briefcase';
    protected static ?string $navigationGroup = 'Incoming Documents';
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
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\Select::make('contractor_id')
                    ->relationship('contractor', 'name')
                    ->placeholder('None')
                    ->required(),

                Forms\Components\TextInput::make('author')
                    ->label('Author/Sender')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('file_number')
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('amount')
                    ->numeric(),
                Forms\Components\TextInput::make('phone')
                    ->maxLength(11),
                Forms\Components\TextInput::make('received_by')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date_received'),
                Forms\Components\TextInput::make('hand_carried')
                    ->maxLength(255),
                Forms\Components\TextInput::make('retrieved_by')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date_retrieved'),
                // Forms\Components\Toggle::make('treated')
                //     ->required(),
                // Forms\Components\DatePicker::make('date_treated'),
                // Forms\Components\TextInput::make('treated_by')
                //     ->maxLength(255),
                // Forms\Components\Textarea::make('notes')
                //     ->maxLength(65535)
                //     ->columnSpanFull(),
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
                    ->searchable(),

                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('date_received')
                    ->date()
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
            'index' => Pages\ListMemos::route('/'),
            // 'create' => Pages\CreateMemo::route('/create'),
            // 'view' => Pages\ViewMemo::route('/{record}'),
            // 'edit' => Pages\EditMemo::route('/{record}/edit'),
        ];
    }    
}
