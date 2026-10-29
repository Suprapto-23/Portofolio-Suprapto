@extends('layouts.app')

@section('content')
<!-- PROJECTS HERO -->
<section class="bg-[#0B1B3A] pt-24 pb-20 lg:pt-32 lg:pb-28 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4wNSkiLz48L3N2Zz4=')] opacity-30"></div>
    <div class="max-w-[1180px] mx-auto px-6 text-center relative z-10">
        <h1 class="text-[36px] md:text-[48px] font-extrabold text-white leading-tight mb-4">
            Featured Projects
        </h1>
        <p class="text-[16px] text-gray-300 max-w-[600px] mx-auto">
            A deep dive into some of the comprehensive web applications and systems I have architected and developed.
        </p>
    </div>
</section>

<!-- PROJECTS LIST -->
<section class="py-24 bg-[#FAFCFF]">
    <div class="max-w-[1180px] mx-auto px-6 flex flex-col gap-24">
        
        <!-- Project 1 -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center" data-aos="fade-up">
            <div class="order-2 lg:order-1">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#EAF6FF] text-[#1677FF] text-[12px] font-bold mb-4">
                    <span class="w-2 h-2 rounded-full bg-[#1677FF]"></span> Healthcare System
                </div>
                <h2 class="text-[28px] md:text-[32px] font-bold text-[#0B1B3A] mb-4">Sistem Informasi Manajemen Posyandu</h2>
                <p class="text-[15px] text-[#64748B] leading-[1.8] mb-6">
                    A comprehensive web-based platform built to digitize health administration for Posyandu services in Desa Bantarkulon. The system efficiently manages data for toddlers, teenagers, and the elderly. 
                </p>
                <ul class="flex flex-col gap-3 mb-8 text-[14.5px] text-[#0B1B3A]">
                    <li class="flex items-start gap-3"><svg class="w-5 h-5 text-[#1677FF] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Role-Based Access Control (RBAC) security.</li>
                    <li class="flex items-start gap-3"><svg class="w-5 h-5 text-[#1677FF] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Achieved 84.28% feasibility score in User Acceptance Testing.</li>
                </ul>
                <div class="flex gap-3">
                    <span class="px-4 py-1.5 border border-[#DCE7F5] bg-white rounded-lg text-[13px] font-semibold text-[#0B1B3A]">Laravel</span>
                    <span class="px-4 py-1.5 border border-[#DCE7F5] bg-white rounded-lg text-[13px] font-semibold text-[#0B1B3A]">MySQL</span>
                </div>
            </div>
            <div class="order-1 lg:order-2 bg-white p-6 rounded-[24px] border border-[#DCE7F5] shadow-lg shadow-[#1677FF]/5">
                <div class="bg-[#F4F9FF] rounded-xl overflow-hidden aspect-video flex items-center justify-center">
                    <img src="{{ asset('images/project-posyandu.png') }}" alt="SIM Posyandu" class="w-full h-full object-contain mix-blend-multiply" onerror="this.style.display='none'">
                </div>
            </div>
        </div>

        <!-- Project 2 (Reversed) -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center" data-aos="fade-up">
            <div class="bg-white p-6 rounded-[24px] border border-[#DCE7F5] shadow-lg shadow-[#1677FF]/5">
                <div class="bg-[#F4F9FF] rounded-xl overflow-hidden aspect-video flex items-center justify-center">
                    <img src="{{ asset('images/project-sapi.png') }}" alt="Sistem Pakar Sapi" class="w-full h-full object-contain mix-blend-multiply" onerror="this.style.display='none'">
                </div>
            </div>
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#EAF6FF] text-[#1677FF] text-[12px] font-bold mb-4">
                    <span class="w-2 h-2 rounded-full bg-[#1677FF]"></span> Expert System / Logic
                </div>
                <h2 class="text-[28px] md:text-[32px] font-bold text-[#0B1B3A] mb-4">Sistem Pakar Diagnosis Sapi</h2>
                <p class="text-[15px] text-[#64748B] leading-[1.8] mb-6">
                    Developed as a semester project for Big Data, this intelligent web application helps diagnose cattle diseases automatically based on inputted symptoms.
                </p>
                <ul class="flex flex-col gap-3 mb-8 text-[14.5px] text-[#0B1B3A]">
                    <li class="flex items-start gap-3"><svg class="w-5 h-5 text-[#1677FF] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Algorithm: Certainty Factor & Forward Chaining.</li>
                    <li class="flex items-start gap-3"><svg class="w-5 h-5 text-[#1677FF] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Automated medical action recommendations.</li>
                </ul>
                <div class="flex gap-3">
                    <span class="px-4 py-1.5 border border-[#DCE7F5] bg-white rounded-lg text-[13px] font-semibold text-[#0B1B3A]">Laravel</span>
                    <span class="px-4 py-1.5 border border-[#DCE7F5] bg-white rounded-lg text-[13px] font-semibold text-[#0B1B3A]">Algorithms</span>
                </div>
            </div>
        </div>

        <!-- Project 3 -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center" data-aos="fade-up">
            <div class="order-2 lg:order-1">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#EAF6FF] text-[#1677FF] text-[12px] font-bold mb-4">
                    <span class="w-2 h-2 rounded-full bg-[#1677FF]"></span> E-Commerce & API
                </div>
                <h2 class="text-[28px] md:text-[32px] font-bold text-[#0B1B3A] mb-4">Sistem Pemesanan Tiket Online</h2>
                <p class="text-[15px] text-[#64748B] leading-[1.8] mb-6">
                    An end-to-end ticket reservation platform built for Lolong Adventure tourism. It streamlines the booking process and manages live transactions.
                </p>
                <ul class="flex flex-col gap-3 mb-8 text-[14.5px] text-[#0B1B3A]">
                    <li class="flex items-start gap-3"><svg class="w-5 h-5 text-[#1677FF] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Robust REST API integration for transactions.</li>
                    <li class="flex items-start gap-3"><svg class="w-5 h-5 text-[#1677FF] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Optimized relational database for fast query loads.</li>
                </ul>
                <div class="flex gap-3">
                    <span class="px-4 py-1.5 border border-[#DCE7F5] bg-white rounded-lg text-[13px] font-semibold text-[#0B1B3A]">Laravel</span>
                    <span class="px-4 py-1.5 border border-[#DCE7F5] bg-white rounded-lg text-[13px] font-semibold text-[#0B1B3A]">REST API</span>
                </div>
            </div>
            <div class="order-1 lg:order-2 bg-white p-6 rounded-[24px] border border-[#DCE7F5] shadow-lg shadow-[#1677FF]/5">
                <div class="bg-[#F4F9FF] rounded-xl overflow-hidden aspect-video flex items-center justify-center">
                    <img src="{{ asset('images/project-ticket.png') }}" alt="Tiket Online" class="w-full h-full object-contain mix-blend-multiply" onerror="this.style.display='none'">
                </div>
            </div>
        </div>

    </div>
</section>
@endsection