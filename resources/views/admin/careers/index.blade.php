@extends('layouts.admin')

@section('title', 'Careers')
@section('subtitle', 'Manage job listings')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/admin-common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/admin-careers-index.css') }}">
@endsection

@section('content')

<div class="page-header">
    <h2>{{ $careers->count() }} listing{{ $careers->count() !== 1 ? 's' : '' }}</h2>
    <a href="{{ route('admin.careers.create') }}" class="add-btn">
        <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
        </svg>
        Add Listing
    </a>
</div>

<div class="table-card">
    @if($careers->isEmpty())
        <div class="admin-empty-state">
            No career listings yet.
            <a href="{{ route('admin.careers.create') }}">Create your first one</a>.
        </div>
    @else
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Department</th>
                        <th>Type</th>
                        <th>Location</th>
                        <th>Deadline</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($careers as $career)
                        @php
                            $daysLeft = $career->deadline ? now()->diffInDays($career->deadline, false) : null;
                        @endphp
                        <tr>
                            <td>
                                <div class="cell-title">{{ $career->title }}</div>
                                @if($career->description)
                                    <div class="cell-desc">{{ Str::limit($career->description, 55) }}</div>
                                @endif
                            </td>
                            <td class="cell-muted">{{ $career->department ?? '—' }}</td>
                            <td>
                                <span class="type-badge type-{{ $career->type }}">
                                    {{ ucfirst(str_replace('-', ' ', $career->type)) }}
                                </span>
                            </td>
                            <td class="cell-muted">{{ $career->location ?? '—' }}</td>
                            <td>
                                @if($career->deadline)
                                    @if($career->isExpired())
                                        <span class="deadline-expired">Expired</span>
                                    @elseif($daysLeft <= 7)
                                        <span class="deadline-text deadline-soon">{{ $career->deadline->format('d M Y') }}<br><span class="deadline-days">({{ $daysLeft }}d left)</span></span>
                                    @else
                                        <span class="deadline-text">{{ $career->deadline->format('d M Y') }}</span>
                                    @endif
                                @else
                                    <span class="deadline-none">No deadline</span>
                                @endif
                            </td>
                            <td>
                                @if($career->isExpired())
                                    <span class="badge-expired">Expired</span>
                                @elseif($career->is_active)
                                    <span class="badge-active">Active</span>
                                @else
                                    <span class="badge-inactive">Inactive</span>
                                @endif
                            </td>
                            <td class="cell-meta">
                                {{ $career->created_at->format('d M Y') }}
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('admin.careers.edit', $career->id) }}" class="act-btn act-edit">
                                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125"/>
                                        </svg>
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.careers.destroy', $career->id) }}"
                                          onsubmit="return confirm('Delete \'{{ addslashes($career->title) }}\'? This cannot be undone.')">
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
