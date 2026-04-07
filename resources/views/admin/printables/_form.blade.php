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

    /* File upload */
    .file-upload  { border:2px dashed #e5e7eb; border-radius:12px; padding:20px 24px; cursor:pointer; transition:all .2s; position:relative; text-align:center; }
    .file-upload:hover { border-color:#3f9087; background:#f8fffe; }
    .file-upload input { position:absolute; inset:0; opacity:0; cursor:pointer; width:100%; height:100%; }
    .file-upload-icon { width:44px; height:44px; border-radius:12px; background:#e8f5f4; display:flex; align-items:center; justify-content:center; margin:0 auto 10px; }
    .file-upload-icon svg { width:22px; height:22px; color:#3f9087; }
    .file-upload p  { font-size:13px; color:#6b7280; }
    .file-upload strong { color:#3f9087; }
    .file-upload .file-name { font-size:12.5px; color:#374151; font-weight:600; margin-top:6px; background:#f3f4f6; padding:4px 12px; border-radius:6px; display:inline-block; }

    /* Image upload */
    .img-upload   { border:2px dashed #e5e7eb; border-radius:12px; padding:24px; text-align:center; cursor:pointer; transition:all .2s; position:relative; }
    .img-upload:hover { border-color:#3f9087; background:#f8fffe; }
    .img-upload input { position:absolute; inset:0; opacity:0; cursor:pointer; width:100%; height:100%; }
    .img-preview  { width:100%; height:160px; object-fit:cover; border-radius:10px; display:block; margin-bottom:12px; }
    .img-placeholder { width:56px; height:56px; border-radius:14px; background:#e8f5f4; display:flex; align-items:center; justify-content:center; margin:0 auto 10px; }
    .img-placeholder svg { width:26px; height:26px; color:#3f9087; }

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

    /* Existing file notice */
    .existing-file { display:flex; align-items:center; gap:10px; padding:10px 14px; background:#f0fdf4; border:1px solid #bbf7d0; border-radius:9px; margin-bottom:10px; }
    .existing-file svg { width:16px; height:16px; color:#16a34a; flex-shrink:0; }
    .existing-file span { font-size:12.5px; color:#15803d; font-weight:500; }
    .existing-file a { font-size:12px; color:#3f9087; font-weight:600; text-decoration:none; margin-left:auto; }
    .existing-file a:hover { text-decoration:underline; }
</style>

<form method="POST"
      action="{{ $action }}"
      enctype="multipart/form-data"
      id="printable-form">
    @csrf
    @if($method !== 'POST') @method($method) @endif

    <div class="form-grid">

        {{-- ── Left: main fields ── --}}
        <div>
            <div class="form-card">
                <h3>
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/>
                    </svg>
                    Material Information
                </h3>

                <div class="f-row {{ $errors->has('title') ? 'error' : '' }}">
                    <label>Title <span>*</span></label>
                    <input type="text" name="title"
                           value="{{ old('title', $printable?->title) }}"
                           placeholder="e.g. Arabic Alphabet Worksheet">
                    @error('title')<p class="f-error">{{ $message }}</p>@enderror
                </div>

                <div class="f-row {{ $errors->has('subject') ? 'error' : '' }}">
                    <label>Subject / Category</label>
                    <input type="text" name="subject"
                           value="{{ old('subject', $printable?->subject) }}"
                           placeholder="e.g. Arabic, Quran, Islamic Studies">
                    <p class="hint">Helps students filter by topic.</p>
                    @error('subject')<p class="f-error">{{ $message }}</p>@enderror
                </div>

                <div class="f-row {{ $errors->has('description') ? 'error' : '' }}">
                    <label>Description</label>
                    <textarea name="description" rows="5"
                              placeholder="Brief description of what this material covers and who it is for.">{{ old('description', $printable?->description) }}</textarea>
                    @error('description')<p class="f-error">{{ $message }}</p>@enderror
                </div>
            </div>

            {{-- PDF Upload --}}
            <div class="form-card">
                <h3>
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                    </svg>
                    PDF File {{ $printable ? '' : '*' }}
                </h3>

                @if($printable?->pdf_file)
                    <div class="existing-file">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>PDF already uploaded</span>
                        <a href="{{ Storage::url($printable->pdf_file) }}" target="_blank">View current PDF</a>
                    </div>
                    <p style="font-size:12px;color:#9ca3af;margin-bottom:10px;">Upload a new file to replace the existing one.</p>
                @endif

                <div class="file-upload" id="pdf-drop" onclick="document.getElementById('pdf-input').click()">
                    <input type="file" id="pdf-input" name="pdf_file"
                           accept="application/pdf"
                           onchange="showFileName(this, 'pdf-name')">
                    <div class="file-upload-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                        </svg>
                    </div>
                    <p><strong>Click to upload PDF</strong></p>
                    <p style="font-size:12px;margin-top:4px;">PDF only — max 20 MB</p>
                    <div id="pdf-name"></div>
                </div>
                @error('pdf_file')<p class="f-error" style="margin-top:6px;">{{ $message }}</p>@enderror
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
                    @if($printable?->cover_image)
                        <img src="{{ Storage::url($printable->cover_image) }}"
                             alt="{{ $printable->title }}"
                             class="img-preview" id="img-preview">
                    @else
                        <div id="img-placeholder-ui">
                            <div class="img-placeholder">
                                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                                </svg>
                            </div>
                            <p><strong>Click to upload</strong> cover image</p>
                            <p style="font-size:12px;margin-top:4px;">WebP, JPG, PNG — max 2 MB</p>
                        </div>
                    @endif
                    <input type="file" id="cover-input" name="cover_image"
                           accept="image/webp,image/jpeg,image/png"
                           onchange="previewImage(this)">
                </div>
                @error('cover_image')<p class="f-error" style="margin-top:6px;">{{ $message }}</p>@enderror
            </div>

            {{-- Settings --}}
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
                            <div class="toggle-sub">Show this material publicly</div>
                        </div>
                        <label class="toggle">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" value="1"
                                   {{ old('is_active', $printable?->is_active ?? true) ? 'checked' : '' }}>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>
            </div>

            {{-- Actions --}}
            <div class="form-actions">
                <button type="submit" class="btn-submit">{{ $btnText }}</button>
                <a href="{{ route('admin.printables.index') }}" class="btn-cancel">Cancel</a>
            </div>
        </div>
    </div>
</form>

<script>
    function showFileName(input, targetId) {
        const target = document.getElementById(targetId);
        if (input.files && input.files[0]) {
            target.innerHTML = `<span class="file-name">${input.files[0].name}</span>`;
        }
    }

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
