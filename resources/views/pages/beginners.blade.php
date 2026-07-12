@extends('layouts.site')

@section('content')
    <section class="mx-auto grid max-w-7xl gap-10 px-5 py-14 sm:px-8 lg:grid-cols-[0.95fr_1.05fr] lg:items-center">
        <div>
            <p class="mb-3 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">Beginner 3D printing help</p>
            <h1 class="text-4xl font-black leading-tight sm:text-7xl">New to 3D printing? Start with the part you need.</h1>
            <p class="mt-6 max-w-2xl text-lg leading-8 text-c3d-muted">You do not need to know slicer settings, file formats or print jargon. Send a file, photo, sketch or description and C3D will help work out whether PLA printing is a good fit.</p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="{{ route('quote') }}" class="rounded-lg bg-c3d-teal px-5 py-4 text-sm font-black text-white">Ask for Advice</a>
                <a href="{{ route('services') }}" class="rounded-lg border border-c3d-ink/15 bg-white px-5 py-4 text-sm font-black">View Services</a>
            </div>
        </div>
        <img class="aspect-[1.2] w-full rounded-lg object-cover shadow-2xl shadow-c3d-ink/10" src="{{ asset('images/print-my-file-workflow.png') }}" alt="Clean desk setup for sending a 3D print file, notes and colour preference to a local 3D printing service">
    </section>

    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-5 py-14 sm:px-8">
            <div class="mb-8 max-w-3xl">
                <p class="mb-3 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">Good first jobs</p>
                <h2 class="text-4xl font-black leading-tight sm:text-5xl">Clear advice before printing.</h2>
                <p class="mt-5 leading-8 text-c3d-muted">C3D is not currently a formal 3D printing course or club. It is a local print service that can help beginners understand what is printable, what details matter, and what to send for a quote.</p>
            </div>
            <div class="grid gap-4 md:grid-cols-3">
                @foreach ([['I have a file', 'STL, 3MF, STEP and OBJ files can be reviewed with notes about quantity, colour and intended use.'], ['I have a broken part', 'Photos, measurements and a clear description help decide if a replacement PLA part is realistic.'], ['I only have an idea', 'A rough sketch or explanation can be enough to start a design-and-print conversation.']] as [$title, $copy])
                    <article class="rounded-lg border border-c3d-ink/10 bg-c3d-paper p-6">
                        <h3 class="text-2xl font-black">{{ $title }}</h3>
                        <p class="mt-4 leading-7 text-c3d-muted">{{ $copy }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-5 py-14 sm:px-8">
        <div class="grid gap-8 lg:grid-cols-[0.8fr_1.2fr]">
            <div>
                <p class="mb-3 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">Questions beginners ask</p>
                <h2 class="text-4xl font-black leading-tight">A plain-English first step.</h2>
            </div>
            <div class="grid gap-3">
                @foreach ([['Do you run 3D printing courses?', 'Not at the moment. C3D focuses on printing useful local jobs, but can still help you understand what to send and what is possible.'], ['Do I need a perfect CAD file?', 'No. A file helps, but photos, dimensions and notes can be enough for replacement parts or design-and-print work.'], ['Can you print one item?', 'Yes. One-off jobs, small repairs and prototype pieces are welcome.'], ['What material do you use?', 'Phase 1 focuses on PLA with multiple colour options using Bambu P1S printers with AMS.']] as [$question, $answer])
                    <article class="rounded-lg border border-c3d-ink/10 bg-white p-5">
                        <h3 class="font-black">{{ $question }}</h3>
                        <p class="mt-2 leading-7 text-c3d-muted">{{ $answer }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-c3d-ink text-white">
        <div class="mx-auto grid max-w-7xl gap-8 px-5 py-14 sm:px-8 lg:grid-cols-[1fr_0.8fr] lg:items-center">
            <div>
                <h2 class="text-4xl font-black">Send what you have.</h2>
                <p class="mt-4 max-w-2xl leading-8 text-white/70">A useful quote starts with the purpose of the part, approximate size, quantity, colour preference and any fit or strength notes.</p>
            </div>
            <a href="{{ route('quote') }}" class="inline-flex justify-center rounded-lg bg-c3d-orange px-5 py-4 text-sm font-black text-c3d-ink">Start a Beginner Quote</a>
        </div>
    </section>
@endsection
