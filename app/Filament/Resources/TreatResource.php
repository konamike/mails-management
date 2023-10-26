<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TreatResource\Pages;
use App\Filament\Resources\TreatResource\RelationManagers;
use App\Models\File;
use App\Models\User;
use App\Models\Treat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TreatResource extends Resource
{
    protected static ?string $model = Treat::class;

    protected static ?string $navigationIcon = 'heroicon-s-rectangle-stack';

    public static function form(Form $form): Form
    {
        {
            return $form
                ->schema([
                    Forms\Components\Select::make('file_id')
                    ->options(File::all()->pluck('description', 'id'))
                    ->preload()
                    ->searchable()
                    ->label('Document Title'),
                    Forms\Components\DatePicker::make('date_treated')
                    ->native(false)
                    ->required()
                    ->displayFormat('d/m/Y'),        
                    Forms\Components\Toggle::make('treated')
                        ->required(),
                    Forms\Components\Textarea::make('remarks')
                        ->maxLength(65535)
                        ->columnSpanFull(),
                ]);
        }
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('file.description')
                    ->label('Document Description')
                    ->wrap(),                    
                Tables\Columns\IconColumn::make('treated')
                    ->boolean(),
                Tables\Columns\TextColumn::make('date_treated')
                    ->date()
                    ->sortable(),
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
            'index' => Pages\ListTreats::route('/'),
            'create' => Pages\CreateTreat::route('/create'),
            'view' => Pages\ViewTreat::route('/{record}'),
            'edit' => Pages\EditTreat::route('/{record}/edit'),
        ];
    }    
}
