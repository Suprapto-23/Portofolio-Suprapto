@extends('layouts.app')

@section('content')
@php
    $services     = $services ?? collect();
    $projects     = $projects ?? collect();
    $certificates = $certificates ?? collect();

    $hasHeroImg    = file_exists(public_path('images/developer.png'));
    $hasProcessImg = file_exists(public_path('images/proces.png'));
    $hasAboutImg   = file_exists(public_path('images/about.png'));
    $hasCv         = file_exists(public_path('cv/CV-SUPRAPTO.pdf'));

    // Ikon teknologi (Devicon via CDN) dan ikon Office / garis (SVG inline)
    $dev = fn ($slug, $v = 'original') => "https://cdn.jsdelivr.net/gh/devicons/devicon@v2.16.0/icons/{$slug}/{$slug}-{$v}.svg";
    $office = fn ($bg, $letter) => '<svg class="h-5 w-5" viewBox="0 0 24 24" aria-hidden="true"><rect width="24" height="24" rx="5" fill="'.$bg.'"/><text x="12" y="17" text-anchor="middle" font-family="Arial,sans-serif" font-size="14" font-weight="700" fill="#fff">'.$letter.'</text></svg>';
    $line = fn ($path) => '<svg class="h-5 w-5 text-[#1677FF]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'.$path.'</svg>';

    $skillGroups = [
        'Backend' => [
            ['name' => 'PHP',     'img' => $dev('php')],
            ['name' => 'Laravel', 'img' => $dev('laravel')],
            ['name' => 'MySQL',   'img' => $dev('mysql')],
            ['name' => 'REST API','svg' => $line('<path d="M8 9l-4 3 4 3M16 9l4 3-4 3M13.5 6l-3 12"/>')],
        ],
        'Frontend' => [
            ['name' => 'HTML5',        'img' => $dev('html5')],
            ['name' => 'CSS3',         'img' => $dev('css3')],
            ['name' => 'JavaScript',   'img' => $dev('javascript')],
            ['name' => 'Tailwind CSS', 'img' => $dev('tailwindcss')],
            ['name' => 'Alpine.js',    'img' => $dev('alpinejs')],
        ],
        'Tools & Deployment' => [
            ['name' => 'Git',     'img' => $dev('git')],
            ['name' => 'GitHub',  'img' => $dev('github')],
            ['name' => 'Vercel',  'img' => $dev('vercel')],
            ['name' => 'XAMPP',   'img' => $dev('xampp')],
            ['name' => 'VS Code', 'img' => $dev('vscode')],
        ],
        'Aplikasi Perkantoran & Desain' => [
            ['name' => 'Microsoft Word',       'svg' => $office('#185ABD', 'W')],
            ['name' => 'Microsoft Excel',      'svg' => $office('#107C41', 'X')],
            ['name' => 'Microsoft PowerPoint', 'svg' => $office('#C43E1C', 'P')],
            ['name' => 'Desain Grafis',        'svg' => $line('<path d="M12 19l7-7 3 3-7 7-3-3z"/><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"/><path d="M2 2l7.6 7.6"/><circle cx="11" cy="11" r="2"/>')],
        ],
    ];

    $stats = [
        ['3,76', 'IPK S1 Teknologi Informasi'],
        ['A',    'Nilai Program PKM DIKTI 2025'],
        ['2',    'Pengalaman Proyek Nyata'],
        ['1',    'Publikasi Jurnal Ilmiah (SOLMA 2026)'],
    ];

    $experiences = [
        [
            'role'   => 'Full Stack Developer',
            'org'    => 'Lolong Adventure · Program PKM ITSNU Pekalongan',
            'period' => 'Mar 2025 – Agu 2025',
            'points' => [
                'Membangun sistem pemesanan tiket wisata full stack (Laravel dan MySQL) dalam tim 2 orang, pada program PKM Pengabdian Masyarakat ITSNU Pekalongan (hibah DPPM Kemdiktisaintek 2025).',
                'Merancang skema database dan REST API internal untuk proses pemesanan.',
                'Sistem digunakan untuk transaksi nyata; mendampingi mitra hingga dapat mengelolanya secara mandiri.',
                'Program memperoleh nilai A dan dipublikasikan di Jurnal SOLMA 2026.',
            ],
            'tags'   => ['Laravel', 'MySQL', 'REST API'],
            'links'  => [['Lihat Sistem', 'https://tiketlolongadventure.com'], ['Lihat Publikasi', 'https://doi.org/10.22236/solma.v15i1.20925']],
        ],
        [
            'role'   => 'Pengembang Backend (Magang)',
            'org'    => 'Creatifla Multimedia',
            'period' => 'Jan 2025 – Feb 2025',
            'points' => [
                'Merancang database MySQL dan membangun backend PHP Native untuk Sistem Manajemen Pelanggan, mencakup fitur CRUD, laporan proyek, dan dashboard statistik.',
                'Mengintegrasikan WhatsApp Blast API untuk otomasi promosi.',
            ],
            'tags'   => ['PHP Native', 'MySQL', 'WhatsApp API'],
            'links'  => [],
        ],
    ];

    $steps = [
        ['Analisis Kebutuhan', 'Mengidentifikasi kebutuhan pengguna dan merumuskan ruang lingkup sistem.', 'from-[#0A6CFF] to-[#063B91]'],
        ['Perancangan Database & API', 'Merancang skema database relasional dan alur REST API yang konsisten.', 'from-[#25AEFF] to-[#0A6CFF]'],
        ['Pengembangan', 'Membangun fitur dengan Laravel dan MySQL secara terstruktur dan terdokumentasi.', 'from-[#3D66F5] to-[#0A6CFF]'],
        ['Pengujian & Implementasi', 'Menguji fitur, memperbaiki temuan, dan mendampingi pengguna hingga sistem dapat digunakan.', 'from-[#5F4FEE] to-[#2E24A3]'],
    ];
@endphp

<style>
    html { scroll-behavior: smooth; }
    section[id] { scroll-margin-top: 90px; }
    .pra-grad-text { background: linear-gradient(90deg, #0A6CFF 0%, #25AEFF 100%); -webkit-background-clip: text; background-clip: text; color: transparent; }
    .pra-blob { position: absolute; border-radius: 50%; filter: blur(80px); pointer-events: none; }
    @keyframes praFloat { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }
    .animate-float { animation: praFloat 6s ease-in-out infinite; }
    @keyframes praDot { 0%, 100% { box-shadow: 0 0 0 0 rgba(22,119,255,.45); } 50% { box-shadow: 0 0 0 7px rgba(22,119,255,0); } }
    .status-dot { animation: praDot 2s infinite; }
    @media (prefers-reduced-motion: reduce) {
        html { scroll-behavior: auto; }
        .animate-float, .status-dot { animation: none; }
    }
</style>

{{-- ======================= HERO ======================= --}}
<section id="home" class="relative overflow-hidden bg-white pt-16 pb-20 lg:pt-28 lg:pb-28">
    <div class="pra-blob bg-[#1677FF]/10 right-[-10%] top-[-10%] h-[480px] w-[480px]"></div>
    <div class="pra-blob bg-[#7048FF]/10 left-[-10%] bottom-[-10%] h-[380px] w-[380px]"></div>

    <div class="relative z-10 mx-auto max-w-[1180px] px-6">
        <div class="grid grid-cols-1 items-center gap-14 lg:grid-cols-12 lg:gap-10">

            <div class="text-center lg:col-span-7 lg:text-left" data-aos="fade-right">
                <div class="mb-6 inline-flex items-center gap-2.5 rounded-full border border-[#DCE7F5] bg-[#F4F9FF] px-4 py-2">
                    <span class="status-dot h-2 w-2 rounded-full bg-[#1677FF]"></span>
                    <span class="text-[12px] font-bold uppercase tracking-widest text-[#1677FF]">Tersedia untuk Magang &amp; Posisi Penuh Waktu</span>
                </div>

                <h1 class="mb-6 text-[38px] font-extrabold leading-[1.15] tracking-tight text-[#0B1B3A] md:text-[48px] lg:text-[54px]">
                    Mengembangkan <span class="pra-grad-text">Sistem Web</span> Berbasis Laravel dan MySQL
                </h1>

                <p class="mx-auto mb-9 max-w-[580px] text-[16px] leading-[1.8] text-[#64748B] lg:mx-0">
                    <strong class="font-semibold text-[#0B1B3A]">Suprapto</strong>, fresh graduate S1 Teknologi Informasi ITSNU Pekalongan (IPK 3,76).
                    Berpengalaman merancang database, membangun REST API, dan mengembangkan sistem pemesanan tiket wisata
                    yang telah digunakan untuk transaksi nyata oleh mitra.
                </p>

                <div class="flex flex-col items-center gap-4 sm:flex-row lg:justify-start">
                    <a href="#projects" class="inline-flex h-[52px] w-full items-center justify-center gap-2 rounded-full bg-gradient-to-r from-[#0A72FF] to-[#5F4FEE] px-8 text-[15px] font-semibold text-white shadow-[0_8px_20px_-6px_rgba(40,90,245,0.5)] transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_24px_-6px_rgba(40,90,245,0.7)] sm:w-auto">
                        Lihat Proyek
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m13 6 6 6-6 6"/></svg>
                    </a>
                    @if($hasCv)
                        <a href="{{ asset('cv/CV-SUPRAPTO.pdf') }}" target="_blank" rel="noopener" class="inline-flex h-[52px] w-full items-center justify-center gap-2 rounded-full border-[1.5px] border-[#D1E3FF] bg-white px-8 text-[15px] font-semibold text-[#1677FF] transition-all duration-300 hover:-translate-y-1 hover:border-[#1677FF] hover:bg-[#F4F9FF] sm:w-auto">
                            Unduh CV
                        </a>
                    @endif
                    <a href="{{ route('contact') }}" class="inline-flex h-[52px] w-full items-center justify-center rounded-full px-6 text-[15px] font-semibold text-[#0B1B3A] transition-colors hover:text-[#1677FF] sm:w-auto">
                        Hubungi Saya
                    </a>
                </div>
            </div>

            <div class="relative lg:col-span-5" data-aos="fade-left" data-aos-delay="100">
                <div class="absolute inset-0 animate-float rounded-[32px] bg-gradient-to-tr from-[#1677FF] to-[#7048FF] opacity-15 blur-3xl"></div>
                <div class="relative mx-auto max-w-[420px] rounded-[28px] border border-white/70 bg-white/80 p-7 shadow-[0_20px_50px_-20px_rgba(22,119,255,0.35)] backdrop-blur-xl">
                    @if($hasHeroImg)
                        <img src="{{ asset('images/developer.png') }}" alt="Ilustrasi developer" class="mx-auto mb-5 h-[190px] w-full object-contain mix-blend-multiply">
                    @endif
                    <div class="mb-5 flex items-center gap-4">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-[#0A6CFF] to-[#5F4FEE] text-[22px] font-extrabold text-white">S</div>
                        <div>
                            <p class="text-[18px] font-bold text-[#0B1B3A]">Suprapto</p>
                            <p class="text-[13.5px] font-medium text-[#64748B]">Full Stack Developer</p>
                        </div>
                    </div>
                    <dl class="space-y-3 border-t border-[#DCE7F5] pt-5 text-[14px]">
                        <div class="flex justify-between gap-4"><dt class="text-[#64748B]">Pendidikan</dt><dd class="text-right font-semibold text-[#0B1B3A]">S1 Teknologi Informasi</dd></div>
                        <div class="flex justify-between gap-4"><dt class="text-[#64748B]">Kampus</dt><dd class="text-right font-semibold text-[#0B1B3A]">ITSNU Pekalongan</dd></div>
                        <div class="flex justify-between gap-4"><dt class="text-[#64748B]">IPK</dt><dd class="font-semibold text-[#0B1B3A]">3,76</dd></div>
                        <div class="flex justify-between gap-4"><dt class="text-[#64748B]">Domisili</dt><dd class="text-right font-semibold text-[#0B1B3A]">Kab. Pekalongan, Jawa Tengah</dd></div>
                        <div class="flex justify-between gap-4"><dt class="text-[#64748B]">Stack Utama</dt><dd class="text-right font-semibold text-[#0B1B3A]">Laravel · PHP · MySQL</dd></div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ======================= CAPAIAN RINGKAS ======================= --}}
<section class="border-y border-[#DCE7F5]/70 bg-[#FAFCFF] py-10">
    <div class="mx-auto grid max-w-[1180px] grid-cols-2 gap-8 px-6 text-center md:grid-cols-4" data-aos="fade-up">
        @foreach($stats as [$value, $label])
            <div>
                <p class="text-[30px] font-extrabold text-[#0B1B3A]">{{ $value }}</p>
                <p class="mt-1 text-[13px] font-medium text-[#64748B]">{{ $label }}</p>
            </div>
        @endforeach
    </div>
</section>

{{-- ======================= BIDANG KEAHLIAN (dinamis, hilang jika kosong) ======================= --}}
@if($services->isNotEmpty())
<section class="bg-white py-24">
    <div class="mx-auto max-w-[1180px] px-6">
        <div class="mb-14 text-center" data-aos="fade-up">
            <span class="mb-2 block text-[12px] font-bold uppercase tracking-widest text-[#1677FF]">Bidang Keahlian</span>
            <h2 class="text-[32px] font-bold text-[#0B1B3A] md:text-[40px]">Lingkup Pekerjaan Saya</h2>
        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
            @foreach($services->take(4) as $service)
                <div class="group rounded-[24px] border border-[#DCE7F5] bg-white p-7 shadow-[0_4px_20px_-10px_rgba(11,27,58,0.08)] transition-all duration-300 hover:-translate-y-2 hover:border-[#BBD6FF] hover:shadow-[0_15px_30px_-10px_rgba(22,119,255,0.15)]" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 80 }}">
                    <div class="mb-6 flex h-14 w-14 items-center justify-center rounded-2xl bg-[#EAF6FF] text-[#1677FF] transition-colors group-hover:bg-[#1677FF] group-hover:text-white">
                        @if(isset($service->icon))
                            <x-service-icon :icon="$service->icon" :color="$service->color" />
                        @else
                            <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                        @endif
                    </div>
                    <h3 class="mb-3 text-[17px] font-bold text-[#0B1B3A]">{{ $service->title }}</h3>
                    <p class="text-[14px] leading-relaxed text-[#64748B]">{{ $service->short_description }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ======================= TENTANG ======================= --}}
<section id="about" class="relative border-y border-[#DCE7F5]/60 bg-[#FAFCFF] py-24">
    <div class="mx-auto grid max-w-[1180px] grid-cols-1 items-center gap-16 px-6 {{ $hasAboutImg ? 'lg:grid-cols-2 lg:gap-20' : 'lg:max-w-[820px]' }}">
        <div data-aos="fade-right">
            <span class="mb-3 block text-[12px] font-bold uppercase tracking-widest text-[#1677FF]">Profil Singkat</span>
            <h2 class="mb-6 text-[32px] font-bold text-[#0B1B3A] md:text-[38px]">Tentang Saya</h2>

            <div class="mb-7 flex items-center gap-4 rounded-2xl border border-[#DCE7F5] bg-white p-5 shadow-sm">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#EAF6FF] text-[#1677FF]">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                </div>
                <div>
                    <h4 class="text-[16px] font-bold text-[#0B1B3A]">S1 Teknologi Informasi · IPK 3,76</h4>
                    <p class="text-[14px] text-[#64748B]">ITSNU Pekalongan · 2022 – 2026</p>
                </div>
            </div>

            <p class="mb-5 text-[15.5px] leading-[1.8] text-[#64748B]">
                Saya fresh graduate S1 Teknologi Informasi dengan pengalaman sebagai Full Stack Developer menggunakan PHP, Laravel, dan MySQL.
                Saya terbiasa mengerjakan sistem web secara menyeluruh: analisis kebutuhan, perancangan basis data, integrasi REST API, hingga pengujian.
            </p>
            <p class="mb-7 text-[15.5px] leading-[1.8] text-[#64748B]">
                Selama kuliah, saya juga mengembangkan proyek mandiri seperti SIM PosyanduCare (Laravel) dan sistem pakar diagnosis penyakit sapi.
                Saya bekerja dengan Git dan GitHub, cepat mempelajari teknologi baru, dan ingin berkembang sebagai software engineer di lingkungan kerja yang kolaboratif.
            </p>

            <ul class="space-y-3 text-[14.5px] text-[#0B1B3A]">
                @foreach([
                    'Sistem pemesanan tiket wisata yang saya bangun digunakan untuk transaksi nyata',
                    'Program PKM DIKTI 2025 meraih nilai A dan terbit di Jurnal SOLMA 15(1), 2026',
                    'Tercatat dalam publikasi: digitalisasi 100% data wisatawan dan efisiensi pengelolaan naik 60%',
                ] as $point)
                    <li class="flex items-start gap-3">
                        <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#1677FF]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m5 12 5 5L20 7"/></svg>
                        {{ $point }}
                    </li>
                @endforeach
            </ul>
        </div>

        @if($hasAboutImg)
            <div class="flex justify-center lg:justify-end" data-aos="fade-left">
                <img src="{{ asset('images/about.png') }}" alt="Profil Suprapto" loading="lazy" class="w-full max-w-[450px] object-contain mix-blend-multiply drop-shadow-xl lg:max-w-[500px]">
            </div>
        @endif
    </div>
</section>

{{-- ======================= PENGALAMAN ======================= --}}
<section id="experience" class="bg-white py-24">
    <div class="mx-auto max-w-[1180px] px-6">
        <div class="mb-14 text-center" data-aos="fade-up">
            <span class="mb-2 block text-[12px] font-bold uppercase tracking-widest text-[#1677FF]">Rekam Jejak</span>
            <h2 class="text-[32px] font-bold text-[#0B1B3A] md:text-[40px]">Pengalaman Kerja &amp; Proyek</h2>
        </div>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
            @foreach($experiences as $exp)
                <article class="flex flex-col rounded-[24px] border border-[#DCE7F5] bg-white p-8 shadow-sm transition-all duration-300 hover:border-[#1677FF]/40 hover:shadow-[0_20px_40px_-15px_rgba(22,119,255,0.15)]" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 80 }}">
                    <span class="mb-4 self-start rounded-md bg-[#EAF6FF] px-3 py-1 text-[12px] font-bold text-[#1677FF]">{{ $exp['period'] }}</span>
                    <h3 class="text-[20px] font-bold leading-tight text-[#0B1B3A]">{{ $exp['role'] }}</h3>
                    <p class="mb-5 mt-1 text-[14.5px] font-medium text-[#64748B]">{{ $exp['org'] }}</p>

                    <ul class="mb-6 space-y-3 text-[14.5px] leading-relaxed text-[#475569]">
                        @foreach($exp['points'] as $point)
                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#1677FF]"></span>
                                <span>{{ $point }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <div class="mt-auto flex flex-wrap items-center gap-2 border-t border-gray-100 pt-5">
                        @foreach($exp['tags'] as $tag)
                            <span class="rounded-full border border-[#DCE7F5] bg-[#F4F9FF] px-3 py-1 text-[12px] font-semibold text-[#0B1B3A]">{{ $tag }}</span>
                        @endforeach
                        @foreach($exp['links'] as [$label, $url])
                            <a href="{{ $url }}" target="_blank" rel="noopener noreferrer" class="ml-auto inline-flex items-center gap-1.5 text-[13px] font-bold text-[#1677FF] hover:text-[#0A6CFF] first:ml-0">
                                {{ $label }}
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M7 17 17 7M8 7h9v9"/></svg>
                            </a>
                        @endforeach
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- ======================= PROYEK ======================= --}}
<section id="projects" class="border-t border-[#DCE7F5]/60 bg-[#FAFCFF] py-24">
    <div class="mx-auto max-w-[1180px] px-6">
        <div class="mb-14 flex flex-col items-center justify-between gap-5 md:flex-row" data-aos="fade-up">
            <div class="text-center md:text-left">
                <span class="mb-2 block text-[12px] font-bold uppercase tracking-widest text-[#1677FF]">Portofolio</span>
                <h2 class="text-[32px] font-bold text-[#0B1B3A] md:text-[40px]">Proyek Pilihan</h2>
            </div>
            <a href="{{ route('projects') }}" class="inline-flex items-center gap-2 text-[15px] font-semibold text-[#1677FF] transition-colors hover:text-[#0A6CFF]">
                Lihat Semua Proyek
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
            @forelse($projects->take(3) as $project)
                <article class="group flex flex-col overflow-hidden rounded-[24px] border border-[#DCE7F5] bg-white shadow-sm transition-all duration-300 hover:-translate-y-2 hover:border-[#1677FF]/40 hover:shadow-[0_20px_40px_-15px_rgba(22,119,255,0.15)]" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 80 }}">
                    <div class="relative overflow-hidden border-b border-[#DCE7F5]/50 bg-[#F4F9FF] pt-[60%]">
                        <img src="{{ $project->image ? asset('storage/' . $project->image) : asset('images/default-project.png') }}"
                             alt="{{ $project->title }}" loading="lazy"
                             class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105">
                    </div>
                    <div class="flex flex-1 flex-col p-7">
                        @if($project->category)
                            <span class="mb-4 self-start rounded-md bg-[#EAF6FF] px-3 py-1 text-[11px] font-bold uppercase tracking-wider text-[#1677FF]">{{ $project->category }}</span>
                        @endif
                        <h3 class="mb-3 line-clamp-2 text-[20px] font-bold leading-tight text-[#0B1B3A]">{{ $project->title }}</h3>
                        <p class="mb-6 line-clamp-3 text-[14.5px] leading-relaxed text-[#64748B]">
                            {{ $project->short_description ?? \Illuminate\Support\Str::limit(strip_tags($project->description ?? ''), 140) }}
                        </p>
                        @if($project->slug)
                            <div class="mt-auto border-t border-gray-100 pt-4">
                                <a href="{{ route('projects.show', $project->slug) }}" class="inline-flex items-center gap-2 text-[14px] font-bold text-[#0B1B3A] transition-colors group-hover:text-[#1677FF]">
                                    Detail Proyek
                                    <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </a>
                            </div>
                        @endif
                    </div>
                </article>
            @empty
                <div class="col-span-full rounded-[24px] border-2 border-dashed border-[#DCE7F5] bg-white py-16 text-center">
                    <p class="text-[15px] font-medium text-[#64748B]">Proyek sedang disiapkan. Silakan kembali lagi nanti.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- ======================= KEAHLIAN & TOOLS ======================= --}}
<section id="skills" class="bg-white py-24">
    <div class="mx-auto max-w-[1180px] px-6">
        <div class="mb-14 text-center" data-aos="fade-up">
            <span class="mb-2 block text-[12px] font-bold uppercase tracking-widest text-[#1677FF]">Kompetensi</span>
            <h2 class="mb-4 text-[32px] font-bold text-[#0B1B3A] md:text-[38px]">Teknologi &amp; Perangkat Kerja</h2>
            <p class="mx-auto max-w-2xl text-[16px] leading-relaxed text-[#64748B]">Teknologi dan aplikasi yang saya gunakan dalam pengembangan proyek maupun pekerjaan administratif.</p>
        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            @foreach($skillGroups as $group => $items)
                <div class="rounded-[22px] border border-[#DCE7F5] bg-white p-7 shadow-sm transition-colors hover:border-[#1677FF]/40" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 60 }}">
                    <h3 class="mb-5 text-[13px] font-bold uppercase tracking-wide text-[#0B1B3A]">{{ $group }}</h3>
                    <div class="flex flex-wrap gap-2.5">
                        @foreach($items as $item)
                            <span class="inline-flex items-center gap-2.5 rounded-full border border-[#DCE7F5] bg-[#F4F9FF] py-2 pl-3 pr-4 text-[13.5px] font-semibold text-[#0B1B3A]">
                                @if(isset($item['img']))
                                    <img src="{{ $item['img'] }}" alt="" loading="lazy" class="h-5 w-5 object-contain" onerror="this.style.display='none'">
                                @else
                                    {!! $item['svg'] !!}
                                @endif
                                {{ $item['name'] }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ======================= SERTIFIKAT (dari admin; hilang jika kosong) ======================= --}}
@if($certificates->isNotEmpty())
<section id="certificates" class="border-t border-[#DCE7F5]/60 bg-[#FAFCFF] py-24">
    <div class="mx-auto max-w-[1180px] px-6">
        <div class="mb-14 flex flex-col items-center justify-between gap-5 md:flex-row" data-aos="fade-up">
            <div class="text-center md:text-left">
                <span class="mb-2 block text-[12px] font-bold uppercase tracking-widest text-[#1677FF]">Validasi Kompetensi</span>
                <h2 class="text-[32px] font-bold text-[#0B1B3A] md:text-[38px]">Sertifikat, Publikasi &amp; Pelatihan</h2>
            </div>
            @if(Route::has('certificates'))
                <a href="{{ route('certificates') }}" class="inline-flex items-center gap-2 text-[15px] font-semibold text-[#1677FF] transition-colors hover:text-[#0A6CFF]">
                    Lihat Semua
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            @endif
        </div>

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($certificates->take(6) as $cert)
                <article class="group flex flex-col overflow-hidden rounded-[20px] border border-[#DCE7F5] bg-white shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:border-[#1677FF]/40 hover:shadow-[0_15px_30px_-12px_rgba(22,119,255,0.18)]" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 60 }}">
                    <div class="relative flex aspect-[4/3] items-center justify-center overflow-hidden border-b border-[#DCE7F5]/60 bg-[#F4F9FF]">
                        @if($cert->image)
                            <img src="{{ asset('storage/' . $cert->image) }}" alt="Sertifikat {{ $cert->title }}" loading="lazy" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105">
                        @else
                            <svg class="h-12 w-12 text-[#1677FF]/60" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.8 4.7a3 3 0 0 0 2.2-1l.5-.6a3 3 0 0 1 4.9 0l.5.6a3 3 0 0 0 2.2 1l.8 0a3 3 0 0 1 2.5 4.3l-.4.7a3 3 0 0 0 0 2.6l.4.7a3 3 0 0 1-2.5 4.3l-.8 0a3 3 0 0 0-2.2 1l-.5.6a3 3 0 0 1-4.9 0l-.5-.6a3 3 0 0 0-2.2-1l-.8 0a3 3 0 0 1-2.5-4.3l.4-.7a3 3 0 0 0 0-2.6l-.4-.7A3 3 0 0 1 7 4.7z"/></svg>
                        @endif
                    </div>
                    <div class="flex flex-1 flex-col p-5">
                        <h4 class="mb-1.5 line-clamp-2 text-[15.5px] font-bold leading-snug text-[#0B1B3A]">{{ $cert->title }}</h4>
                        <p class="text-[13px] font-medium text-[#64748B]">{{ $cert->issuer }}@if($cert->year) · {{ $cert->year }}@endif</p>
                        @if($cert->credential_url)
                            <a href="{{ $cert->credential_url }}" target="_blank" rel="noopener noreferrer" class="mt-4 inline-flex items-center gap-1.5 text-[13px] font-bold text-[#1677FF] hover:text-[#0A6CFF]">
                                Lihat Kredensial
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M7 17 17 7M8 7h9v9"/></svg>
                            </a>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ======================= ALUR KERJA ======================= --}}
<section class="relative overflow-hidden border-t border-[#DCE7F5]/60 bg-white py-24">
    <div class="relative z-10 mx-auto grid max-w-[1180px] grid-cols-1 items-center gap-16 px-6 {{ $hasProcessImg ? 'lg:grid-cols-2 lg:gap-20' : 'lg:max-w-[820px]' }}">
        @if($hasProcessImg)
            <div class="flex justify-center lg:justify-start" data-aos="fade-right">
                <img src="{{ asset('images/proces.png') }}" alt="Alur pengembangan perangkat lunak" loading="lazy" class="w-full max-w-[450px] object-contain mix-blend-multiply drop-shadow-xl lg:max-w-[500px]">
            </div>
        @endif

        <div data-aos="fade-left">
            <span class="mb-3 block text-[12px] font-bold uppercase tracking-widest text-[#1677FF]">Cara Kerja</span>
            <h2 class="mb-4 text-[32px] font-bold text-[#0B1B3A] md:text-[38px]">Alur Pengembangan Sistem</h2>
            <p class="mb-10 text-[16px] leading-relaxed text-[#64748B]">Tahapan yang saya terapkan pada proyek sistem web, dari kebutuhan awal hingga sistem digunakan.</p>

            <div class="relative flex flex-col gap-8">
                <div class="absolute bottom-8 left-[24px] top-8 hidden w-[2px] bg-gradient-to-b from-[#9CC3FF] to-[#E3ECF8] sm:block"></div>
                @foreach($steps as $i => [$title, $desc, $grad])
                    <div class="group flex items-start gap-6">
                        <div class="relative z-10 flex h-[50px] w-[50px] shrink-0 items-center justify-center rounded-full bg-gradient-to-br {{ $grad }} text-[16px] font-bold text-white shadow-lg transition-transform group-hover:scale-110">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</div>
                        <div class="pt-1.5">
                            <h4 class="mb-1.5 text-[17px] font-bold text-[#0B1B3A]">{{ $title }}</h4>
                            <p class="text-[14.5px] leading-relaxed text-[#64748B]">{{ $desc }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ======================= CTA ======================= --}}
<section class="bg-[#FAFCFF] py-24">
    <div class="mx-auto max-w-[1180px] px-6" data-aos="zoom-in">
        <div class="relative overflow-hidden rounded-[32px] bg-gradient-to-br from-[#063B91] via-[#126BFF] to-[#7147FF] p-10 shadow-[0_20px_40px_-15px_rgba(18,107,255,0.4)] lg:p-16">
            <div class="absolute -right-20 -top-20 h-96 w-96 rounded-full bg-white/10 blur-[100px]"></div>
            <div class="relative z-10 flex flex-col items-center justify-between gap-10 text-center md:flex-row md:text-left">
                <div class="max-w-xl">
                    <span class="mb-3 block text-[12px] font-bold uppercase tracking-widest text-white/80">Hubungi Saya</span>
                    <h2 class="mb-4 text-[30px] font-extrabold leading-tight text-white md:text-[38px]">Mari Berdiskusi</h2>
                    <p class="text-[16px] leading-relaxed text-white/90">Saya sedang mencari kesempatan magang dan posisi penuh waktu sebagai Full Stack Developer. Silakan hubungi saya melalui halaman kontak atau email.</p>
                </div>
                <div class="flex shrink-0 flex-col items-center gap-3">
                    <a href="{{ route('contact') }}" class="inline-flex h-[56px] items-center gap-3 rounded-full bg-white px-10 text-[16px] font-bold text-[#0B1B3A] shadow-xl transition-all hover:-translate-y-1.5 hover:shadow-2xl">
                        Hubungi Saya
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m13 6 6 6-6 6"/></svg>
                    </a>
                    <a href="mailto:ssuprapto351@gmail.com" class="text-[14px] font-medium text-white/90 underline-offset-4 hover:underline">ssuprapto351@gmail.com</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection