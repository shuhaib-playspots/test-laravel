@extends('layout')

@section('title', $course->name . ' &mdash; Nabaath Learning Point')

@section('css')
<link rel="stylesheet" href="{{ asset('css/common.css') }}">
<link rel="stylesheet" href="{{ asset('css/course-show.css') }}">
@endsection

@section('content')

{{-- Hero --}}
<section class="hero">
    <div class="hero-bg-pattern"></div>
    <div class="hero-orb hero-orb-1"></div>
    <div class="hero-orb hero-orb-2"></div>
    <span class="arabic-deco" style="font-size:200px;right:-30px;top:50%;transform:translateY(-50%);opacity:.05;">{{ str_pad($course->order, 2, '0', STR_PAD_LEFT) }}</span>

    <div class="hero-inner">
        <div>
            <div class="hero-breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="{{ route('courses.index') }}">Courses</a>
                <span>/</span>
                <span style="color:rgba(255,255,255,0.85);">{{ $course->name }}</span>
            </div>
            <div class="hero-num">Course {{ str_pad($course->order, 2, '0', STR_PAD_LEFT) }} of 07</div>
            <h1>{{ $course->name }}</h1>
            <p class="hero-tagline">{{ $course->tagline }}</p>
            <div class="hero-chips">
                <span class="hero-chip chip-w">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/>
                    </svg>
                    {{ $course->level }}
                </span>
                <span class="hero-chip chip-w">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ $course->duration }}
                </span>
                <span class="hero-chip chip-w">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                    </svg>
                    Age {{ $course->age_group }}
                </span>
            </div>
        </div>

        <div class="hero-side">
            <div class="enrol-card">
                <p>Ready to join this course? Submit your enquiry and our team will be in touch, In sha Allah.</p>
                <a href="{{ route('get-started') }}?program={{ urlencode($course->name) }}" class="enrol-btn">
                    Enrol in This Course
                </a>
                <a href="{{ route('courses.index') }}" class="enrol-btn-outline">
                    View All Courses
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Content --}}
<div class="content-wrap">

    {{-- Main content --}}
    <div class="content-main">

        {{-- About this course --}}
        <div class="content-card">
            <h2>
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0118 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                </svg>
                About This Course
            </h2>
            <p>{{ $course->description }}</p>
        </div>

        {{-- What you'll learn --}}
        <div class="content-card">
            <h2>
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                What You'll Learn
            </h2>
            <ul class="highlights-list">
                @foreach ($course->highlights as $point)
                    <li>
                        <div class="hl-check">
                            <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                            </svg>
                        </div>
                        {{ $point }}
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- Class types --}}
        <div class="content-card">
            <h2>
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                </svg>
                Available Class Formats
            </h2>
            @php
                $ctInfo = [
                    'one_on_one' => [
                        'label' => 'One-on-One',
                        'desc'  => 'Private sessions with dedicated individual attention from a qualified Ustadh.',
                        'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>',
                    ],
                    'group' => [
                        'label' => 'Small Group',
                        'desc'  => 'Collaborative group learning in a fun, structured, and supportive environment.',
                        'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>',
                    ],
                    'online' => [
                        'label' => 'Online Live',
                        'desc'  => 'High-quality live sessions from anywhere in the world with real-time interaction.',
                        'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0H3"/>',
                    ],
                ];
            @endphp
            <div class="class-types-grid">
                @foreach ($course->class_types as $type)
                    @if(isset($ctInfo[$type]))
                        <div class="ct-card">
                            <div class="ct-icon">
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    {!! $ctInfo[$type]['icon'] !!}
                                </svg>
                            </div>
                            <h4>{{ $ctInfo[$type]['label'] }}</h4>
                            <p>{{ $ctInfo[$type]['desc'] }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

    </div>

    {{-- Sidebar --}}
    <div class="content-sidebar">

        {{-- Enrol card --}}
        <div class="side-card" style="border-top:4px solid var(--brand);">
            <h3>Join This Course</h3>
            <p style="font-size:13.5px;color:#5a7270;line-height:1.6;margin-bottom:20px;">
                Start your child's journey with {{ $course->name }}. Submit an enquiry and our team
                will reach out to confirm enrolment details.
            </p>
            <a href="{{ route('get-started') }}?program={{ urlencode($course->name) }}" class="enrol-side-btn">
                Enrol Now — It's Free
            </a>
            <a href="{{ route('courses.index') }}" class="enrol-side-btn-out">
                Browse All Courses
            </a>
        </div>

        {{-- Course details --}}
        <div class="side-card">
            <h3>Course Details</h3>
            <div class="info-row">
                <span>Level</span>
                <span>{{ $course->level }}</span>
            </div>
            <div class="info-row">
                <span>Duration</span>
                <span>{{ $course->duration }}</span>
            </div>
            <div class="info-row">
                <span>Age Group</span>
                <span>{{ $course->age_group }}</span>
            </div>
            <div class="info-row">
                <span>Formats</span>
                <span>{{ collect($course->class_types)->map(fn($t) => ['one_on_one'=>'1-on-1','group'=>'Group','online'=>'Online'][$t] ?? $t)->join(', ') }}</span>
            </div>
            <div class="info-row">
                <span>Enrolment</span>
                <span style="color:#16a34a;">Open</span>
            </div>
        </div>

        {{-- Other courses --}}
        <div class="side-card">
            <h3>Other Courses</h3>
            @php
                $otherCourses = \App\Models\Course::active()->where('id', '!=', $course->id)->get();
            @endphp
            @foreach ($otherCourses as $other)
                <a href="{{ route('courses.show', $other->slug) }}" class="other-course-link">
                    {{ $other->name }}
                    <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                    </svg>
                </a>
            @endforeach
        </div>

    </div>
</div>

{{-- CTA --}}
<section class="cta-section">
    <h2>Ready to Begin?</h2>
    <p>Join the Nabaath family and give your child the gift of Islamic knowledge and beautiful character.</p>
    <div class="cta-btns">
        <a href="{{ route('get-started') }}?program={{ urlencode($course->name) }}" class="btn-primary">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/>
            </svg>
            Enrol in {{ $course->name }}
        </a>
        <a href="{{ route('courses.index') }}" class="btn-outline">View All Courses</a>
    </div>
</section>

@include('footer')

{{-- Floating buttons --}}
<div class="float-btn right">
    <a href="{{ route('get-started') }}?program={{ urlencode($course->name) }}" class="float-circle get-started">
        <div class="float-pulse"></div>
        <svg width="22" height="22" fill="none" stroke="#fff" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/>
        </svg>
    </a>
    <span class="float-label">Enrol Now</span>
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
