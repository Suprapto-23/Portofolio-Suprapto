<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Auth\CustomLogin;
use App\Filament\Widgets\DashboardStats;
use App\Filament\Widgets\ProjectsChart;
use App\Filament\Widgets\RecentProjects;
use Filament\Actions\Action;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
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

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login(CustomLogin::class)

            // ===== BRANDING & LOGO =====
            ->colors([
                'primary' => Color::hex('#1677FF'),
                'gray'    => Color::Slate,
            ])
            ->font('Poppins')
            ->brandName('PRA Technology')
            ->brandLogo(asset('favicon/favicon.png'))
            ->brandLogoHeight('2rem')
            ->favicon(asset('favicon/favicon.png'))
            ->darkMode(false)

            // ===== THEME CSS CUSTOM =====
            ->viteTheme('resources/css/filament/admin/theme.css')

            // ===== UX: NAVIGASI INSTAN & SIDEBAR =====
            ->spa()
            ->sidebarFullyCollapsibleOnDesktop()
            ->maxContentWidth('full')

            // ===== KONFIRMASI KELUAR (LOGOUT) =====
            ->userMenuItems([
                'logout' => fn (Action $action) => $action
                    ->requiresConfirmation()
                    ->modalHeading('Konfirmasi Keluar')
                    ->modalDescription('Apakah Anda yakin ingin keluar dari panel admin?')
                    ->modalSubmitActionLabel('Ya, Keluar')
                    ->modalIcon('heroicon-o-arrow-right-on-rectangle'),
            ])

            // ===== PENGELOMPOKAN MENU SIDEBAR =====
            ->navigationGroups([
                NavigationGroup::make('Manajemen Portofolio')
                    ->icon('heroicon-o-folder-open'),
                NavigationGroup::make('Pengaturan Sistem')
                    ->icon('heroicon-o-cog-6-tooth'),
            ])

            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                DashboardStats::class,
                ProjectsChart::class,
                RecentProjects::class,
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