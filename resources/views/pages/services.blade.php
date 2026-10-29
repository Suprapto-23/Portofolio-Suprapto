@extends('layouts.app')

@section('content')
<!-- SERVICES HERO -->
<section class="bg-gradient-to-b from-[#FAFCFF] to-white pt-24 pb-16 lg:pt-32 lg:pb-24 border-b border-gray-100">
    <div class="max-w-[1180px] mx-auto px-6 text-center">
        <span class="inline-block mb-3 text-[12px] font-bold uppercase tracking-[0.2em] text-[#1677FF]">Areas of Expertise</span>
        <h1 class="text-[36px] md:text-[48px] font-extrabold text-[#0B1B3A] leading-tight mb-6">
            Services & Solutions
        </h1>
        <p class="text-[16px] leading-[1.8] text-[#64748B] max-w-[700px] mx-auto">
            I offer a comprehensive suite of backend and web development services designed to build secure, scalable, and high-performance digital products for modern businesses.
        </p>
    </div>
</section>

<!-- DETAILED SERVICES -->
<section class="py-20 bg-white">
    <div class="max-w-[1180px] mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
    @forelse($services as $service)
        <div class="group bg-[#FAFCFF] border border-[#DCE7F5] p-10 rounded-[24px] hover:border-[#1677FF]/40 hover:shadow-[0_20px_40px_-15px_rgba(22,119,255,0.15)] transition-all duration-300" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
            <div class="mb-6">
                <x-service-icon :icon="$service->icon" :color="$service->color" size="lg" />
            </div>
            <h3 class="text-[22px] font-bold text-[#0B1B3A] mb-4">{{ $service->title }}</h3>
            <p class="text-[15px] text-[#64748B] leading-[1.7] mb-6">{{ $service->description ?? $service->short_description }}</p>
            @if(!empty($service->features))
                <div class="flex flex-wrap gap-2">
                    @foreach($service->features as $feature)
                        <span class="px-3 py-1 bg-white border border-[#DCE7F5] rounded text-[12px] font-semibold text-[#0B1B3A]">{{ $feature }}</span>
                    @endforeach
                </div>
            @endif
        </div>
    @empty
        <div class="md:col-span-2 text-center py-16 rounded-2xl border-2 border-dashed border-[#DCE7F5]">
            <p class="text-[#64748B] text-[15px]">Belum ada layanan yang ditambahkan.</p>
        </div>
    @endforelse
</div>
    </div>
</section>
@endsection