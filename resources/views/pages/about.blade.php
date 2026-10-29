@extends('layouts.app')

@section('content')
<!-- ABOUT HERO -->
<section class="relative bg-white pt-24 pb-16 lg:pt-32 lg:pb-24 overflow-hidden border-b border-gray-100">
    <div class="absolute right-0 top-0 w-[500px] h-[500px] bg-[#1677FF]/5 rounded-full blur-[80px] pointer-events-none"></div>
    <div class="max-w-[1180px] mx-auto px-6 relative z-10 text-center lg:text-left grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        <div class="lg:col-span-7" data-aos="fade-right">
            <span class="inline-block mb-3 text-[12px] font-bold uppercase tracking-[0.2em] text-[#1677FF]">Profil Saya</span>
            <h1 class="text-[36px] md:text-[48px] font-extrabold text-[#0B1B3A] leading-tight mb-6">
                Berdedikasi membangun <br class="hidden md:block">
                <span class="bg-gradient-to-r from-[#0A6CFF] to-[#25AEFF] text-transparent bg-clip-text">arsitektur sistem yang tangguh</span>.
            </h1>
            <p class="text-[16px] leading-[1.8] text-[#64748B] mb-6 max-w-[600px] mx-auto lg:mx-0">
                Halo, saya Suprapto. Seorang Web & Backend Developer yang berfokus pada perancangan perangkat lunak yang skalabel, optimasi basis data relasional, dan integrasi REST API. Saya terbiasa menerjemahkan kebutuhan teknis yang kompleks menjadi solusi digital yang aman, berkinerja tinggi, dan mudah dikelola.
            </p>
        </div>
        <div class="lg:col-span-5 flex justify-center" data-aos="fade-left">
            <div class="relative w-full max-w-[400px]">
                <div class="absolute inset-0 bg-gradient-to-tr from-[#1677FF] to-[#7048FF] rounded-3xl transform rotate-3 opacity-10"></div>
                <img src="{{ asset('images/about.png') }}" alt="Suprapto" class="relative z-10 w-full object-contain mix-blend-multiply drop-shadow-xl" onerror="this.style.display='none'">
            </div>
        </div>
    </div>
</section>

<!-- EDUCATION & EXPERIENCE -->
<section class="bg-[#FAFCFF] py-20 relative">
    <div class="max-w-[1180px] mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            
            <!-- Education Timeline -->
            <div data-aos="fade-up">
                <h2 class="text-[24px] font-bold text-[#0B1B3A] mb-8 flex items-center gap-3">
                    <svg class="w-6 h-6 text-[#1677FF]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M12 14l9-5-9-5-9 5 9 5z"/><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0v6"/></svg>
                    Latar Belakang Akademis
                </h2>
                <div class="relative pl-6 border-l-2 border-[#DCE7F5]">
                    <div class="mb-10 relative">
                        <div class="absolute -left-[31px] top-1.5 w-4 h-4 rounded-full bg-[#1677FF] ring-4 ring-[#EAF6FF]"></div>
                        <span class="text-[13px] font-semibold text-[#1677FF] bg-[#EAF6FF] px-3 py-1 rounded-full">Lulusan 2024</span>
                        <h3 class="text-[18px] font-bold text-[#0B1B3A] mt-3">S1 Teknologi Informasi</h3>
                        <p class="text-[15px] text-[#0B1B3A] font-medium mb-2">ITSNU Pekalongan</p>
                        <p class="text-[14px] text-[#64748B] leading-relaxed">
                            Lulus dengan predikat sangat memuaskan (IPK: 3.76). Menyelesaikan proyek skripsi pengembangan sistem digitalisasi administrasi kesehatan (SIM Posyandu). Memiliki fondasi yang kuat dalam rekayasa perangkat lunak, perancangan basis data relasional, dan keamanan web.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Soft Skills & Approach -->
            <div data-aos="fade-up" data-aos-delay="100">
                <h2 class="text-[24px] font-bold text-[#0B1B3A] mb-8 flex items-center gap-3">
                    <svg class="w-6 h-6 text-[#1677FF]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    Filosofi Pengembangan
                </h2>
                <div class="flex flex-col gap-5">
                    <div class="bg-white p-6 rounded-2xl border border-[#DCE7F5] shadow-sm hover:shadow-md transition-shadow">
                        <h4 class="text-[16px] font-bold text-[#0B1B3A] mb-2">Kode yang Bersih & Skalabel</h4>
                        <p class="text-[14px] text-[#64748B] leading-relaxed">Saya memprioritaskan penulisan arsitektur kode yang bersih dan terstruktur, memastikan sistem yang dibangun dapat diskalakan dan beradaptasi dengan kebutuhan bisnis tanpa penumpukan *technical debt*.</p>
                    </div>
                    <div class="bg-white p-6 rounded-2xl border border-[#DCE7F5] shadow-sm hover:shadow-md transition-shadow">
                        <h4 class="text-[16px] font-bold text-[#0B1B3A] mb-2">Prioritas pada Keamanan</h4>
                        <p class="text-[14px] text-[#64748B] leading-relaxed">Keamanan adalah fondasi utama. Saya selalu mengimplementasikan perlindungan data yang ketat, termasuk Role-Based Access Control (RBAC), sanitasi kueri basis data, dan perlindungan *endpoint* API.</p>
                    </div>
                    <div class="bg-white p-6 rounded-2xl border border-[#DCE7F5] shadow-sm hover:shadow-md transition-shadow">
                        <h4 class="text-[16px] font-bold text-[#0B1B3A] mb-2">Peningkatan Kompetensi Terus Menerus</h4>
                        <p class="text-[14px] text-[#64748B] leading-relaxed">Lanskap teknologi terus berkembang pesat. Saya secara konsisten memperbarui kemampuan teknis, serta aktif mengeksplorasi praktik DevOps modern dan integrasi kecerdasan buatan.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection