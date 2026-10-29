@extends('layouts.app')

@section('content')
<!-- DOKUMENTASI HERO SECTION -->
<section class="bg-[#0B1B3A] pt-24 pb-20 lg:pt-32 lg:pb-28 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4wNSkiLz48L3N2Zz4=')] opacity-30"></div>
    <div class="max-w-[1180px] mx-auto px-6 text-center relative z-10" data-aos="fade-up">
        <span class="inline-block mb-3 text-[12px] font-bold uppercase tracking-[0.2em] text-[#25AEFF]">Galeri & Arsip</span>
        <h1 class="text-[36px] md:text-[48px] font-extrabold text-white leading-tight mb-4">
            Dokumentasi Proyek & Aktivitas
        </h1>
        <p class="text-[16px] text-gray-300 max-w-[650px] mx-auto leading-relaxed">
            Kumpulan dokumentasi visual, galeri foto implementasi sistem, serta catatan proses pengembangan perangkat lunak yang saya kerjakan.
        </p>
    </div>
</section>

<!-- DOKUMENTASI GRID SECTION -->
<section class="py-24 bg-[#FAFCFF]">
    <div class="max-w-[1180px] mx-auto px-6">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($docs ?? [] as $doc)
                <article class="group flex flex-col overflow-hidden rounded-[24px] bg-white border border-[#DCE7F5] shadow-sm transition-all duration-300 hover:-translate-y-2 hover:border-[#1677FF]/40 hover:shadow-[0_20px_40px_-15px_rgba(22,119,255,0.15)]" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                    
                    <!-- Area Gambar / Lampiran -->
                    <div class="relative overflow-hidden bg-[#F4F9FF] pt-[65%] border-b border-[#DCE7F5]/50">
                        @if(isset($doc->file_attachment) && $doc->file_attachment)
                            <img src="{{ asset('storage/' . $doc->file_attachment) }}" 
                                 alt="{{ $doc->title }}" 
                                 class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105">
                        @else
                            <!-- Placeholder jika belum ada gambar -->
                            <div class="absolute inset-0 flex flex-col items-center justify-center text-[#1677FF] bg-gradient-to-br from-[#F4F9FF] to-[#EAF6FF]">
                                <svg class="w-12 h-12 mb-2 opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span class="text-[13px] font-semibold tracking-wide text-[#64748B]">Dokumentasi Sistem</span>
                            </div>
                        @endif

                        @if($doc->category)
                            <div class="absolute top-4 left-4">
                                <span class="rounded-full bg-white/90 backdrop-blur-md px-3.5 py-1 text-[11px] font-bold uppercase tracking-wider text-[#1677FF] shadow-sm border border-white/20">
                                    {{ $doc->category }}
                                </span>
                            </div>
                        @endif
                    </div>

                    <!-- Area Konten Teks -->
                    <div class="flex flex-1 flex-col p-8">
                        <h3 class="mb-3 text-[19px] font-bold leading-snug text-[#0B1B3A] group-hover:text-[#1677FF] transition-colors">
                            {{ $doc->title }}
                        </h3>
                        
                        <div class="text-[14px] leading-relaxed text-[#64748B] line-clamp-3 mb-6">
                            {!! strip_tags($doc->content) !!}
                        </div>

                        <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between text-[13px] text-[#64748B]">
                            <span>Diperbarui: {{ $doc->updated_at->format('d M Y') }}</span>
                            <span class="font-semibold text-[#1677FF] flex items-center gap-1">
                                Lihat Detail 
                                <svg class="w-3.5 h-3.5 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </span>
                        </div>
                    </div>

                </article>
            @empty
                <!-- State Kosong jika belum ada data di database -->
                <div class="col-span-full text-center py-20 rounded-[28px] border-2 border-dashed border-[#DCE7F5] bg-white shadow-sm" data-aos="fade-up">
                    <div class="w-16 h-16 bg-[#EAF6FF] text-[#1677FF] rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-inner">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                    </div>
                    <h3 class="text-[18px] font-bold text-[#0B1B3A] mb-2">Belum Ada Dokumentasi</h3>
                    <p class="text-[14.5px] text-[#64748B] max-w-md mx-auto mb-6">
                        Data galeri dan dokumentasi belum ditambahkan melalui panel admin Filament. Silakan input data melalui dasbor admin Anda.
                    </p>
                    <a href="{{ route('filament.admin.resources.documentations.index') }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-[#1677FF] px-6 py-3 text-[14px] font-semibold text-white shadow-md hover:bg-[#0A6CFF] transition-all">
                        Kelola di Admin Panel
                    </a>
                </div>
            @endforelse
        </div>

    </div>
</section>
@endsection