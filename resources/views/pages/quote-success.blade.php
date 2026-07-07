@extends('layouts.site')

@section('content')
    <section class="mx-auto max-w-3xl px-5 py-20 sm:px-8">
        <div class="rounded-lg border border-c3d-ink/10 bg-white p-8">
            <p class="mb-3 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">Quote request received</p>
            <h1 class="text-4xl font-black">Thanks, {{ $quoteRequest->name }}.</h1>
            <p class="mt-4 leading-8 text-c3d-muted">Your request has been saved as quote #{{ $quoteRequest->id }}. We will review the details and come back with next steps.</p>
            <a href="{{ route('home') }}" class="mt-8 inline-flex rounded-lg bg-c3d-ink px-5 py-3 text-sm font-black text-white">Back to home</a>
        </div>
    </section>
@endsection
