@props([
    'variant' => 'default',
])

@php
    $isCompact = $variant === 'compact';
@endphp

<aside {{ $attributes->class([
    'relative isolate overflow-hidden rounded-lg border border-c3d-ink/10 bg-[#071521] text-white shadow-2xl shadow-c3d-ink/10',
    'p-5 sm:p-7' => $isCompact,
    'p-6 sm:p-8' => ! $isCompact,
]) }} aria-label="Mesh Medic STL repair service">
    <div class="absolute inset-0 -z-20 bg-[radial-gradient(circle_at_12%_18%,rgba(23,184,174,0.28),transparent_16rem),radial-gradient(circle_at_86%_28%,rgba(232,111,45,0.24),transparent_18rem),linear-gradient(135deg,#071521,#122131)]"></div>
    <div class="absolute inset-0 -z-10 opacity-[0.16] [background-image:linear-gradient(rgba(255,255,255,0.16)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.16)_1px,transparent_1px)] [background-size:24px_24px]"></div>

    <div class="grid gap-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-center">
        <div>
            <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-3 py-2 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">
                <span class="h-2 w-2 rounded-full bg-c3d-orange"></span>
                STL repair partner
            </div>
            <h2 class="{{ $isCompact ? 'mt-4 text-2xl' : 'mt-5 text-3xl sm:text-4xl' }} font-black leading-tight">
                Broken mesh? Send it to Mesh Medic before it hits the printer.
            </h2>
            <p class="mt-4 max-w-2xl leading-8 text-white/70">
                Mesh Medic repairs STL files with holes, non-manifold edges, flipped normals and awkward geometry, helping turn problem models into cleaner print-ready files for C3D quotes.
            </p>
            <div class="mt-6 flex flex-wrap gap-3">
                <a href="https://mesh-medic.com/" target="_blank" rel="noopener noreferrer" class="rounded-lg bg-c3d-orange px-5 py-3 text-sm font-black text-c3d-ink">Repair an STL</a>
                <a href="{{ route('print-file') }}" class="rounded-lg border border-white/20 bg-white/5 px-5 py-3 text-sm font-black text-white">Then print with C3D</a>
            </div>
        </div>

        <div class="grid gap-3 sm:grid-cols-3">
            @foreach ([['01', 'Diagnose', 'Find holes, shell issues and mesh errors.'], ['02', 'Repair', 'Clean the file so slicing is less painful.'], ['03', 'Print', 'Bring the repaired model back to C3D for PLA printing.']] as [$number, $title, $copy])
                <div class="rounded-lg border border-white/10 bg-white/[0.07] p-4 backdrop-blur">
                    <span class="text-sm font-black text-c3d-orange">{{ $number }}</span>
                    <h3 class="mt-3 font-black">{{ $title }}</h3>
                    <p class="mt-2 text-sm leading-6 text-white/60">{{ $copy }}</p>
                </div>
            @endforeach
        </div>
    </div>
</aside>
