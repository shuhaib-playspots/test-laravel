@extends('layouts.admin')

@section('title', 'Gallery')
@section('subtitle', 'Manage gallery photos')

@section('content')
<style>
    .page-header   { display:flex; align-items:center; justify-content:space-between; margin-bottom:24px; }
    .page-header h2 { font-size:16px; font-weight:600; color:#374151; }
    .add-btn       { display:inline-flex; align-items:center; gap:7px; padding:9px 18px; border-radius:10px; background:#3f9087; color:#fff; font-size:13px; font-weight:600; text-decoration:none; transition:background .15s; }
    .add-btn:hover { background:#2d6e67; }
    .add-btn svg   { width:15px; height:15px; }

    /* Photo grid */
    .gallery-grid  { display:grid; grid-template-columns:repeat(auto-fill, minmax(220px, 1fr)); gap:18px; }
    .gallery-card  { background:#fff; border-radius:14px; box-shadow:0 1px 4px rgba(0,0,0,.06),0 4px 16px rgba(0,0,0,.04); overflow:hidden; transition:transform .15s, box-shadow .15s; }
    .gallery-card:hover { transform:translateY(-2px); box-shadow:0 4px 12px rgba(0,0,0,.1),0 8px 24px rgba(0,0,0,.06); }

    .gallery-thumb { width:100%; height:160px; object-fit:cover; display:block; }
    .gallery-thumb-placeholder { width:100%; height:160px; background:linear-gradient(135deg,#1a5c55,#3f9087); display:flex; align-items:center; justify-content:center; }
    .gallery-thumb-placeholder svg { width:40px; height:40px; color:rgba(255,255,255,0.5); }

    .gallery-card-body { padding:12px 14px 14px; }
    .gallery-card-title { font-size:13px; font-weight:600; color:#111827; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
    .gallery-card-caption { font-size:12px; color:#9ca3af; margin-top:3px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
    .gallery-card-meta { display:flex; align-items:center; justify-content:space-between; margin-top:10px; }

    .badge-active   { display:inline-flex; align-items:center; gap:5px; padding:2px 8px; border-radius:20px; font-size:11px; font-weight:600; background:#f0fdf4; color:#16a34a; }
    .badge-inactive { display:inline-flex; align-items:center; gap:5px; padding:2px 8px; border-radius:20px; font-size:11px; font-weight:600; background:#f3f4f6; color:#6b7280; }
    .badge-active::before, .badge-inactive::before { content:''; width:5px; height:5px; border-radius:50%; background:currentColor; opacity:.7; }

    .card-actions  { display:flex; gap:5px; }
    .act-btn       { display:inline-flex; align-items:center; gap:4px; padding:5px 10px; border-radius:7px; font-size:11.5px; font-weight:600; text-decoration:none; border:none; cursor:pointer; transition:all .15s; }
    .act-edit      { background:#eff6ff; color:#2563eb; }
    .act-edit:hover { background:#dbeafe; }
    .act-del       { background:#fef2f2; color:#dc2626; }
    .act-del:hover { background:#fee2e2; }
    .act-btn svg   { width:12px; height:12px; }

    .order-badge   { font-size:11px; font-weight:600; color:#9ca3af; background:#f3f4f6; padding:2px 8px; border-radius:20px; }

    .empty-state   { background:#fff; border-radius:14px; box-shadow:0 1px 4px rgba(0,0,0,.06); padding:60px 20px; text-align:center; color:#9ca3af; font-size:14px; }
</style>

<div class="page-header">
    <h2>{{ $images->count() }} photo{{ $images->count() !== 1 ? 's' : '' }}</h2>
    <a href="{{ route('admin.gallery.create') }}" class="add-btn">
        <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
        </svg>
        Upload Photo
    </a>
</div>

@if($images->isEmpty())
    <div class="empty-state">
        No gallery photos yet.
        <a href="{{ route('admin.gallery.create') }}" style="color:#3f9087;font-weight:600;">Upload your first photo</a>.
    </div>
@else
    <div class="gallery-grid">
        @foreach($images as $img)
            <div class="gallery-card">
                @if($img->image_path)
                    <img src="{{ Storage::url($img->image_path) }}"
                         alt="{{ $img->title ?? 'Gallery photo' }}"
                         class="gallery-thumb">
                @else
                    <div class="gallery-thumb-placeholder">
                        <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                        </svg>
                    </div>
                @endif

                <div class="gallery-card-body">
                    <div class="gallery-card-title">{{ $img->title ?: '(No title)' }}</div>
                    @if($img->caption)
                        <div class="gallery-card-caption">{{ $img->caption }}</div>
                    @endif

                    <div class="gallery-card-meta">
                        <div style="display:flex;gap:6px;align-items:center;">
                            @if($img->is_active)
                                <span class="badge-active">Active</span>
                            @else
                                <span class="badge-inactive">Hidden</span>
                            @endif
                            <span class="order-badge">#{{ $img->order }}</span>
                        </div>
                        <div class="card-actions">
                            <a href="{{ route('admin.gallery.edit', $img->id) }}" class="act-btn act-edit">
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125"/>
                                </svg>
                                Edit
                            </a>
                            <form method="POST" action="{{ route('admin.gallery.destroy', $img->id) }}"
                                  onsubmit="return confirm('Delete this photo? This cannot be undone.')">
                                @csrf @method('DELETE')
                                <button type="submit" class="act-btn act-del">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                    </svg>
                                    Del
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection
