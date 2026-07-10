<form action="{{ route('quote.store') }}" method="POST" enctype="multipart/form-data" class="grid gap-5 rounded-lg border border-c3d-ink/10 bg-white p-5 shadow-sm sm:p-8">
    @csrf
    <input type="hidden" name="quote_started_at" value="{{ now()->timestamp }}">
    <div class="hidden" aria-hidden="true">
        <label>
            Leave this field blank
            <input type="text" name="website" value="" tabindex="-1" autocomplete="off">
        </label>
    </div>

    @if ($errors->any())
        <div class="rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-800">
            <p class="font-bold">Please check the highlighted fields.</p>
        </div>
    @endif

    <div class="grid gap-4 sm:grid-cols-2">
        <label class="grid gap-2 text-sm font-bold">
            <span>Name</span>
            <input name="name" value="{{ old('name') }}" required maxlength="120" class="rounded-lg border px-4 py-3 font-normal @error('name') border-red-400 @else border-c3d-ink/15 @enderror" autocomplete="name" @error('name') aria-invalid="true" @enderror>
            @error('name') <span class="text-sm font-medium text-red-700">{{ $message }}</span> @enderror
        </label>
        <label class="grid gap-2 text-sm font-bold">
            <span>Email</span>
            <input type="email" name="email" value="{{ old('email') }}" required maxlength="180" class="rounded-lg border px-4 py-3 font-normal @error('email') border-red-400 @else border-c3d-ink/15 @enderror" autocomplete="email" @error('email') aria-invalid="true" @enderror>
            @error('email') <span class="text-sm font-medium text-red-700">{{ $message }}</span> @enderror
        </label>
        <label class="grid gap-2 text-sm font-bold">
            <span>Phone <span class="text-xs font-medium text-c3d-muted">(optional)</span></span>
            <input name="phone" value="{{ old('phone') }}" maxlength="60" class="rounded-lg border px-4 py-3 font-normal @error('phone') border-red-400 @else border-c3d-ink/15 @enderror" autocomplete="tel" @error('phone') aria-invalid="true" @enderror>
            @error('phone') <span class="text-sm font-medium text-red-700">{{ $message }}</span> @enderror
        </label>
        <label class="grid gap-2 text-sm font-bold">
            <span>Postcode <span class="text-xs font-medium text-c3d-muted">(optional)</span></span>
            <input name="postcode" value="{{ old('postcode') }}" maxlength="20" class="rounded-lg border px-4 py-3 font-normal @error('postcode') border-red-400 @else border-c3d-ink/15 @enderror" autocomplete="postal-code" @error('postcode') aria-invalid="true" @enderror>
            @error('postcode') <span class="text-sm font-medium text-red-700">{{ $message }}</span> @enderror
        </label>
    </div>

    <div class="grid gap-4 sm:grid-cols-3">
        <label class="grid gap-2 text-sm font-bold">
            <span>Service</span>
            <select name="service_type" required class="rounded-lg border px-4 py-3 font-normal @error('service_type') border-red-400 @else border-c3d-ink/15 @enderror" @error('service_type') aria-invalid="true" @enderror>
                @foreach (\App\Models\QuoteRequest::SERVICE_TYPES as $value => $label)
                    <option value="{{ $value }}" @selected(old('service_type') === $value)>{{ $label }}</option>
                @endforeach
            </select>
            @error('service_type') <span class="text-sm font-medium text-red-700">{{ $message }}</span> @enderror
        </label>
        <label class="grid gap-2 text-sm font-bold">
            <span>Project type <span class="text-xs font-medium text-c3d-muted">(optional)</span></span>
            <select name="project_type" class="rounded-lg border px-4 py-3 font-normal @error('project_type') border-red-400 @else border-c3d-ink/15 @enderror" @error('project_type') aria-invalid="true" @enderror>
                <option value="">Not sure yet</option>
                @foreach (\App\Models\QuoteRequest::PROJECT_TYPES as $value => $label)
                    <option value="{{ $value }}" @selected(old('project_type') === $value)>{{ $label }}</option>
                @endforeach
            </select>
            @error('project_type') <span class="text-sm font-medium text-red-700">{{ $message }}</span> @enderror
        </label>
        <label class="grid gap-2 text-sm font-bold">
            <span>Quantity</span>
            <input type="number" name="quantity" min="1" max="100" value="{{ old('quantity', 1) }}" required class="rounded-lg border px-4 py-3 font-normal @error('quantity') border-red-400 @else border-c3d-ink/15 @enderror" @error('quantity') aria-invalid="true" @enderror>
            @error('quantity') <span class="text-sm font-medium text-red-700">{{ $message }}</span> @enderror
        </label>
    </div>

    <label class="grid gap-2 text-sm font-bold">
        <span>Tell us what you need</span>
        <textarea name="description" required minlength="20" maxlength="5000" rows="6" class="rounded-lg border px-4 py-3 font-normal @error('description') border-red-400 @else border-c3d-ink/15 @enderror" placeholder="What is it for, how strong does it need to be, and what problem should it solve?" @error('description') aria-invalid="true" @enderror>{{ old('description') }}</textarea>
        @error('description') <span class="text-sm font-medium text-red-700">{{ $message }}</span> @enderror
    </label>

    <div class="grid gap-4 sm:grid-cols-2">
        <label class="grid gap-2 text-sm font-bold">
            <span>Material preference <span class="text-xs font-medium text-c3d-muted">(optional)</span></span>
            <select name="material_preference" class="rounded-lg border px-4 py-3 font-normal @error('material_preference') border-red-400 @else border-c3d-ink/15 @enderror" @error('material_preference') aria-invalid="true" @enderror>
                @foreach (['PLA', 'PETG', 'Not Sure'] as $material)
                    <option value="{{ $material }}" @selected(old('material_preference') === $material)>{{ $material }}</option>
                @endforeach
            </select>
            @error('material_preference') <span class="text-sm font-medium text-red-700">{{ $message }}</span> @enderror
        </label>
        <label class="grid gap-2 text-sm font-bold">
            <span>Colour preference <span class="text-xs font-medium text-c3d-muted">(optional)</span></span>
            <input name="colour_preference" value="{{ old('colour_preference') }}" maxlength="120" placeholder="Black, white, orange, multicolour, not sure..." class="rounded-lg border px-4 py-3 font-normal @error('colour_preference') border-red-400 @else border-c3d-ink/15 @enderror" @error('colour_preference') aria-invalid="true" @enderror>
            @error('colour_preference') <span class="text-sm font-medium text-red-700">{{ $message }}</span> @enderror
        </label>
        <label class="grid gap-2 text-sm font-bold">
            <span>Measurements <span class="text-xs font-medium text-c3d-muted">(optional)</span></span>
            <textarea name="measurements" maxlength="2000" rows="3" class="rounded-lg border px-4 py-3 font-normal @error('measurements') border-red-400 @else border-c3d-ink/15 @enderror" placeholder="Key dimensions, tolerances, or fitting notes." @error('measurements') aria-invalid="true" @enderror>{{ old('measurements') }}</textarea>
            @error('measurements') <span class="text-sm font-medium text-red-700">{{ $message }}</span> @enderror
        </label>
        <div class="grid gap-4">
            <label class="grid gap-2 text-sm font-bold">
                <span>Deadline <span class="text-xs font-medium text-c3d-muted">(optional)</span></span>
                <input name="deadline" value="{{ old('deadline') }}" maxlength="120" class="rounded-lg border px-4 py-3 font-normal @error('deadline') border-red-400 @else border-c3d-ink/15 @enderror" @error('deadline') aria-invalid="true" @enderror>
                @error('deadline') <span class="text-sm font-medium text-red-700">{{ $message }}</span> @enderror
            </label>
            <label class="grid gap-2 text-sm font-bold">
                <span>Budget guide <span class="text-xs font-medium text-c3d-muted">(optional)</span></span>
                <input name="budget" value="{{ old('budget') }}" maxlength="120" class="rounded-lg border px-4 py-3 font-normal @error('budget') border-red-400 @else border-c3d-ink/15 @enderror" @error('budget') aria-invalid="true" @enderror>
                @error('budget') <span class="text-sm font-medium text-red-700">{{ $message }}</span> @enderror
            </label>
        </div>
    </div>

    <label class="grid gap-2 text-sm font-bold" x-data="{ fileCount: 0 }">
        <span>Upload files or photos <span class="text-xs font-medium text-c3d-muted">(optional)</span></span>
        <input type="file" name="uploads[]" multiple accept=".stl,.3mf,.step,.stp,.obj,.jpg,.jpeg,.png,.pdf" x-on:change="fileCount = $event.target.files.length" class="rounded-lg border border-dashed bg-c3d-paper px-4 py-5 font-normal @error('uploads') border-red-400 @else border-c3d-ink/25 @enderror @error('uploads.*') border-red-400 @enderror" @error('uploads') aria-invalid="true" @enderror @error('uploads.*') aria-invalid="true" @enderror>
        <span class="font-normal text-c3d-muted">Accepted: STL, 3MF, STEP, OBJ, JPG, PNG, PDF. Up to 8 files, 20MB each.</span>
        <span class="font-normal text-c3d-teal" x-show="fileCount > 0" x-text="`${fileCount} file${fileCount === 1 ? '' : 's'} selected`"></span>
        @error('uploads') <span class="text-sm font-medium text-red-700">{{ $message }}</span> @enderror
        @error('uploads.*') <span class="text-sm font-medium text-red-700">{{ $message }}</span> @enderror
    </label>

    <button class="rounded-lg bg-c3d-teal px-6 py-4 text-sm font-black text-white" type="submit">
        Send quote request
    </button>
</form>
