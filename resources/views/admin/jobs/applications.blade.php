@extends('layouts.admin')

@section('title', 'Job Applications')
@section('subtitle', 'Review submitted applications')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/admin-common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/admin-careers-index.css') }}">
@endsection

@section('content')

<div class="page-header">
    <h2>{{ $applications->count() }} application{{ $applications->count() !== 1 ? 's' : '' }}</h2>
    <div style="display:flex;gap:10px;align-items:center;">
        <a href="{{ route('admin.jobs.index') }}" class="add-btn" style="background:#6b7280;">
            <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3"/>
            </svg>
            Back to Listings
        </a>
    </div>
</div>

{{-- Filter tabs --}}
<div style="display:flex;gap:8px;margin-bottom:20px;flex-wrap:wrap;">
    @php $filter = request('type', 'all'); @endphp
    <a href="{{ route('admin.jobs.applications') }}"
       style="padding:7px 16px;border-radius:8px;font-size:13px;font-weight:600;text-decoration:none;border:1.5px solid {{ $filter==='all' ? 'var(--brand)' : '#e5e7eb' }};background:{{ $filter==='all' ? 'var(--brand)' : '#fff' }};color:{{ $filter==='all' ? '#fff' : '#6b7280' }};">
        All ({{ $applications->count() }})
    </a>
    <a href="{{ route('admin.jobs.applications', ['type' => 'tutor']) }}"
       style="padding:7px 16px;border-radius:8px;font-size:13px;font-weight:600;text-decoration:none;border:1.5px solid {{ $filter==='tutor' ? 'var(--brand)' : '#e5e7eb' }};background:{{ $filter==='tutor' ? 'var(--brand)' : '#fff' }};color:{{ $filter==='tutor' ? '#fff' : '#6b7280' }};">
        Tutor ({{ $tutorCount }})
    </a>
    <a href="{{ route('admin.jobs.applications', ['type' => 'general']) }}"
       style="padding:7px 16px;border-radius:8px;font-size:13px;font-weight:600;text-decoration:none;border:1.5px solid {{ $filter==='general' ? 'var(--brand)' : '#e5e7eb' }};background:{{ $filter==='general' ? 'var(--brand)' : '#fff' }};color:{{ $filter==='general' ? '#fff' : '#6b7280' }};">
        General ({{ $generalCount }})
    </a>
</div>

<div class="table-card">
    @if($applications->isEmpty())
        <div class="admin-empty-state">No applications yet.</div>
    @else
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Applicant</th>
                        <th>Type</th>
                        <th>Contact</th>
                        <th>City</th>
                        <th>Details</th>
                        <th>Documents</th>
                        <th>Submitted</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $app)
                        <tr>
                            <td>
                                <div class="cell-title">{{ $app->name }}</div>
                                @if($app->age)
                                    <div class="cell-desc">Age: {{ $app->age }}</div>
                                @endif
                                @if($app->education_qualification)
                                    <div class="cell-desc">{{ $app->education_qualification }}</div>
                                @endif
                            </td>
                            <td>
                                <span class="type-badge {{ $app->application_type === 'tutor' ? 'type-full-time' : 'type-part-time' }}">
                                    {{ ucfirst($app->application_type) }}
                                </span>
                            </td>
                            <td>
                                <div class="cell-desc">{{ $app->email }}</div>
                                @if($app->phone)
                                    <div class="cell-desc">{{ $app->phone }}</div>
                                @endif
                                @if($app->whatsapp)
                                    <div class="cell-desc">WA: {{ $app->whatsapp }}</div>
                                @endif
                            </td>
                            <td class="cell-muted">{{ $app->city ?? '—' }}</td>
                            <td>
                                @if($app->application_type === 'tutor')
                                    @if($app->position_type)
                                        <div class="cell-desc">{{ ucfirst(str_replace('-',' ',$app->position_type)) }}</div>
                                    @endif
                                    @if($app->subjects)
                                        <div class="cell-desc">{{ implode(', ', $app->subjects) }}</div>
                                    @endif
                                    @if($app->teaching_hours)
                                        <div class="cell-desc">{{ $app->teaching_hours }}h/day</div>
                                    @endif
                                @endif
                            </td>
                            <td>
                                <div style="display:flex;flex-direction:column;gap:4px;">
                                    @if($app->photograph_path)
                                        <a href="{{ asset('storage/' . $app->photograph_path) }}" target="_blank"
                                           style="font-size:12px;color:var(--brand);font-weight:600;">Photo</a>
                                    @endif
                                    @if($app->resume_path)
                                        <a href="{{ asset('storage/' . $app->resume_path) }}" target="_blank"
                                           style="font-size:12px;color:var(--brand);font-weight:600;">Resume</a>
                                    @endif
                                    @if(!$app->photograph_path && !$app->resume_path)
                                        <span class="cell-muted" style="font-size:12px;">None</span>
                                    @endif
                                </div>
                            </td>
                            <td class="cell-meta">
                                {{ $app->created_at->format('d M Y') }}<br>
                                <span style="font-size:11px;color:#9ca3af;">{{ $app->created_at->diffForHumans() }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

@endsection
