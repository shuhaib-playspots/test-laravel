@extends('layouts.admin')

@section('title', 'Dashboard')
@section('subtitle', 'Welcome back, ' . Auth::user()->name)

@section('content')

<style>
    .dash-stats   { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 18px; margin-bottom: 28px; }
    .dash-card    { padding: 22px 24px; border-radius: 14px; background: #fff; box-shadow: 0 1px 4px rgba(0,0,0,.06), 0 4px 16px rgba(0,0,0,.04); display: flex; align-items: center; gap: 18px; }
    .dash-icon    { width: 52px; height: 52px; border-radius: 14px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    .dash-icon svg { width: 26px; height: 26px; }
    .dash-num     { font-size: 28px; font-weight: 800; line-height: 1; }
    .dash-label   { font-size: 12.5px; color: #6b7280; margin-top: 4px; font-weight: 500; }
    .dash-quick   { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 18px; }
    .quick-card   { padding: 22px 24px; border-radius: 14px; background: #fff; box-shadow: 0 1px 4px rgba(0,0,0,.06), 0 4px 16px rgba(0,0,0,.04); }
    .quick-title  { font-size: 14px; font-weight: 700; color: #111827; margin-bottom: 6px; }
    .quick-desc   { font-size: 13px; color: #6b7280; line-height: 1.5; }
    .quick-link   { display: inline-flex; align-items: center; gap: 6px; margin-top: 16px; font-size: 13px; font-weight: 600; color: #3f9087; text-decoration: none; }
    .quick-link:hover { color: #2d6e67; }
    .quick-link svg { width: 14px; height: 14px; }
</style>

{{-- Stats --}}
<div class="dash-stats">
    <div class="dash-card">
        <div class="dash-icon" style="background:#e8f5f4;">
            <svg style="color:#3f9087;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
            </svg>
        </div>
        <div>
            <div class="dash-num" style="color:#3f9087;">{{ $stats['total'] }}</div>
            <div class="dash-label">Total Enquiries</div>
        </div>
    </div>

    <div class="dash-card">
        <div class="dash-icon" style="background:#fffbeb;">
            <svg style="color:#d97706;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <div>
            <div class="dash-num" style="color:#d97706;">{{ $stats['pending'] }}</div>
            <div class="dash-label">Pending Review</div>
        </div>
    </div>

    <div class="dash-card">
        <div class="dash-icon" style="background:#eff6ff;">
            <svg style="color:#2563eb;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.964-7.178z M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
        </div>
        <div>
            <div class="dash-num" style="color:#2563eb;">{{ $stats['reviewed'] }}</div>
            <div class="dash-label">Reviewed</div>
        </div>
    </div>

    <div class="dash-card">
        <div class="dash-icon" style="background:#f0fdf4;">
            <svg style="color:#16a34a;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <div>
            <div class="dash-num" style="color:#16a34a;">{{ $stats['approved'] }}</div>
            <div class="dash-label">Approved</div>
        </div>
    </div>

    <div class="dash-card">
        <div class="dash-icon" style="background:#fef2f2;">
            <svg style="color:#dc2626;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <div>
            <div class="dash-num" style="color:#dc2626;">{{ $stats['rejected'] }}</div>
            <div class="dash-label">Rejected</div>
        </div>
    </div>
</div>

{{-- Quick actions --}}
<div class="dash-quick">
    <div class="quick-card">
        <div class="quick-title">Admission Enquiries</div>
        <div class="quick-desc">Review all submitted admission applications, update their status, and manage the enrolment pipeline.</div>
        <a href="{{ route('admin.admissions.index') }}" class="quick-link">
            View all enquiries
            <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
            </svg>
        </a>
    </div>

    @if($stats['pending'] > 0)
    <div class="quick-card" style="border-left: 4px solid #d97706;">
        <div class="quick-title" style="color:#d97706;">{{ $stats['pending'] }} Pending {{ $stats['pending'] === 1 ? 'Enquiry' : 'Enquiries' }}</div>
        <div class="quick-desc">There {{ $stats['pending'] === 1 ? 'is' : 'are' }} {{ $stats['pending'] }} admission {{ $stats['pending'] === 1 ? 'enquiry' : 'enquiries' }} awaiting your review.</div>
        <a href="{{ route('admin.admissions.index', ['status' => 'pending']) }}" class="quick-link" style="color:#d97706;">
            Review pending
            <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
            </svg>
        </a>
    </div>
    @endif
</div>

@endsection
