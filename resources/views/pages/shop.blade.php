@extends('layouts.site')

@section('content')
    <section class="mx-auto max-w-7xl px-5 py-14 sm:px-8">
        <p class="mb-3 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">Shop MVP</p>
        <h1 class="max-w-4xl text-4xl font-black leading-tight sm:text-7xl">Useful printed products, starting small.</h1>
        <div class="mt-10 grid gap-4 md:grid-cols-3">
            @forelse ($products as $product)
                <article class="rounded-lg border border-c3d-ink/10 bg-white p-6">
                    <span class="text-sm font-black text-c3d-orange">{{ $product->category }}</span>
                    <h2 class="mt-4 text-2xl font-black">{{ $product->title }}</h2>
                    <p class="mt-3 leading-7 text-c3d-muted">{{ $product->short_description }}</p>
                    <div class="mt-5 flex items-center justify-between gap-4">
                        <span class="font-black">{{ $product->price ? 'GBP '.$product->price : 'Quote' }}</span>
                        <a href="{{ route('quote') }}" class="rounded-lg bg-c3d-ink px-4 py-2 text-sm font-black text-white">Enquire</a>
                    </div>
                </article>
            @empty
                <p class="rounded-lg border border-c3d-ink/10 bg-white p-6 text-c3d-muted">Products are being prepared. Custom enquiries are open now.</p>
            @endforelse
        </div>
    </section>
@endsection
