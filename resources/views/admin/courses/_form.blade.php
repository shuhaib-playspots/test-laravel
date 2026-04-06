<style>
    .form-grid    { display:grid; grid-template-columns:1fr 320px; gap:24px; align-items:start; }
    .form-card    { background:#fff; border-radius:14px; box-shadow:0 1px 4px rgba(0,0,0,.06),0 4px 16px rgba(0,0,0,.04); padding:28px; margin-bottom:20px; }
    .form-card h3 { font-size:14px; font-weight:700; color:#111827; margin-bottom:20px; padding-bottom:12px; border-bottom:1px solid #f3f4f6; display:flex; align-items:center; gap:8px; }
    .form-card h3 svg { width:16px; height:16px; color:#3f9087; }

    .f-row        { margin-bottom:18px; }
    .f-row:last-child { margin-bottom:0; }
    .f-row label  { display:block; font-size:12.5px; font-weight:600; color:#374151; margin-bottom:6px; }
    .f-row label span { color:#dc2626; }
    .f-row input[type=text],
    .f-row input[type=number],
    .f-row textarea,
    .f-row select { width:100%; padding:9px 12px; border:1px solid #e5e7eb; border-radius:9px; font-size:13.5px; color:#111827; background:#fff; outline:none; transition:border-color .15s,box-shadow .15s; font-family:inherit; }
    .f-row input:focus,
    .f-row textarea:focus,
    .f-row select:focus { border-color:#3f9087; box-shadow:0 0 0 3px rgba(63,144,135,.12); }
    .f-row textarea { resize:vertical; min-height:110px; line-height:1.6; }
    .f-row .hint   { font-size:11.5px; color:#9ca3af; margin-top:5px; }
    .f-row.error input,
    .f-row.error textarea,
    .f-row.error select { border-color:#dc2626; }
    .f-error       { font-size:12px; color:#dc2626; margin-top:4px; }

    .f-two        { display:grid; grid-template-columns:1fr 1fr; gap:14px; }

    /* Checkbox grid */
    .check-group  { display:flex; flex-wrap:wrap; gap:10px; }
    .check-item   { display:flex; align-items:center; gap:7px; padding:8px 14px; border:1px solid #e5e7eb; border-radius:9px; cursor:pointer; font-size:13px; color:#374151; transition:all .15s; user-select:none; }
    .check-item input { display:none; }
    .check-item.checked { background:#e8f5f4; border-color:#3f9087; color:#2d6e67; font-weight:600; }

    /* Highlights list */
    .hl-list      { display:flex; flex-direction:column; gap:8px; }
    .hl-item      { display:flex; align-items:center; gap:8px; }
    .hl-item input { flex:1; }
    .hl-remove    { width:32px; height:32px; border:none; background:#fef2f2; color:#dc2626; border-radius:8px; cursor:pointer; display:flex; align-items:center; justify-content:center; flex-shrink:0; transition:background .15s; }
    .hl-remove:hover { background:#fee2e2; }
    .hl-remove svg { width:14px; height:14px; }
    .hl-add       { display:inline-flex; align-items:center; gap:6px; margin-top:8px; padding:7px 14px; border:1.5px dashed #3f9087; border-radius:9px; background:transparent; color:#3f9087; font-size:12.5px; font-weight:600; cursor:pointer; transition:background .15s; }
    .hl-add:hover { background:#e8f5f4; }
    .hl-add svg   { width:14px; height:14px; }

    /* Image upload */
    .img-upload   { border:2px dashed #e5e7eb; border-radius:12px; padding:24px; text-align:center; cursor:pointer; transition:all .2s; position:relative; }
    .img-upload:hover { border-color:#3f9087; background:#f8fffe; }
    .img-upload input { position:absolute; inset:0; opacity:0; cursor:pointer; width:100%; height:100%; }
    .img-preview  { width:100%; height:160px; object-fit:cover; border-radius:10px; display:block; margin-bottom:12px; }
    .img-placeholder { width:56px; height:56px; border-radius:14px; background:#e8f5f4; display:flex; align-items:center; justify-content:center; margin:0 auto 10px; }
    .img-placeholder svg { width:26px; height:26px; color:#3f9087; }
    .img-upload p  { font-size:13px; color:#6b7280; }
    .img-upload strong { color:#3f9087; }

    /* Toggle */
    .toggle-row   { display:flex; align-items:center; justify-content:space-between; }
    .toggle-label { font-size:13.5px; color:#374151; font-weight:500; }
    .toggle-sub   { font-size:12px; color:#9ca3af; margin-top:2px; }
    .toggle       { position:relative; width:44px; height:24px; flex-shrink:0; }
    .toggle input { opacity:0; width:0; height:0; }
    .toggle-slider { position:absolute; cursor:pointer; inset:0; background:#d1d5db; border-radius:20px; transition:.2s; }
    .toggle-slider::before { content:''; position:absolute; width:18px; height:18px; border-radius:50%; background:#fff; left:3px; bottom:3px; transition:.2s; box-shadow:0 1px 4px rgba(0,0,0,.2); }
    .toggle input:checked + .toggle-slider { background:#3f9087; }
    .toggle input:checked + .toggle-slider::before { transform:translateX(20px); }

    /* Submit area */
    .form-actions { display:flex; gap:12px; align-items:center; }
    .btn-submit   { padding:11px 28px; border-radius:10px; background:#3f9087; color:#fff; border:none; font-size:14px; font-weight:600; cursor:pointer; transition:background .15s; }
    .btn-submit:hover { background:#2d6e67; }
    .btn-cancel   { padding:11px 20px; border-radius:10px; background:#f3f4f6; color:#374151; font-size:14px; font-weight:600; text-decoration:none; transition:background .15s; }
    .btn-cancel:hover { background:#e5e7eb; }
</style>

<form method="POST"
      action="{{ $action }}"
      enctype="multipart/form-data"
      id="course-form">
    @csrf
    @if($method !== 'POST') @method($method) @endif

    <div class="form-grid">

        {{-- ── Left: main fields ── --}}
        <div>
            {{-- Basic Info --}}
            <div class="form-card">
                <h3>
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/>
                    </svg>
                    Course Information
                </h3>

                <div class="f-row {{ $errors->has('name') ? 'error' : '' }}">
                    <label>Course Name <span>*</span></label>
                    <input type="text" name="name" id="name-field"
                           value="{{ old('name', $course?->name) }}"
                           placeholder="e.g. Quran Recitation (Nazra)"
                           oninput="autoSlug(this.value)">
                    @error('name')<p class="f-error">{{ $message }}</p>@enderror
                </div>

                <div class="f-row {{ $errors->has('slug') ? 'error' : '' }}">
                    <label>URL Slug <span>*</span></label>
                    <input type="text" name="slug" id="slug-field"
                           value="{{ old('slug', $course?->slug) }}"
                           placeholder="auto-generated from name">
                    <p class="hint">URL: /courses/<span id="slug-preview">{{ $course?->slug ?? '...' }}</span></p>
                    @error('slug')<p class="f-error">{{ $message }}</p>@enderror
                </div>

                <div class="f-row {{ $errors->has('tagline') ? 'error' : '' }}">
                    <label>Tagline <span>*</span></label>
                    <input type="text" name="tagline"
                           value="{{ old('tagline', $course?->tagline) }}"
                           placeholder="Short, catchy one-liner for the course">
                    @error('tagline')<p class="f-error">{{ $message }}</p>@enderror
                </div>

                <div class="f-row {{ $errors->has('description') ? 'error' : '' }}">
                    <label>Full Description <span>*</span></label>
                    <textarea name="description" rows="5"
                              placeholder="Detailed description shown on the course detail page">{{ old('description', $course?->description) }}</textarea>
                    @error('description')<p class="f-error">{{ $message }}</p>@enderror
                </div>
            </div>

            {{-- Course Details --}}
            <div class="form-card">
                <h3>
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25z"/>
                    </svg>
                    Course Details
                </h3>

                <div class="f-two">
                    <div class="f-row {{ $errors->has('level') ? 'error' : '' }}">
                        <label>Level <span>*</span></label>
                        <select name="level">
                            @foreach(['All Levels','Beginner','Intermediate','Advanced','Beginner to Intermediate','Beginner to Advanced','Intermediate to Advanced'] as $lvl)
                                <option value="{{ $lvl }}" {{ old('level', $course?->level) === $lvl ? 'selected' : '' }}>{{ $lvl }}</option>
                            @endforeach
                        </select>
                        @error('level')<p class="f-error">{{ $message }}</p>@enderror
                    </div>

                    <div class="f-row {{ $errors->has('duration') ? 'error' : '' }}">
                        <label>Duration <span>*</span></label>
                        <input type="text" name="duration"
                               value="{{ old('duration', $course?->duration) }}"
                               placeholder="e.g. 3 Months, Ongoing">
                        @error('duration')<p class="f-error">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="f-two">
                    <div class="f-row {{ $errors->has('age_group') ? 'error' : '' }}">
                        <label>Age Group <span>*</span></label>
                        <input type="text" name="age_group"
                               value="{{ old('age_group', $course?->age_group) }}"
                               placeholder="e.g. 5+ Years">
                        @error('age_group')<p class="f-error">{{ $message }}</p>@enderror
                    </div>

                    <div class="f-row {{ $errors->has('icon') ? 'error' : '' }}">
                        <label>Icon Key <span>*</span></label>
                        <input type="text" name="icon"
                               value="{{ old('icon', $course?->icon) }}"
                               placeholder="e.g. quran, arabic, hifz">
                        @error('icon')<p class="f-error">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="f-row {{ $errors->has('class_types') ? 'error' : '' }}">
                    <label>Class Formats <span>*</span></label>
                    @php $selectedTypes = old('class_types', $course?->class_types ?? []); @endphp
                    <div class="check-group" id="ct-group">
                        @foreach(['one_on_one' => 'One-on-One', 'group' => 'Small Group', 'online' => 'Online Live'] as $val => $lbl)
                            @php $checked = in_array($val, $selectedTypes); @endphp
                            <label class="check-item {{ $checked ? 'checked' : '' }}" onclick="toggleCheck(this)">
                                <input type="checkbox" name="class_types[]" value="{{ $val }}" {{ $checked ? 'checked' : '' }}>
                                {{ $lbl }}
                            </label>
                        @endforeach
                    </div>
                    @error('class_types')<p class="f-error">{{ $message }}</p>@enderror
                </div>
            </div>

            {{-- What You'll Learn --}}
            <div class="form-card">
                <h3>
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    What You'll Learn
                </h3>

                @php $highlights = old('highlights', $course?->highlights ?? ['']); @endphp
                <div class="hl-list" id="hl-list">
                    @foreach($highlights as $hl)
                        <div class="hl-item">
                            <input type="text" name="highlights[]"
                                   value="{{ $hl }}"
                                   placeholder="e.g. Arabic letter recognition and sounds">
                            <button type="button" class="hl-remove" onclick="removeHighlight(this)" title="Remove">
                                <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                    @endforeach
                </div>
                <button type="button" class="hl-add" onclick="addHighlight()">
                    <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                    </svg>
                    Add Point
                </button>
                @error('highlights')<p class="f-error" style="margin-top:6px;">{{ $message }}</p>@enderror
            </div>
        </div>

        {{-- ── Right: sidebar fields ── --}}
        <div>
            {{-- Cover Image --}}
            <div class="form-card">
                <h3>
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                    </svg>
                    Cover Image
                </h3>

                <div class="img-upload" id="img-drop" onclick="document.getElementById('cover-input').click()">
                    @if($course?->cover_image)
                        <img src="{{ Storage::url($course->cover_image) }}"
                             alt="{{ $course->name }}"
                             class="img-preview" id="img-preview">
                    @else
                        <div id="img-placeholder-ui">
                            <div class="img-placeholder">
                                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                                </svg>
                            </div>
                            <p><strong>Click to upload</strong> or drag &amp; drop</p>
                            <p style="font-size:12px;margin-top:4px;">WebP, JPG, PNG — max 2 MB</p>
                        </div>
                    @endif
                    <input type="file" id="cover-input" name="cover_image"
                           accept="image/webp,image/jpeg,image/png"
                           onchange="previewImage(this)">
                </div>
                @error('cover_image')<p class="f-error" style="margin-top:6px;">{{ $message }}</p>@enderror
            </div>

            {{-- Publish Settings --}}
            <div class="form-card">
                <h3>
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 011.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.56.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.893.149c-.425.07-.765.383-.93.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 01-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.397.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 01-.12-1.45l.527-.737c.25-.35.273-.806.108-1.204-.165-.397-.505-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.107-1.204l-.527-.738a1.125 1.125 0 01.12-1.45l.773-.773a1.125 1.125 0 011.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894z M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Settings
                </h3>

                <div class="f-row {{ $errors->has('order') ? 'error' : '' }}">
                    <label>Display Order <span>*</span></label>
                    <input type="number" name="order" min="1"
                           value="{{ old('order', $course?->order ?? 1) }}">
                    <p class="hint">Lower numbers appear first on the courses page.</p>
                    @error('order')<p class="f-error">{{ $message }}</p>@enderror
                </div>

                <div class="f-row">
                    <div class="toggle-row">
                        <div>
                            <div class="toggle-label">Active / Visible</div>
                            <div class="toggle-sub">Show this course publicly</div>
                        </div>
                        <label class="toggle">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" value="1"
                                   {{ old('is_active', $course?->is_active ?? true) ? 'checked' : '' }}>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>
            </div>

            {{-- Actions --}}
            <div class="form-actions">
                <button type="submit" class="btn-submit">{{ $btnText }}</button>
                <a href="{{ route('admin.courses.index') }}" class="btn-cancel">Cancel</a>
            </div>
        </div>
    </div>
</form>

<script>
    // Auto-generate slug from name
    function autoSlug(name) {
        const slug = name.toLowerCase()
            .replace(/[^\w\s-]/g, '')
            .replace(/[\s_]+/g, '-')
            .replace(/^-+|-+$/g, '');
        const slugField = document.getElementById('slug-field');
        if (!slugField._manuallyEdited) {
            slugField.value = slug;
            document.getElementById('slug-preview').textContent = slug || '...';
        }
    }

    document.getElementById('slug-field').addEventListener('input', function () {
        this._manuallyEdited = this.value !== '';
        document.getElementById('slug-preview').textContent = this.value || '...';
    });

    // Toggle checkboxes
    function toggleCheck(label) {
        const cb = label.querySelector('input[type=checkbox]');
        cb.checked = !cb.checked;
        label.classList.toggle('checked', cb.checked);
        event.preventDefault();
    }

    // Highlights
    function addHighlight() {
        const list = document.getElementById('hl-list');
        const item = document.createElement('div');
        item.className = 'hl-item';
        item.innerHTML = `
            <input type="text" name="highlights[]" placeholder="e.g. What students will learn...">
            <button type="button" class="hl-remove" onclick="removeHighlight(this)" title="Remove">
                <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>`;
        list.appendChild(item);
        item.querySelector('input').focus();
    }

    function removeHighlight(btn) {
        const items = document.querySelectorAll('#hl-list .hl-item');
        if (items.length > 1) {
            btn.closest('.hl-item').remove();
        }
    }

    // Image preview
    function previewImage(input) {
        if (!input.files || !input.files[0]) return;
        const reader = new FileReader();
        reader.onload = (e) => {
            const placeholder = document.getElementById('img-placeholder-ui');
            if (placeholder) placeholder.style.display = 'none';

            let preview = document.getElementById('img-preview');
            if (!preview) {
                preview = document.createElement('img');
                preview.id = 'img-preview';
                preview.className = 'img-preview';
                document.getElementById('img-drop').prepend(preview);
            }
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>
