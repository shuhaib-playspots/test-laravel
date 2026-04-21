@extends('layout')

@section('title', 'Careers &mdash; Nabaath Learning Point')

@section('css')
<link rel="stylesheet" href="{{ asset('css/common.css') }}">
<link rel="stylesheet" href="{{ asset('css/careers.css') }}">
@endsection

@section('content')

{{-- Hero --}}
<section class="hero">
    <div class="hero-bg-pattern"></div>
    <div class="hero-orb hero-orb-1"></div>
    <div class="hero-orb hero-orb-2"></div>
    <div class="hero-content">
        <div class="hero-badge">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z"/>
            </svg>
            Join Our Team
        </div>
        <h1 class="hero-title">Open <span class="accent">Positions</span></h1>
        <p class="hero-desc">Be part of a mission-driven team shaping the next generation of Islamic scholars and learners.</p>
        <div class="hero-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
            <span>Careers</span>
        </div>
    </div>
</section>

{{-- Listings --}}
<section class="section" style="background:#f8fffe;">
    <div class="section-inner">

        @php
            $types = $careers->pluck('type')->unique()->sort()->values();
            $activeFilter = request('type');
            $displayed = $activeFilter ? $careers->where('type', $activeFilter)->values() : $careers;
        @endphp

        @if($types->count() > 1)
            <div class="filter-bar">
                <a href="{{ route('careers.index') }}"
                   class="filter-chip {{ !$activeFilter ? 'active' : '' }}">
                    All <span class="filter-count">{{ $careers->count() }}</span>
                </a>
                @foreach($types as $type)
                    <a href="{{ route('careers.index', ['type' => $type]) }}"
                       class="filter-chip {{ $activeFilter === $type ? 'active' : '' }}">
                        {{ ucfirst(str_replace('-', ' ', $type)) }}
                        <span class="filter-count">{{ $careers->where('type', $type)->count() }}</span>
                    </a>
                @endforeach
            </div>
        @endif

        @if($displayed->isEmpty())
            <div class="empty-state">
                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z"/>
                </svg>
                <h3>No open positions right now</h3>
                <p>Check back soon — new roles are posted regularly.</p>
            </div>
        @else
            @foreach($displayed as $i => $career)
                @php $daysLeft = $career->deadline ? now()->diffInDays($career->deadline, false) : null; @endphp
                <div class="job-card">
                    <div class="job-card-top">
                        <div>
                            <div class="job-title">{{ $career->title }}</div>
                            @if($career->department)
                                <div class="job-dept">{{ $career->department }}</div>
                            @endif
                        </div>
                        <div class="job-badges">
                            <span class="badge badge-type-{{ $career->type }}">
                                {{ ucfirst(str_replace('-', ' ', $career->type)) }}
                            </span>
                        </div>
                    </div>

                    <div class="job-meta">
                        @if($career->location)
                            <div class="job-meta-item">
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                                </svg>
                                {{ $career->location }}
                            </div>
                        @endif
                        <div class="job-meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                            </svg>
                            Posted {{ $career->created_at->diffForHumans() }}
                        </div>
                    </div>

                    <div class="job-desc">{{ Str::limit($career->description, 240) }}</div>

                    @if($career->requirements)
                        <button class="req-toggle" onclick="toggleReq({{ $i }})">
                            <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                            </svg>
                            View Requirements
                        </button>
                        <div class="req-body" id="req-{{ $i }}">{{ $career->requirements }}</div>
                    @endif

                    <div class="job-card-footer">
                        @if($career->deadline)
                            <div class="deadline-info {{ $daysLeft !== null && $daysLeft <= 7 ? 'soon' : '' }}">
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Apply by {{ $career->deadline->format('d M Y') }}
                                @if($daysLeft !== null && $daysLeft <= 7 && $daysLeft >= 0)
                                    &mdash; {{ $daysLeft }} day{{ $daysLeft !== 1 ? 's' : '' }} left
                                @endif
                            </div>
                        @else
                            <div class="deadline-info">
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Open until filled
                            </div>
                        @endif

                        <a href="mailto:info@nabaath.com?subject=Application: {{ urlencode($career->title) }}"
                           class="btn-apply">
                            Apply Now
                            <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
</section>

{{-- CTA --}}
<section class="cta-section">
    <h2>Don't See the Right Role?</h2>
    <p>Send us your CV and we'll reach out when a suitable position opens up.</p>
    <div class="cta-btns">
        <a href="mailto:info@nabaath.com?subject=General Application" class="btn-primary">
            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
            </svg>
            Send Your CV
        </a>
        <a href="{{ route('home') }}#contact" class="btn-outline">
            Contact Us
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/>
            </svg>
        </a>
    </div>
</section>

@include('footer')

{{-- Floating buttons --}}
<div class="float-btn right">
    <a href="{{ route('get-started') }}" class="float-circle get-started">
        <div class="float-pulse"></div>
        <svg width="22" height="22" fill="none" stroke="#fff" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/>
        </svg>
    </a>
    <span class="float-label">Get Started</span>
</div>
<div class="float-btn left">
    <a href="tel:+1234567890" class="float-circle call-btn">
        <div class="float-pulse"></div>
        <svg width="22" height="22" fill="none" stroke="#fff" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
        </svg>
    </a>
    <span class="float-label">Call Us</span>
</div>

@endsection
