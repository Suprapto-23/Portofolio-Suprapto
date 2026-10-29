<?php

namespace App\Providers;

use Filament\Notifications\Notification;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // ===== PAKSA HTTPS SAAT DIAKSES LEWAT NGROK / DOMAIN HTTPS =====
        if (str_contains(config('app.url'), 'https://')) {
            URL::forceScheme('https');
        }

        // ===== ALERT: LOGIN BERHASIL =====
        Event::listen(Login::class, function (Login $event) {
            Notification::make()
                ->title('Login Berhasil')
                ->body('Selamat datang kembali, ' . $event->user->name . '!')
                ->success()
                ->icon('heroicon-o-check-circle')
                ->send();
        });

        // ===== ALERT: LOGOUT BERHASIL =====
        Event::listen(Logout::class, function (Logout $event) {
            Notification::make()
                ->title('Logout Berhasil')
                ->body('Anda telah keluar dari dashboard. Sampai jumpa lagi!')
                ->success()
                ->icon('heroicon-o-arrow-right-on-rectangle')
                ->send();
        });

        // ===== GAMBAR ILUSTRASI DI HALAMAN LOGIN =====
        FilamentView::registerRenderHook(
            PanelsRenderHook::AUTH_LOGIN_FORM_BEFORE,
            fn (): string => Blade::render(
                '<div class="pra-login-illustration">
                    <img src="' . asset('images/login.png') . '" alt="Login Illustration">
                </div>'
            ),
        );

        // ===== FOOTER COPYRIGHT =====
        FilamentView::registerRenderHook(
            PanelsRenderHook::AUTH_LOGIN_FORM_AFTER,
            fn (): string => '<p class="text-center text-xs text-gray-500 mt-10">&copy; ' . date('Y') . ' PRA Technology. All rights reserved.</p>',
        );
    }
}