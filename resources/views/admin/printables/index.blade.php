@extends('layouts.admin')

@section('title', 'Printables')
@section('subtitle', 'Manage downloadable study materials')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/admin-common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/admin-careers-index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/admin-printables-index.css') }}">
@endsection

@section('content')

<div class="page-header">
    <h2>{{ $printables->count() }} material{{ $printables->count() !== 1 ? 's' : '' }}</h2>
    <a href="{{ route('admin.printables.create') }}" class="add-btn">
        <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
        </svg>
        Upload Material
    </a>
</div>

<div class="table-card">
    @if($printables->isEmpty())
        <div class="admin-empty-state">
            No study materials yet.
            <a href="{{ route('admin.printables.create') }}">Upload your first one</a>.
        </div>
    @else
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Cover</th>
                        <th>Title</th>
                        <th>Subject</th>
                        <th>Downloads</th>
                        <th>Status</th>
                        <th>Uploaded</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($printables as $printable)
                        <tr>
                            <td>
                                @if($printable->cover_image)
                                    <img src="{{ Storage::url($printable->cover_image) }}"
                                         alt="{{ $printable->title }}"
                                         class="thumb">
                                @else
                                    <div class="thumb-placeholder">
                                        <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                                        </svg>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="cell-title">{{ $printable->title }}</div>
                                @if($printable->description)
                                    <div class="cell-desc">{{ Str::limit($printable->description, 55) }}</div>
                                @endif
                            </td>
                            <td>
                                @if($printable->subject)
                                    <span class="subject-tag">{{ $printable->subject }}</span>
                                @else
                                    <span class="subject-none">—</span>
                                @endif
                            </td>
                            <td>
                                <div class="dl-count">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"/>
                                    </svg>
                                    {{ number_format($printable->download_count) }}
                                </div>
                            </td>
                            <td>
                                @if($printable->is_active)
                                    <span class="badge-active">Active</span>
                                @else
                                    <span class="badge-inactive">Inactive</span>
                                @endif
                            </td>
                            <td class="cell-meta">
                                {{ $printable->created_at->format('d M Y') }}
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('admin.printables.edit', $printable->id) }}" class="act-btn act-edit">
                                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125"/>
                                        </svg>
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.printables.destroy', $printable->id) }}"
                                          onsubmit="return confirm('Delete \'{{ addslashes($printable->title) }}\'? This cannot be undone.')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="act-btn act-del">
                                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
