<?php

namespace App\Filament\Resources\LettertreatResource\Pages;

use App\Filament\Resources\LetterResource;
use App\Filament\Resources\LettertreatResource;
use App\Models\Lettertreat;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Table;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
use App\Models\File;
class ListLettertreats extends ListRecords
{
    protected static string $resource = LettertreatResource::class;

    protected static ?string $title = 'All Letters for Dispatch';

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All Letters'),
            'This Year' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('date_received', '>=', now()->subYear()))
                ->badge(Lettertreat::query()->where('date_received', '>=', now()->subYear())->count())
                ->badgeColor('success'),
            'This Month' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('date_received', '>=', now()->subMonth()))
                ->badge(Lettertreat::query()->where('date_received', '>=', now()->subMonth())->count())
                ->badgeColor('success'),
            'This Week' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('date_received', '>=', now()->subWeek()))
                ->badge(Lettertreat::query()->where('date_received', '>=', now()->subWeek())->count())
                ->badgeColor('success'),
        ];
    }

    public function getDefaultActiveTab(): string | int | null
    {
        return 'all';
    }
}
