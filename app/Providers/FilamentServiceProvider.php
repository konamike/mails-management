<?php

namespace App\Providers;

use App\Filament\Resources\FiletreatmentResource;
use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use App\Models\Filetreatment;
use App\Models\User;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            Filament::registerNavigationItems([
                NavigationItem::make('Awaiting Signing')
                    // ->url(route('filament.admin.resources.filetreatments.edit')
                    ->icon('heroicon-o-presentation-chart-line')
                    ->activeIcon('heroicon-s-presentation-chart-line')
                    ->group('Awaiting MD')
                    ->visible(fn (NavigationItem $item) => User::where('role', 'CoS')->first())
                    // ->visible(fn(): bool => User::ROLE_CoS))
                    
                    ->sort(3),
            ]);
        });
    }
}
