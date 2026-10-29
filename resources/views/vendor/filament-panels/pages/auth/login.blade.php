<x-filament-panels::layout.base :livewire="$this">
    <div class="flex min-h-screen bg-white">
        
        <!-- Sisi Kiri: Gambar Animasi & Branding (Sembunyi di Layar HP) -->
        <div class="hidden lg:flex lg:w-1/2 relative bg-[#F4F9FF] items-center justify-center overflow-hidden border-r border-[#DCE7F5]">
            <!-- Ornamen Latar Belakang -->
            <div class="absolute inset-0 bg-gradient-to-br from-[#1677FF]/5 to-[#7048FF]/5"></div>
            <div class="absolute -top-20 -left-20 w-80 h-80 bg-[#1677FF]/20 rounded-full blur-[80px]"></div>
            <div class="absolute -bottom-20 -right-20 w-80 h-80 bg-[#7048FF]/20 rounded-full blur-[80px]"></div>

            <div class="relative z-10 text-center p-12 flex flex-col items-center">
                <!-- Memanggil Gambar Custom dari folder public/build/images/ -->
                <img src="{{ asset('build/images/login.png') }}" 
                     alt="Admin Workspace" 
                     class="w-full max-w-[480px] object-contain drop-shadow-2xl animate-[float_6s_ease-in-out_infinite] mix-blend-multiply">
                
                <h2 class="mt-10 text-[28px] font-extrabold tracking-tight text-[#0B1B3A]">
                    Sistem Manajemen Portofolio
                </h2>
                <p class="mt-3 text-[15px] text-[#64748B] max-w-sm mx-auto leading-relaxed">
                    Kelola data proyek, layanan, dan pesan masuk dengan aman melalui dasbor administrator.
                </p>
            </div>
        </div>

        <!-- Sisi Kanan: Form Login Bawaan Filament -->
        <div class="flex flex-1 flex-col justify-center px-6 py-12 lg:px-20 relative bg-white">
            <div class="mx-auto w-full max-w-sm lg:w-[420px]">
                
                <!-- Logo & Sambutan -->
                <div class="text-center lg:text-left mb-10">
                    <a href="{{ route('home') }}" class="inline-block mb-8">
                        <img src="{{ asset('images/logo.png') }}" alt="PRA Technology Logo" class="h-10 mx-auto lg:mx-0 transition-transform hover:scale-105">
                    </a>
                    <h2 class="text-[28px] font-bold tracking-tight text-[#0B1B3A]">
                        Welcome Back
                    </h2>
                    <p class="mt-2 text-[14.5px] text-[#64748B]">
                        Silakan masukkan kredensial Anda untuk masuk ke dasbor.
                    </p>
                </div>

                <!-- Form Autentikasi Asli -->
                <div class="bg-white py-8 px-6 rounded-2xl border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
                    <x-filament-panels::form wire:submit="authenticate">
                        
                        {{ $this->form }}

                        <x-filament-panels::form.actions
                            :actions="$this->getCachedFormActions()"
                            :full-width="$this->hasFullWidthFormActions()"
                            class="mt-6"
                        />
                        
                    </x-filament-panels::form>
                </div>

                <p class="mt-10 text-center text-[13px] text-gray-400">
                    &copy; {{ date('Y') }} PRA TECHNOLOGY. All rights reserved.
                </p>
            </div>
        </div>
    </div>
    
    <!-- CSS Animasi Melayang untuk Gambar -->
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }
    </style>
</x-filament-panels::layout.base>