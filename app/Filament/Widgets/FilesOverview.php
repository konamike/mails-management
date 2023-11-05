<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\FileoutResource;
use App\Models\File;
use App\Models\FileOut;
use App\Models\Letter;
use App\Models\LetterOut;
use App\Models\Memo;
use App\Models\MemoOut;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class FilesOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Files Received', File::count())
                ->color('primary'),
            Stat::make('File Under Review',File::where('treated','=',0)->count())
                ->color('warning'),
            Stat::make('Total Files Treated',Fileout::count())
                ->color('success'),
            Stat::make('Total Letters Received', Letter::count())
                ->color('primary'),
            Stat::make('Letters Under Review',Letter::where('treated','=',0)->count())
                ->color('info'),
            Stat::make('Total Letters Treated',LetterOut::count())
                ->color('success'),
            Stat::make('Total Memos Received', Memo::count())
                ->color('primary'),
            Stat::make('Memos Under Review',Memo::where('treated','=',0)->count())
                ->color('info'),
            Stat::make('Total Memos Treated',MemoOut::count())
                ->color('success'),
        ];
    }

    
}
