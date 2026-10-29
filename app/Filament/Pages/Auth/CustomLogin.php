<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\Login as BaseLogin;

class CustomLogin extends BaseLogin
{
    public function getHeading(): string
    {
        return 'Welcome Back';
    }

    public function getSubheading(): ?string
    {
        return 'Silakan masukkan kredensial Anda untuk masuk ke dasbor.';
    }
}