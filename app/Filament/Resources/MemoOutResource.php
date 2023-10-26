<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemoOutResource\Pages;
use App\Filament\Resources\MemoOutResource\RelationManagers;
use App\Models\MemoOut;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MemoOutResource extends Resource
{
    protected static ?string $model = MemoOut::class;

    protected static ?string $navigationIcon = 'heroicon-s-inbox-stack';

    protected static ?string $navigationLabel = 'Outgoing Memos';

    protected static ?string $navigationGroup = 'Outgoing Documents';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('memo_in_id')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('out_date')
                    ->required(),
                Forms\Components\TextInput::make('hand_carried')
                    ->maxLength(255),
                Forms\Components\TextInput::make('from')
                    ->required()
                    ->maxLength(255)
                    ->default('MD/CEO'),
                Forms\Components\TextInput::make('send_to')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('treated')
                    ->required(),
                Forms\Components\DatePicker::make('date_treated')
                    ->required(),
                Forms\Components\TextInput::make('processed_by')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('remarks')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('memo_in_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('out_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hand_carried')
                    ->searchable(),
                Tables\Columns\TextColumn::make('from')
                    ->searchable(),
                Tables\Columns\TextColumn::make('send_to')
                    ->searchable(),
                Tables\Columns\IconColumn::make('treated')
                    ->boolean(),
                Tables\Columns\TextColumn::make('date_treated')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('processed_by')
                    ->searchable(),
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
            'index' => Pages\ListMemoOuts::route('/'),
            'create' => Pages\CreateMemoOut::route('/create'),
            'view' => Pages\ViewMemoOut::route('/{record}'),
            'edit' => Pages\EditMemoOut::route('/{record}/edit'),
        ];
    }    
}
