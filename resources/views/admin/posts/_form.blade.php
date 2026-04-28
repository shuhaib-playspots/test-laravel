@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/admin-common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/admin-careers-form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/admin-gallery-form.css') }}">
    <style>
        /* ── Post form: equal 50/50 columns ── */
        .post-form-grid { grid-template-columns: 1fr 1fr; }

        /* ── Compact upload zone ── */
        .post-img-upload { padding: 16px 12px; }
        .post-img-upload .img-placeholder { width: 40px; height: 40px; border-radius: 10px; margin-bottom: 8px; }
        .post-img-upload .img-placeholder svg { width: 20px; height: 20px; }
        .post-img-upload p { font-size: 12.5px; }
        .post-img-upload .img-upload-hint { font-size: 11px; }
        .post-img-upload .img-preview { height: 150px; }

        /* ── Tall caption textarea ── */
        .post-caption-area { min-height: 220px; }

        @media (max-width: 768px) {
            .post-form-grid { grid-template-columns: 1fr; }
            .post-img-upload { padding: 14px 12px; }
            .post-img-upload .img-preview { height: 180px; }
            .post-caption-area { min-height: 160px; }
        }
    </style>
@endpush

<form method="POST"
      action="{{ $action }}"
      enctype="multipart/form-data"
      id="post-form">
    @csrf

    <div class="form-grid post-form-grid">

        {{-- ── Left: image upload ── --}}
        <div>
            <div class="form-card">
                <h3>
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                    </svg>
                    Photo *
                </h3>

                <div class="img-upload post-img-upload" id="img-drop" onclick="document.getElementById('image-input').click()">
                    <div id="img-placeholder-ui">
                        <div class="img-placeholder">
                            <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                            </svg>
                        </div>
                        <p><strong>Click to upload</strong> photo</p>
                        <p class="img-upload-hint">WebP, JPG, PNG — max 4 MB</p>
                    </div>
                    <input type="file" id="image-input" name="image"
                           accept="image/webp,image/jpeg,image/png"
                           onchange="previewImage(this)">
                </div>
                @error('image')<p class="f-error upload-error">{{ $message }}</p>@enderror
            </div>
        </div>

        {{-- ── Right: caption ── --}}
        <div>
            <div class="form-card">
                <h3>
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/>
                    </svg>
                    Post Details
                </h3>

                <div class="f-row {{ $errors->has('caption') ? 'error' : '' }}">
                    <label>Caption</label>
                    <textarea name="caption" rows="10" class="post-caption-area"
                              placeholder="Add a caption for this post…">{{ old('caption') }}</textarea>
                    <p class="hint">Optional — shown below the image in the feed.</p>
                    @error('caption')<p class="f-error">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">Post</button>
                <a href="{{ route('admin.posts.index') }}" class="btn-cancel">Cancel</a>
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
