@extends('layout')

@section('title', 'Free Printables &mdash; Nabaath Learning Point')

@section('css')
<link rel="stylesheet" href="{{ asset('css/common.css') }}">
<link rel="stylesheet" href="{{ asset('css/printables.css') }}">
@endsection

@section('content')

{{-- Hero --}}
<section class="hero" style="background: linear-gradient(135deg, rgba(13,53,50,0.80) 0%, rgba(63,144,135,0.65) 100%), url('{{ asset('images/img2.webp') }}') center/cover no-repeat;">
    <div class="hero-bg-pattern"></div>
    <div class="hero-orb hero-orb-1"></div>
    <div class="hero-orb hero-orb-2"></div>
    <div class="hero-content">
        <div class="hero-badge">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"/>
            </svg>
            Free Downloads
        </div>
        <h1 class="hero-title">Islamic Study <span class="accent">Printables</span></h1>
        <p class="hero-desc">Download free worksheets, activity sheets, and study materials to support your child's Islamic education at home.</p>
        <div class="hero-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
            <span>Printables</span>
        </div>
    </div>
</section>

{{-- Materials --}}
<section class="section" style="background:#f8fffe;">
    <div class="section-inner">

        @php
            $subjects = $printables->pluck('subject')->filter()->unique()->sort()->values();
            $activeFilter = request('subject');
        @endphp

        @if($subjects->count() > 1)
            <div class="filter-bar">
                <a href="{{ route('printables.index') }}"
                   class="filter-chip {{ !$activeFilter ? 'active' : '' }}">
                    All
                    <span class="filter-count">{{ $printables->count() }}</span>
                </a>
                @foreach($subjects as $subject)
                    @php $count = $printables->where('subject', $subject)->count(); @endphp
                    <a href="{{ route('printables.index', ['subject' => $subject]) }}"
                       class="filter-chip {{ $activeFilter === $subject ? 'active' : '' }}">
                        {{ $subject }}
                        <span class="filter-count">{{ $count }}</span>
                    </a>
                @endforeach
            </div>
        @endif

        @php
            $displayed = $activeFilter
                ? $printables->where('subject', $activeFilter)->values()
                : $printables;
        @endphp

        @if($displayed->isEmpty())
            <div class="empty-state">
                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                </svg>
                <h3>No materials available yet</h3>
                <p>Check back soon — new resources are added regularly.</p>
            </div>
        @else
            <div class="printables-grid">
                @foreach($displayed as $printable)
                    <div class="print-card">
                        <div class="print-cover">
                            @if($printable->cover_image)
                                <img src="{{ Storage::url($printable->cover_image) }}" alt="{{ $printable->title }}">
                            @else
                                <div class="print-cover-placeholder">
                                    <svg fill="none" stroke="currentColor" stroke-width="1.2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                                    </svg>
                                    <span>PDF</span>
                                </div>
                            @endif
                            @if($printable->subject)
                                <span class="print-subject">{{ $printable->subject }}</span>
                            @endif
                        </div>

                        <div class="print-body">
                            <div class="print-title">{{ $printable->title }}</div>
                            @if($printable->description)
                                <div class="print-desc">{{ Str::limit($printable->description, 100) }}</div>
                            @endif

                            <div class="print-footer">
                                <div class="dl-count">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"/>
                                    </svg>
                                    {{ number_format($printable->download_count) }} {{ $printable->download_count === 1 ? 'download' : 'downloads' }}
                                </div>
                                <a href="{{ route('printables.download', $printable->id) }}" class="btn-download">
                                    <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"/>
                                    </svg>
                                    Download PDF
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

{{-- CTA --}}
<section class="cta-section">
    <h2>Ready to Begin Your Child's Journey?</h2>
    <p>Enrol in one of our structured Islamic courses for a complete learning experience.</p>
    <div class="cta-btns">
        <a href="{{ route('courses.index') }}" class="btn-primary">
            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489"/>
            </svg>
            View Courses
        </a>
        <a href="{{ route('get-started') }}" class="btn-outline">
            Get Started Today
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
