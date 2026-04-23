@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/admin-common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/admin-careers-form.css') }}">
@endpush

<form method="POST" action="{{ $action }}" id="career-form">
    @csrf
    @if($method !== 'POST') @method($method) @endif

    <div class="form-grid">

        {{-- ── Left: main fields ── --}}
        <div>
            <div class="form-card">
                <h3>
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z"/>
                    </svg>
                    Position Details
                </h3>

                <div class="f-row {{ $errors->has('title') ? 'error' : '' }}">
                    <label>Job Title <span>*</span></label>
                    <input type="text" name="title"
                           value="{{ old('title', $career?->title) }}"
                           placeholder="e.g. Quran Teacher, Arabic Language Instructor">
                    @error('title')<p class="f-error">{{ $message }}</p>@enderror
                </div>

                <div class="f-cols2">
                    <div class="f-row {{ $errors->has('department') ? 'error' : '' }}">
                        <label>Department</label>
                        <input type="text" name="department"
                               value="{{ old('department', $career?->department) }}"
                               placeholder="e.g. Quran, Arabic">
                        @error('department')<p class="f-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="f-row {{ $errors->has('location') ? 'error' : '' }}">
                        <label>Location</label>
                        <input type="text" name="location"
                               value="{{ old('location', $career?->location) }}"
                               placeholder="e.g. Online, Dubai">
                        @error('location')<p class="f-error">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="f-row {{ $errors->has('description') ? 'error' : '' }}">
                    <label>Job Description <span>*</span></label>
                    <textarea name="description" rows="7"
                              placeholder="Describe the role, responsibilities, and what we're looking for…">{{ old('description', $career?->description) }}</textarea>
                    @error('description')<p class="f-error">{{ $message }}</p>@enderror
                </div>

                <div class="f-row {{ $errors->has('requirements') ? 'error' : '' }}">
                    <label>Requirements</label>
                    <textarea name="requirements" rows="5"
                              placeholder="List qualifications, experience, or skills required…">{{ old('requirements', $career?->requirements) }}</textarea>
                    <p class="hint">Optional — e.g. "Ijazah in Quran recitation, 2 years teaching experience".</p>
                    @error('requirements')<p class="f-error">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        {{-- ── Right: meta + settings ── --}}
        <div>
            <div class="form-card">
                <h3>
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z M6 6h.008v.008H6V6z"/>
                    </svg>
                    Job Meta
                </h3>

                <div class="f-row {{ $errors->has('type') ? 'error' : '' }}">
                    <label>Employment Type <span>*</span></label>
                    <select name="type" class="type-select">
                        @foreach(['full-time' => 'Full-time', 'part-time' => 'Part-time', 'contract' => 'Contract', 'volunteer' => 'Volunteer'] as $val => $label)
                            <option value="{{ $val }}" {{ old('type', $career?->type ?? 'full-time') === $val ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @error('type')<p class="f-error">{{ $message }}</p>@enderror
                </div>

                <div class="f-row {{ $errors->has('deadline') ? 'error' : '' }}">
                    <label>Application Deadline</label>
                    <input type="date" name="deadline"
                           value="{{ old('deadline', $career?->deadline?->format('Y-m-d')) }}">
                    <p class="hint">Leave empty for no deadline.</p>
                    @error('deadline')<p class="f-error">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="form-card">
                <h3>
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 011.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.56.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.893.149c-.425.07-.765.383-.93.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 01-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.397.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 01-.12-1.45l.527-.737c.25-.35.273-.806.108-1.204-.165-.397-.505-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.107-1.204l-.527-.738a1.125 1.125 0 01.12-1.45l.773-.773a1.125 1.125 0 011.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894z M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Settings
                </h3>

                <div class="f-row">
                    <div class="toggle-row">
                        <div>
                            <div class="toggle-label">Active / Visible</div>
                            <div class="toggle-sub">Show this listing publicly</div>
                        </div>
                        <label class="toggle">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" value="1"
                                   {{ old('is_active', $career?->is_active ?? true) ? 'checked' : '' }}>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">{{ $btnText }}</button>
                <a href="{{ route('admin.careers.index') }}" class="btn-cancel">Cancel</a>
            </div>
        </div>
    </div>
</form>
