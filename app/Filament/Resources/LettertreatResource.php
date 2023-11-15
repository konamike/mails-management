<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LettertreatResource\Pages;
use App\Filament\Resources\LettertreatResource\RelationManagers;
use App\Models\Lettertreat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Webbingbrasil\FilamentAdvancedFilter\Filters\BooleanFilter;


class LettertreatResource extends Resource
{
    protected static ?string $model = Lettertreat::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';
    protected static ?string $navigationGroup = 'Being Processed';
    protected static ?string $navigationLabel = 'Letters';

    protected static ?string $modelLabel = 'Letter Processed';

    protected static ?int $navigationSort = 2;

    

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('treated', false)->count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'success';
    }


    // Filament::registerUserMenuItems([
    //     'account' => UserMenuItem::make()->url(route('filament.pages.profile')),
    // ]);
    
    // if (auth()->user()->hasRole('Admin')) {
    //     Filament::registerUserMenuItems([
    //         'credits' => UserMenuItem::make()->label('Credits')->icon('heroicon-o-phone-outgoing')->url(route('filament.pages.credits')),
    //     ]);
    // }

    /*
        public static function getEloquentQuery(): Builder
        {
            $cat = Category::query()
                // You can use eloquent methods here
                ->select('id')
                ->whereNotIn('name', ['INVITATION', 'COURTESY VISIT'])
                ->where('document_type', 'LETTER')
                ->get();

            $cat_cos = Category::query()
                // You can use eloquent methods here
                ->select('id')
                ->whereIn('name', ['INVITATION', 'COURTESY VISIT'])
                ->where('document_type', 'LETTER')
                ->get();

            if (Auth::user()->role === 'CoS') {
                return Lettertreat::query()->where('treated', 0)
                    ->whereIn('id', $cat_cos);

    //            return static::getModel()::query()->where('treated', 0)
    //                ->whereIn('category_id', (Category::query()
    //                    ->select('id')
    //                    ->whereIn('name', ['INVITATION', 'APPRECIATION'])
    //                    ->get()));
            } else {
                return Lettertreat::query()->where('treated', 0)
                    ->whereIn('id', $cat);
            }
        }*/

    public static function canCreate(): bool
    {
        return false;
    }

    // public static function canDelete(Model $record): bool
    // {
    //     return false;
    // }


    /**
     * Summary of getEloquentQuery
     * @return \Illuminate\Database\Eloquent\Builder
     * Filter data based on treated documents     */


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
                Forms\Components\Textarea::make('notes')
                    ->label('Note for the MD')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ])->columns(2);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.document_type')
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_received')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Document Name')
                    ->searchable()
                    ->wrap()
                    ->sortable(),

                Tables\Columns\TextColumn::make('contractor.name')
                    ->label("Contractor's Name")
                    ->searchable()
                    ->wrap()
                    ->sortable(),

                Tables\Columns\TextColumn::make('file_number')
                    ->searchable(),

                Tables\Columns\TextColumn::make('amount')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\IconColumn::make('treated')
                    ->boolean(),

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
            'index' => Pages\ListLettertreats::route('/'),
//             'create' => Pages\CreateLettertreat::route('/create'),
            'edit' => Pages\EditLettertreat::route('/{record}/edit'),
        ];
    }
}
