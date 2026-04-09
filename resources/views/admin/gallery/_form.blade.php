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
    .f-row textarea { width:100%; padding:9px 12px; border:1px solid #e5e7eb; border-radius:9px; font-size:13.5px; color:#111827; background:#fff; outline:none; transition:border-color .15s,box-shadow .15s; font-family:inherit; }
    .f-row input:focus,
    .f-row textarea:focus { border-color:#3f9087; box-shadow:0 0 0 3px rgba(63,144,135,.12); }
    .f-row textarea { resize:vertical; min-height:80px; line-height:1.6; }
    .f-row .hint   { font-size:11.5px; color:#9ca3af; margin-top:5px; }
    .f-row.error input,
    .f-row.error textarea { border-color:#dc2626; }
    .f-error       { font-size:12px; color:#dc2626; margin-top:4px; }

    /* Image upload */
    .img-upload   { border:2px dashed #e5e7eb; border-radius:12px; padding:24px; text-align:center; cursor:pointer; transition:all .2s; position:relative; }
    .img-upload:hover { border-color:#3f9087; background:#f8fffe; }
    .img-upload input { position:absolute; inset:0; opacity:0; cursor:pointer; width:100%; height:100%; }
    .img-preview  { width:100%; height:220px; object-fit:cover; border-radius:10px; display:block; margin-bottom:12px; }
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
</style>

<form method="POST"
      action="{{ $action }}"
      enctype="multipart/form-data"
      id="gallery-form">
    @csrf
    @if($method !== 'POST') @method($method) @endif

    <div class="form-grid">

        {{-- ── Left: image upload ── --}}
        <div>
            <div class="form-card">
                <h3>
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                    </svg>
                    Photo {{ $image ? '' : '*' }}
                </h3>

                <div class="img-upload" id="img-drop" onclick="document.getElementById('image-input').click()">
                    @if($image?->image_path)
                        <img src="{{ Storage::url($image->image_path) }}"
                             alt="{{ $image->title ?? 'Gallery image' }}"
                             class="img-preview" id="img-preview">
                        <p style="font-size:12px;color:#9ca3af;margin-top:8px;">Click to replace image</p>
                    @else
                        <div id="img-placeholder-ui">
                            <div class="img-placeholder">
                                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                                </svg>
                            </div>
                            <p><strong>Click to upload</strong> photo</p>
                            <p style="font-size:12px;margin-top:4px;">WebP, JPG, PNG — max 4 MB</p>
                        </div>
                    @endif
                    <input type="file" id="image-input" name="image"
                           accept="image/webp,image/jpeg,image/png"
                           onchange="previewImage(this)">
                </div>
                @error('image')<p class="f-error" style="margin-top:6px;">{{ $message }}</p>@enderror
            </div>
        </div>

        {{-- ── Right: details + settings ── --}}
        <div>
            <div class="form-card">
                <h3>
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/>
                    </svg>
                    Image Details
                </h3>

                <div class="f-row {{ $errors->has('title') ? 'error' : '' }}">
                    <label>Title</label>
                    <input type="text" name="title"
                           value="{{ old('title', $image?->title) }}"
                           placeholder="e.g. Quran Class 2024">
                    <p class="hint">Optional — displayed below the image.</p>
                    @error('title')<p class="f-error">{{ $message }}</p>@enderror
                </div>

                <div class="f-row {{ $errors->has('caption') ? 'error' : '' }}">
                    <label>Caption</label>
                    <textarea name="caption" rows="3"
                              placeholder="Short description of this photo…">{{ old('caption', $image?->caption) }}</textarea>
                    @error('caption')<p class="f-error">{{ $message }}</p>@enderror
                </div>

                <div class="f-row {{ $errors->has('order') ? 'error' : '' }}">
                    <label>Display Order</label>
                    <input type="number" name="order" min="0"
                           value="{{ old('order', $image?->order ?? 0) }}"
                           placeholder="0">
                    <p class="hint">Lower numbers appear first. Default is 0.</p>
                    @error('order')<p class="f-error">{{ $message }}</p>@enderror
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
                            <div class="toggle-sub">Show this photo in the gallery</div>
                        </div>
                        <label class="toggle">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" value="1"
                                   {{ old('is_active', $image?->is_active ?? true) ? 'checked' : '' }}>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">{{ $btnText }}</button>
                <a href="{{ route('admin.gallery.index') }}" class="btn-cancel">Cancel</a>
            </div>
        </div>
    </div>
</form>

<script>
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
