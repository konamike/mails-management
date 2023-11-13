<?php

namespace App\Filament\Resources\MemoResource\Pages;

use App\Filament\Resources\MemoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Table;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
use App\Models\File;
class ListMemos extends ListRecords
{
    protected static string $resource = MemoResource::class;

    protected static ?string $title = 'All Memos';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All Memos'),
            'This Year' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('date_received', '>=', now()->subYear()))
                ->badge(File::query()->where('date_received', '>=', now()->subYear())->count())
                ->badgeColor('success'),
            'This Month' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('date_received', '>=', now()->subMonth()))
                ->badge(File::query()->where('date_received', '>=', now()->subMonth())->count())
                ->badgeColor('success'),
            'This Week' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('date_received', '>=', now()->subWeek()))
                ->badge(File::query()->where('date_received', '>=', now()->subWeek())->count())
                ->badgeColor('success'),
        ];
    }

    public function getDefaultActiveTab(): string | int | null
    {
        return 'all';
    }
}
