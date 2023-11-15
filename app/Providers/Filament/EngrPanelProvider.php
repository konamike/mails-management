<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Navigation\MenuItem;
use App\Filament\Pages\Auth\EditProfile;

class EngrPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('engr')
            ->path('engr')
            ->databaseNotifications()
            ->databaseNotificationsPolling('30s')
            ->login()
            ->breadcrumbs(false)
            ->userMenuItems([
                 'profile' => MenuItem::make()->label('Edit profile'),
                 'logout' => MenuItem::make()->label('Log out')
            ])
            ->passwordReset()
            ->emailVerification()
            ->profile(EditProfile::class)
            ->colors([
                'primary' => Color::Amber,
                'danger' => Color::Rose,
                'gray' => Color::Gray,
                'info' => Color::Indigo,
                'success' => Color::Lime,
                'warning' => Color::Orange,
            ])
            ->darkMode(true)
            ->brandName("Mails Management System")
            ->discoverResources(in: app_path('Filament/Engr/Resources'), for: 'App\\Filament\\Engr\\Resources')
            ->discoverPages(in: app_path('Filament/Engr/Pages'), for: 'App\\Filament\\Engr\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Engr/Widgets'), for: 'App\\Filament\\Engr\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
