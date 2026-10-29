@props(['icon' => null, 'color' => 'blue', 'size' => 'md'])

@php
    $colors = [
        'blue'   => ['bg' => 'from-[#F4F9FF] to-[#DCEAFF]', 'text' => 'text-[#1677FF]', 'hover' => 'group-hover:bg-[#1677FF]'],
        'purple' => ['bg' => 'from-[#F5F3FF] to-[#E9E4FF]', 'text' => 'text-[#7048FF]', 'hover' => 'group-hover:bg-[#7048FF]'],
        'cyan'   => ['bg' => 'from-[#ECFEFF] to-[#CFFAFE]', 'text' => 'text-[#0891B2]', 'hover' => 'group-hover:bg-[#0891B2]'],
        'indigo' => ['bg' => 'from-[#EEF2FF] to-[#E0E7FF]', 'text' => 'text-[#4F46E5]', 'hover' => 'group-hover:bg-[#4F46E5]'],
    ];
    $c = $colors[$color] ?? $colors['blue'];
    $box = $size === 'lg' ? 'w-16 h-16 rounded-2xl' : 'w-14 h-14 rounded-2xl';
    $svg = $size === 'lg' ? 'w-8 h-8' : 'w-7 h-7';
@endphp

<div class="{{ $box }} bg-gradient-to-br {{ $c['bg'] }} shadow-inner flex items-center justify-center {{ $c['text'] }} {{ $c['hover'] }} group-hover:text-white transition-all duration-300 group-hover:scale-110">
    @switch($icon)
        @case('server')
            <svg class="{{ $svg }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/></svg>
            @break
        @case('database')
            <svg class="{{ $svg }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><ellipse cx="12" cy="6" rx="8" ry="3"/><path stroke-linecap="round" d="M4 6v6c0 1.66 3.58 3 8 3s8-1.34 8-3V6"/><path stroke-linecap="round" d="M4 12v6c0 1.66 3.58 3 8 3s8-1.34 8-3v-6"/></svg>
            @break
        @case('plug')
            <svg class="{{ $svg }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
            @break
        @case('cpu')
            <svg class="{{ $svg }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="6" y="6" width="12" height="12" rx="2"/><path stroke-linecap="round" d="M9 2v2M15 2v2M9 20v2M15 20v2M2 9h2M2 15h2M20 9h2M20 15h2"/></svg>
            @break
        @case('layout')
            <svg class="{{ $svg }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><path stroke-linecap="round" d="M3 9h18M9 21V9"/></svg>
            @break
        @default
            <svg class="{{ $svg }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
    @endswitch
</div>