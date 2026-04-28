@extends('layouts.admin')

@section('title', 'Posts')
@section('subtitle', 'Manage posts feed images')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/admin-common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/admin-gallery-index.css') }}">
@endsection

@section('content')

<div class="page-header">
    <h2>{{ $posts->count() }} post{{ $posts->count() !== 1 ? 's' : '' }}</h2>
    <a href="{{ route('admin.posts.create') }}" class="add-btn">
        <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
        </svg>
        Upload Post
    </a>
</div>

@if($posts->isEmpty())
    <div class="gallery-empty">
        No posts yet.
        <a href="{{ route('admin.posts.create') }}">Upload your first post</a>.
    </div>
@else
    <div class="gallery-grid">
        @foreach($posts as $post)
            <div class="gallery-card">
                <img src="{{ Storage::url($post->image_path) }}"
                     alt="{{ $post->caption ?? 'Post image' }}"
                     class="gallery-thumb">

                <div class="gallery-card-body">
                    @if($post->caption)
                        <div class="gallery-card-caption">{{ Str::limit($post->caption, 80) }}</div>
                    @else
                        <div class="gallery-card-title" style="color:#9ca3af;font-style:italic;">(No caption)</div>
                    @endif

                    <div class="gallery-card-meta">
                        <div class="gallery-badge-group">
                            <span class="order-badge">{{ $post->created_at->format('d M Y') }}</span>
                        </div>
                        <div class="card-actions">
                            <form method="POST" action="{{ route('admin.posts.destroy', $post->id) }}"
                                  onsubmit="return confirm('Delete this post? This cannot be undone.')">
                                @csrf @method('DELETE')
                                <button type="submit" class="act-btn act-del">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                    </svg>
                                    Delete
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
