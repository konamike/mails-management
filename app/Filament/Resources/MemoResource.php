<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemoResource\Pages;
use App\Filament\Resources\MemoResource\RelationManagers;
use App\Models\Memo;
use App\Models\User;
use App\Models\Category;
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
    protected static ?string $navigationGroup = 'All Documents';
    protected static ?string $navigationLabel = 'Memos';

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
                    ->label('Document Category')
                    ->options(Category::where('document_type', 'MEMO')->pluck('name', 'id'))
                    ->preload()
                    ->native(false)
                    ->searchable(),
                Forms\Components\TextInput::make('author')
                    ->label('Author/Sender')
                    ->maxLength(255),
                Forms\Components\Select::make('contractor_id')
                    ->relationship('contractor', 'name')
                    ->default(1)
                    ->searchable()
                    ->label('Mail (Internal/Contractor)')
                    ->native(false),
                Forms\Components\TextInput::make('file_number')
                    ->maxLength(255),
                Forms\Components\TextInput::make('amount')
                    ->numeric(),
                Forms\Components\TextInput::make('email')
                    ->label('Email'),
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
                    ->searchable()
                    ->wrap()
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
                    ->sortable()
                    ->boolean(),
                Tables\Columns\IconColumn::make('dispatched')
                    ->sortable()
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
            'create' => Pages\CreateMemo::route('/create'),
            'view' => Pages\ViewMemo::route('/{record}'),
            'edit' => Pages\EditMemo::route('/{record}/edit'),
        ];
    }
}
