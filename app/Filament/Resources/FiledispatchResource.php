<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FiledispatchResource\Pages;
use App\Filament\Resources\FiledispatchResource\RelationManagers;
use App\Models\Filedispatch;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Concerns\CanDeselectRecordsAfterCompletion;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class FiledispatchResource extends Resource
{

    protected static ?string $model = Filedispatch::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';
    protected static ?string $navigationGroup = 'Outgoing Documents';
    protected static ?string $navigationLabel = 'Files For Dispatch';
    protected static ?int $navigationSort = 1;

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
                            ->hint('Click to complete dispatch process')
                            ->required(),
                    ])->columns(3),

                Forms\Components\Fieldset::make()
                        ->schema([
                            \Filament\Forms\Components\RichEditor::make('dispatch_remarks')
//                                ->label('Dispatch Remarks')
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
                Tables\Columns\TextColumn::make('document_author')
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
            'index' => Pages\ListFiledispatches::route('/'),
//             'create' => Pages\CreateFiledispatch::route('/create'),
//             'view' => Pages\ViewFiledispatch::route('/{record}'),
            'edit' => Pages\EditFiledispatch::route('/{record}/edit'),
        ];
    }
}
