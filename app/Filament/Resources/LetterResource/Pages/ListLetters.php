<?php

namespace App\Filament\Resources\LetterResource\Pages;

use App\Filament\Resources\LetterResource;
use App\Models\Letter;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Table;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
use App\Models\File;
class ListLetters extends ListRecords
{
    protected static string $resource = LetterResource::class;
    protected static ?string $title = 'All Letters';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All Letters'),
            'This Year' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('date_received', '>=', now()->subYear()))
                ->badge(Letter::query()->where('date_received', '>=', now()->subYear())->count())
                ->badgeColor('success'),
            'This Month' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('date_received', '>=', now()->subMonth()))
                ->badge(Letter::query()->where('date_received', '>=', now()->subMonth())->count())
                ->badgeColor('success'),
            'This Week' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('date_received', '>=', now()->subWeek()))
                ->badge(Letter::query()->where('date_received', '>=', now()->subWeek())->count())
                ->badgeColor('success'),
        ];
    }

    public function getDefaultActiveTab(): string | int | null
    {
        return 'all';
    }
}
