@extends('layouts.admin')

@section('title', 'Courses')
@section('subtitle', 'Manage all published courses')

@section('content')
<style>
    .page-header   { display:flex; align-items:center; justify-content:space-between; margin-bottom:24px; }
    .page-header h2 { font-size:16px; font-weight:600; color:#374151; }
    .add-btn       { display:inline-flex; align-items:center; gap:7px; padding:9px 18px; border-radius:10px; background:#3f9087; color:#fff; font-size:13px; font-weight:600; text-decoration:none; transition:background .15s; }
    .add-btn:hover { background:#2d6e67; }
    .add-btn svg   { width:15px; height:15px; }

    .table-card    { background:#fff; border-radius:14px; box-shadow:0 1px 4px rgba(0,0,0,.06),0 4px 16px rgba(0,0,0,.04); overflow:hidden; }
    .table-wrap    { overflow-x:auto; }
    table          { width:100%; border-collapse:collapse; font-size:13.5px; }
    thead tr       { background:#f8fffe; border-bottom:2px solid #f0f2f5; }
    thead th       { padding:13px 16px; text-align:left; font-size:11px; font-weight:700; color:#9ca3af; text-transform:uppercase; letter-spacing:.07em; white-space:nowrap; }
    tbody tr       { border-bottom:1px solid #f3f4f6; transition:background .1s; }
    tbody tr:last-child { border-bottom:none; }
    tbody tr:hover { background:#f9fffe; }
    tbody td       { padding:14px 16px; vertical-align:middle; }

    .course-thumb  { width:52px; height:38px; border-radius:8px; object-fit:cover; background:#e8f5f4; display:block; }
    .thumb-placeholder { width:52px; height:38px; border-radius:8px; background:linear-gradient(135deg,#1a5c55,#3f9087); display:flex; align-items:center; justify-content:center; font-size:10px; font-weight:700; color:rgba(255,255,255,0.6); }

    .badge-active   { display:inline-flex; align-items:center; gap:5px; padding:3px 10px; border-radius:20px; font-size:11.5px; font-weight:600; background:#f0fdf4; color:#16a34a; }
    .badge-inactive { display:inline-flex; align-items:center; gap:5px; padding:3px 10px; border-radius:20px; font-size:11.5px; font-weight:600; background:#f3f4f6; color:#6b7280; }
    .badge-active::before, .badge-inactive::before { content:''; width:6px; height:6px; border-radius:50%; background:currentColor; opacity:.7; }

    .actions       { display:flex; align-items:center; gap:6px; }
    .act-btn       { display:inline-flex; align-items:center; gap:5px; padding:6px 12px; border-radius:8px; font-size:12px; font-weight:600; text-decoration:none; border:none; cursor:pointer; transition:all .15s; }
    .act-edit      { background:#eff6ff; color:#2563eb; }
    .act-edit:hover { background:#dbeafe; }
    .act-del       { background:#fef2f2; color:#dc2626; }
    .act-del:hover { background:#fee2e2; }
    .act-btn svg   { width:13px; height:13px; }
    .act-view      { background:#f0fdf4; color:#16a34a; }
    .act-view:hover { background:#dcfce7; }
</style>

<div class="page-header">
    <h2>{{ $courses->count() }} course{{ $courses->count() !== 1 ? 's' : '' }}</h2>
    <a href="{{ route('admin.courses.create') }}" class="add-btn">
        <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
        </svg>
        Add New Course
    </a>
</div>

<div class="table-card">
    @if($courses->isEmpty())
        <div style="text-align:center;padding:60px 20px;color:#9ca3af;font-size:14px;">
            No courses yet.
            <a href="{{ route('admin.courses.create') }}" style="color:#3f9087;font-weight:600;">Create your first course</a>.
        </div>
    @else
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Cover</th>
                        <th>#</th>
                        <th>Course Name</th>
                        <th>Level</th>
                        <th>Duration</th>
                        <th>Age</th>
                        <th>Formats</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <td>
                                @if($course->cover_image)
                                    <img src="{{ Storage::url($course->cover_image) }}"
                                         alt="{{ $course->name }}"
                                         class="course-thumb">
                                @else
                                    <div class="thumb-placeholder">IMG</div>
                                @endif
                            </td>
                            <td style="color:#9ca3af;font-size:12px;font-weight:600;">{{ str_pad($course->order, 2, '0', STR_PAD_LEFT) }}</td>
                            <td>
                                <div style="font-weight:600;color:#111827;">{{ $course->name }}</div>
                                <div style="font-size:12px;color:#9ca3af;margin-top:2px;">{{ Str::limit($course->tagline, 50) }}</div>
                            </td>
                            <td style="color:#374151;font-size:13px;">{{ $course->level }}</td>
                            <td style="color:#374151;font-size:13px;white-space:nowrap;">{{ $course->duration }}</td>
                            <td style="color:#374151;font-size:13px;">{{ $course->age_group }}</td>
                            <td>
                                @php $labels = ['one_on_one'=>'1-on-1','group'=>'Group','online'=>'Online']; @endphp
                                <div style="display:flex;gap:4px;flex-wrap:wrap;">
                                    @foreach($course->class_types as $t)
                                        <span style="font-size:11px;font-weight:600;padding:2px 8px;border-radius:20px;background:#f3f4f6;color:#4b5563;">
                                            {{ $labels[$t] ?? $t }}
                                        </span>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                @if($course->is_active)
                                    <span class="badge-active">Active</span>
                                @else
                                    <span class="badge-inactive">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('courses.show', $course->slug) }}" target="_blank" class="act-btn act-view">
                                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/>
                                        </svg>
                                        View
                                    </a>
                                    <a href="{{ route('admin.courses.edit', $course->id) }}" class="act-btn act-edit">
                                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125"/>
                                        </svg>
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.courses.destroy', $course->id) }}"
                                          onsubmit="return confirm('Delete \'{{ addslashes($course->name) }}\'? This cannot be undone.')">
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
