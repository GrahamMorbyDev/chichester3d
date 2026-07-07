@props([
    'size' => 'md',
])

@php
    $sizes = [
        'sm' => 'h-9 w-9',
        'md' => 'h-10 w-10',
        'lg' => 'h-12 w-12',
    ];
@endphp

<span {{ $attributes->class(['relative inline-grid shrink-0 place-items-center overflow-hidden rounded-lg bg-c3d-ink shadow-sm ring-1 ring-white/20', $sizes[$size] ?? $sizes['md']]) }} aria-hidden="true">
    <svg viewBox="0 0 48 48" class="h-full w-full" role="img">
        <defs>
            <linearGradient id="c3d-accent" x1="10" x2="38" y1="8" y2="40" gradientUnits="userSpaceOnUse">
                <stop stop-color="#17b8ae" />
                <stop offset="1" stop-color="#e86f2d" />
            </linearGradient>
        </defs>
        <rect width="48" height="48" rx="9" fill="#17212b" />
        <path d="M15 12h18l6 6v18H15l-6-6V12h6Z" fill="none" stroke="url(#c3d-accent)" stroke-width="2.4" stroke-linejoin="round" />
        <path d="M14 33h20M18 37h12" stroke="#ffffff" stroke-opacity=".42" stroke-width="1.7" stroke-linecap="round" />
        <text x="24" y="27.5" fill="#ffffff" font-family="Inter, Arial, sans-serif" font-size="11.5" font-weight="900" text-anchor="middle" letter-spacing=".4">C3D</text>
        <circle cx="35.8" cy="14.2" r="2.4" fill="#e86f2d" />
        <circle cx="12.2" cy="30.8" r="2" fill="#17b8ae" />
    </svg>
</span>
