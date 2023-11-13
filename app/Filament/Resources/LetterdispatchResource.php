<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LetterdispatchResource\Pages;
use App\Filament\Resources\LetterdispatchResource\RelationManagers;
use App\Models\Letterdispatch;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LetterdispatchResource extends Resource
{
    protected static ?string $model = Letterdispatch::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-library';
    protected static ?string $navigationGroup = 'Documents for Dispatch';
    protected static ?string $navigationLabel = 'Letters';
    protected static ?int $navigationSort = 2;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('dispatched', false)->count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'success';
    }

    public static function getEloquentQuery(): Builder
    {
        return static::getModel()::query()
            ->where('treated', true)
            ->where('dispatched', false);
    }


    public static function canCreate(): bool
    {
        return false;
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('Dispatch Details')
                    ->schema([
                                Forms\Components\TextInput::make('sent_from')
                                    ->label('Sent From:')
                                    ->required()
                                    ->default('MD/CEO')
                                    ->placeholder('MD/CEO')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('sent_to')
                                    ->label('Sent To:')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('dispatch_phone')
                                    ->label('Phone Number:')
                                    ->maxLength(11),
                                Forms\Components\TextInput::make('dispatch_email')
                                    ->email()
                                    ->label('Email Address:')
                                    ->maxLength(255),
                                Forms\Components\DatePicker::make('date_dispatched')
                                    ->native(false)
                                    ->label('Dispatched Date:')
                                    ->required(),
                                Forms\Components\Toggle::make('dispatched')
                                    ->label('File Dispatched?')
                                    ->helperText('Click to enable the Dispatch Status of Letter')
                                    ->required(),
                            ])->columns(3),

                        Forms\Components\Fieldset::make()
                            ->schema([
                                \Filament\Forms\Components\RichEditor::make('dispatch_remarks')
//                                    ->label('Remarks'),
                            ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\IconColumn::make('treated')
                    ->label('Treated?')
                    ->boolean(),
                Tables\Columns\TextColumn::make('date_treated')
                    ->date(),
                Tables\Columns\TextColumn::make('author')
                    ->wrap()
                    ->label('Author')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->label('File Description')
                    ->wrap(),
                Tables\Columns\TextColumn::make('file_number')
                    ->searchable(),


            ])
            ->filters([
                //
            ])
            ->actions([
//                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make()->label('Process'),
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
            'index' => Pages\ListLetterdispatches::route('/'),
//             'create' => Pages\CreateLetterdispatch::route('/create'),
//             'view' => Pages\ViewLetterdispatch::route('/{record}'),
            'edit' => Pages\EditLetterdispatch::route('/{record}/edit'),
        ];
    }
}
