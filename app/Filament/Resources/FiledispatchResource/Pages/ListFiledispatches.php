<?php

namespace App\Filament\Resources\FiledispatchResource\Pages;

use App\Filament\Resources\FiledispatchResource;
use App\Models\Filedispatch;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
use App\Models\File;


class ListFiledispatches extends ListRecords
{
    protected static string $resource = FiledispatchResource::class;
    protected static ?string $title = 'Files For Dispatch';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All Files'),
            'This Year' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('date_received', '>=', now()->subYear()))
                ->badge(Filedispatch::query()->where('date_dispatched', '>=', now()->subYear())->count())
                ->badgeColor('success'),
            'This Month' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('date_received', '>=', now()->subMonth()))
                ->badge(Filedispatch::query()->where('date_dispatched', '>=', now()->subMonth())->count())
                ->badgeColor('success'),
            'This Week' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('date_received', '>=', now()->subWeek()))
                ->badge(Filedispatch::query()->where('date_dispatched', '>=', now()->subWeek())->count())
                ->badgeColor('success'),
        ];
    }

    public function getDefaultActiveTab(): string | int | null
    {
        return 'all';
    }
}
