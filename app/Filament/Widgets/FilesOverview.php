<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\FileoutResource;
use App\Models\File;

use App\Models\Letter;

use App\Models\Memo;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;


class FilesOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Files Received', File::count())
                ->description('Total Files received')
                ->icon('heroicon-s-academic-cap')
                ->color('primary'),
            Stat::make('File Under Review',File::where('treated','=',0)->count())
                ->description('Total files being processed')
                ->icon('heroicon-s-academic-cap')
                ->color('warning'),
            Stat::make('Files Treated',File::where('treated', '=', 1)->count())
                ->description('Total Treated Files')
                ->icon('heroicon-s-academic-cap')
                ->color('success'),
            Stat::make('Files Dispatched',File::where('dispatched', '=', 1)->count())
                ->description('Total Files dispatched')
                ->icon('heroicon-s-academic-cap')
                ->color('info'),
            Stat::make('Letters Received', Letter::count())
                ->color('primary'),
            Stat::make('Letters Being Processed',Letter::where('treated','=',0)->count())
                ->color('info'),
            Stat::make('Letters Treated',Letter::count())
                ->color('success'),
            Stat::make('Letters Dispatched',File::where('dispatched', '=', 1)->count())
                ->color('success'),
            Stat::make('Memos Received', Memo::count())
                ->color('primary'),
            Stat::make('Memos Being Processed',Memo::where('treated','=',0)->count())
                ->color('info'),
            Stat::make('Memos Treated',Memo::count())
                ->color('success'),
            Stat::make('Memos Dispatched',File::where('dispatched', '=', 1)->count())
                ->color('success'),
        ];
    } protected int | string | array $columnSpan = 2;



}
