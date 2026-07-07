@extends('layouts.site')

@section('content')
    <section class="mx-auto grid max-w-7xl gap-10 px-5 py-12 sm:px-8 lg:grid-cols-[0.75fr_1.25fr]">
        <div>
            <p class="mb-3 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">Request a quote</p>
            <h1 class="text-4xl font-black leading-tight sm:text-6xl">Tell us what you need printed, prototyped or replaced.</h1>
            <p class="mt-5 leading-8 text-c3d-muted">No payment at this stage. We review the job, check the practical details, then reply with what is possible, estimated cost and lead time.</p>
            <div class="mt-8 rounded-lg border border-c3d-ink/10 bg-white p-5">
                <h2 class="font-black">Current print setup</h2>
                <p class="mt-2 leading-7 text-c3d-muted">Bambu P1S printers with AMS for full PLA printing and multiple colours. PETG can be discussed for practical parts where needed.</p>
            </div>
        </div>
        <x-quote-form />
    </section>
@endsection
