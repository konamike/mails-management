<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\FileResource;
use App\Models\File;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestFiles extends BaseWidget
{

    protected int | string | array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        return $table
            ->query(FileResource::getEloquentQuery())
            ->defaultPaginationPageOption(10)
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                ->label('Date Created')
                ->date(),        
                Tables\Columns\TextColumn::make('date_received')
                ->label('Date Received')
                ->date(),        
                Tables\Columns\TextColumn::make('description')
                ->searchable()
                ->wrap(),
            Tables\Columns\TextColumn::make('file_number')
                ->searchable(),
            Tables\Columns\TextColumn::make('amount')
                ->numeric(),
            Tables\Columns\IconColumn::make('treated')
                ->boolean(),
            ]);
    }

	/**
	 * @return int|string|array
	 */
	public function getColumnSpan(): int|string|array {
		return $this->columnSpan;
	}
	
	/**
	 * @param int|string|array $columnSpan 
	 * @return self
	 */
	public function setColumnSpan(int|string|array $columnSpan): self {
		$this->columnSpan = $columnSpan;
		return $this;
	}
}
