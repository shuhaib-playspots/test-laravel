@extends('layout')

@section('title', 'Our Courses &mdash; Nabaath Learning Point')

@section('css')
<link rel="stylesheet" href="{{ asset('css/common.css') }}">
<link rel="stylesheet" href="{{ asset('css/courses.css') }}">
@endsection

@section('content')

{{-- Hero --}}
<section class="hero" style="background: linear-gradient(135deg, rgba(0,0,0,0.55) 0%, rgba(0,0,0,0.65) 100%), url('{{ asset('images/img2.webp') }}') center/cover no-repeat;">
    <div class="hero-orb hero-orb-1"></div>
    <div class="hero-orb hero-orb-2"></div>
    <span class="arabic-letter" style="font-size:80px;top:20%;left:6%;animation-delay:0s;">ع</span>
    <span class="arabic-letter" style="font-size:56px;top:65%;left:4%;animation-delay:2s;">ل</span>
    <span class="arabic-letter" style="font-size:64px;top:25%;right:5%;animation-delay:1s;">م</span>
    <span class="arabic-letter" style="font-size:48px;bottom:20%;right:7%;animation-delay:3s;">ق</span>

    <div class="hero-content">
        <div class="hero-badge">
            <svg width="12" height="12" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
            </svg>
           Islamic Education Programmes
        </div>
        <h1 class="hero-title">
            Our <span class="accent">7 Courses</span> for<br>
            <span class="gold">Growing Minds</span>
        </h1>
        <p class="hero-desc">
            From Quran recitation to Arabic language and Islamic character-building —
            each course is thoughtfully designed for children at every stage of their learning journey.
        </p>
        <div class="hero-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span>/</span>
            <span style="color:rgba(255,255,255,0.9);">Courses</span>
        </div>
    </div>
</section>

{{-- Courses Grid --}}
<section class="section" style="background:#f8fffe;">
    <div class="section-inner">
        @php
            $arabicNumerals = ['١', '٢', '٣', '٤', '٥', '٦', '٧'];
            $classTypeLabels = ['one_on_one' => 'One-on-One', 'group' => 'Group', 'online' => 'Online'];
        @endphp
        <div class="courses-grid">
            @foreach ($courses as $course)
                <div class="course-card">
                    <div class="course-card-top" data-arabic="{{ $arabicNumerals[$loop->index] ?? '' }}">
                        <div class="course-num">{{ str_pad($course->order, 2, '0', STR_PAD_LEFT) }}</div>
                        <h3>{{ $course->name }}</h3>
                        <p>{{ $course->tagline }}</p>
                    </div>

                    <div class="course-meta">
                        <span class="meta-chip chip-level">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/>
                            </svg>
                            {{ $course->level }}
                        </span>
                        <span class="meta-chip chip-duration">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ $course->duration }}
                        </span>
                        <span class="meta-chip chip-age">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                            </svg>
                            Age {{ $course->age_group }}
                        </span>
                    </div>

                    <div class="course-body">
                        <p class="course-desc">{{ Str::limit($course->description, 140) }}</p>

                        <div class="class-types">
                            @foreach ($course->class_types as $type)
                                <span class="class-type-badge">{{ $classTypeLabels[$type] ?? $type }}</span>
                            @endforeach
                        </div>

                        <div class="course-actions">
                            <a href="{{ route('courses.show', $course->slug) }}" class="btn-details">View Details</a>
                            <a href="{{ route('get-started') }}?program={{ urlencode($course->name) }}" class="btn-enrol">Enrol Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="cta-section">
    <h2>Not Sure Which Course to Choose?</h2>
    <p>Submit an enquiry and our team will guide your child to the perfect programme, In sha Allah.</p>
    <div class="cta-btns">
        <a href="{{ route('get-started') }}" class="btn-primary">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/>
            </svg>
            Submit Enquiry
        </a>
        <a href="{{ route('about') }}" class="btn-outline">Learn About Us</a>
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
