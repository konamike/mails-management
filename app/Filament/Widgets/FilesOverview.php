<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\FileoutResource;
use App\Models\File;
use App\Models\FileOut;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class FilesOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Files Received', File::count())
                ->color('default')
                ->description('Total Number of files receieved')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([6,3,4,6,2,7,2,6,9,4]),
            Stat::make('Total Files under review',File::where('treated','=',0)->count())
                ->color('info')
                ->description('Total Number of files under review')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([6,3,4,6,2,7,2,6,9,4]),
            Stat::make('Total Files Treated',Fileout::count())
                ->color('success')
                ->description('Total Number of files under review')
                ->descriptionIcon('heroicon-m-receipt-refund')
                ->chart([6,3,4,6,2,7,2,6,9,4]),
            Stat::make('Total Memos Received',1234)
                ->color('primary')
                ->description('Total Number of files receieved')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([6,3,4,6,2,7,2,6,9,4]),
            Stat::make('Total Memos under review',120)
                ->color('danger')
                ->description('Total Number of files under review')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([6,3,4,6,2,7,2,6,9,4]),
            Stat::make('Total Memos Treated',890)
                ->color('default')
                ->description('Total Number of files under review')
                ->descriptionIcon('heroicon-m-receipt-refund')
                ->chart([6,3,4,6,2,7,2,6,9,4]),
        ];
    }
}
