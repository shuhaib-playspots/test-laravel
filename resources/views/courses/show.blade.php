<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->name }} &mdash; Nabaath Learning Point</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800,900|amiri:400,700" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root { --brand:#3f9087; --brand-dark:#2d6e67; --brand-light:#e8f5f4; --brand-mid:#5aada3; --gold:#c9a84c; --gold-light:#fdf4e0; }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body { font-family: 'Inter', sans-serif; color: #1a2e2c; overflow-x: hidden; background: #f8fffe; }

        /* Navbar */
        .navbar { position: fixed; top: 0; left: 0; right: 0; z-index: 1000; background: rgba(255,255,255,0.95); backdrop-filter: blur(12px); border-bottom: 1px solid rgba(63,144,135,0.12); transition: box-shadow .3s; }
        .navbar.scrolled { box-shadow: 0 4px 24px rgba(63,144,135,0.15); }
        .nav-inner { max-width: 1200px; margin: 0 auto; padding: 0 24px; display: flex; align-items: center; justify-content: space-between; height: 72px; }
        .nav-logo { display: flex; align-items: center; gap: 10px; text-decoration: none; }
        .nav-logo-icon { width: 42px; height: 42px; border-radius: 12px; background: var(--brand); display: flex; align-items: center; justify-content: center; overflow: hidden; }
        .nav-logo-icon img { width: 100%; height: 100%; object-fit: contain; }
        .nav-logo-text strong { display: block; font-size: 16px; font-weight: 700; color: var(--brand-dark); }
        .nav-logo-text span { font-size: 10px; color: #888; letter-spacing: .5px; text-transform: uppercase; }
        .nav-links { display: flex; align-items: center; gap: 32px; }
        .nav-links a { font-size: 14px; font-weight: 500; color: #4a5568; text-decoration: none; transition: color .2s; }
        .nav-links a:hover { color: var(--brand); }
        .nav-cta { background: var(--brand); color: #fff; padding: 10px 22px; border-radius: 50px; font-size: 14px; font-weight: 600; text-decoration: none; transition: background .2s; box-shadow: 0 4px 14px rgba(63,144,135,0.35); }
        .nav-cta:hover { background: var(--brand-dark); }
        .hamburger { display: none; flex-direction: column; gap: 5px; cursor: pointer; padding: 4px; }
        .hamburger span { width: 24px; height: 2px; background: var(--brand); border-radius: 2px; }

        /* Hero */
        .hero { background: linear-gradient(135deg, #0d3532 0%, #1a5c55 50%, #2d8078 80%, #3f9087 100%); padding: 120px 24px 70px; position: relative; overflow: hidden; }
        .hero-bg-pattern { position: absolute; inset: 0; opacity: .05; background-image: repeating-linear-gradient(45deg,#fff 0,#fff 1px,transparent 0,transparent 50%),repeating-linear-gradient(-45deg,#fff 0,#fff 1px,transparent 0,transparent 50%); background-size: 40px 40px; }
        .hero-orb { position: absolute; border-radius: 50%; background: rgba(255,255,255,0.05); animation: float 8s ease-in-out infinite; }
        .hero-orb-1 { width: 360px; height: 360px; top: -80px; right: -60px; }
        .hero-orb-2 { width: 200px; height: 200px; bottom: -50px; left: -30px; animation-delay: 3s; }
        @keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-16px)} }
        .arabic-deco { position: absolute; font-family: 'Amiri', serif; color: rgba(255,255,255,0.07); font-weight: 700; pointer-events: none; }
        .hero-inner { max-width: 1200px; margin: 0 auto; position: relative; z-index: 2; display: grid; grid-template-columns: 1fr auto; gap: 40px; align-items: center; }
        .hero-breadcrumb { display: flex; align-items: center; gap: 8px; font-size: 12px; color: rgba(255,255,255,0.5); margin-bottom: 16px; }
        .hero-breadcrumb a { color: rgba(255,255,255,0.6); text-decoration: none; }
        .hero-breadcrumb a:hover { color: #7dd3c9; }
        .hero-num { font-size: 11px; font-weight: 700; color: #7dd3c9; letter-spacing: .1em; text-transform: uppercase; margin-bottom: 10px; }
        .hero h1 { font-size: clamp(28px,4.5vw,52px); font-weight: 800; color: #fff; line-height: 1.15; margin-bottom: 14px; }
        .hero-tagline { font-size: 17px; color: rgba(255,255,255,0.7); margin-bottom: 28px; line-height: 1.6; max-width: 540px; }
        .hero-chips { display: flex; gap: 10px; flex-wrap: wrap; }
        .hero-chip { display: inline-flex; align-items: center; gap: 6px; padding: 6px 14px; border-radius: 20px; font-size: 12px; font-weight: 600; }
        .hero-chip svg { width: 13px; height: 13px; }
        .chip-w { background: rgba(255,255,255,0.1); color: rgba(255,255,255,0.85); border: 1px solid rgba(255,255,255,0.15); }
        .hero-side { flex-shrink: 0; }
        .enrol-card { background: rgba(255,255,255,0.1); backdrop-filter: blur(16px); border: 1px solid rgba(255,255,255,0.18); border-radius: 20px; padding: 28px; width: 260px; text-align: center; }
        .enrol-card p { font-size: 13px; color: rgba(255,255,255,0.7); margin-bottom: 16px; line-height: 1.5; }
        .enrol-btn { display: block; background: #fff; color: var(--brand-dark); padding: 13px 20px; border-radius: 12px; font-size: 14px; font-weight: 700; text-decoration: none; transition: all .2s; box-shadow: 0 4px 16px rgba(0,0,0,0.2); margin-bottom: 10px; }
        .enrol-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(0,0,0,0.25); }
        .enrol-btn-outline { display: block; background: transparent; border: 2px solid rgba(255,255,255,0.4); color: #fff; padding: 11px 20px; border-radius: 12px; font-size: 13px; font-weight: 600; text-decoration: none; transition: all .2s; }
        .enrol-btn-outline:hover { background: rgba(255,255,255,0.1); border-color: #fff; }

        /* Content area */
        .content-wrap { max-width: 1200px; margin: 0 auto; padding: 60px 24px; display: grid; grid-template-columns: 1fr 320px; gap: 40px; align-items: start; }

        /* Main column */
        .content-main { display: flex; flex-direction: column; gap: 36px; }

        .content-card { background: #fff; border-radius: 20px; padding: 32px; box-shadow: 0 2px 16px rgba(63,144,135,0.07); border: 1px solid rgba(63,144,135,0.07); }
        .content-card h2 { font-size: 20px; font-weight: 700; color: #1a2e2c; margin-bottom: 16px; display: flex; align-items: center; gap: 10px; }
        .content-card h2 svg { width: 22px; height: 22px; color: var(--brand); flex-shrink: 0; }
        .content-card p { font-size: 15px; color: #5a7270; line-height: 1.8; }

        /* Highlights list */
        .highlights-list { list-style: none; display: flex; flex-direction: column; gap: 12px; }
        .highlights-list li { display: flex; align-items: flex-start; gap: 12px; font-size: 14.5px; color: #374151; line-height: 1.5; }
        .hl-check { width: 22px; height: 22px; border-radius: 50%; background: var(--brand-light); display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 1px; }
        .hl-check svg { width: 13px; height: 13px; color: var(--brand); }

        /* Class types */
        .class-types-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 14px; }
        .ct-card { border-radius: 14px; border: 1px solid rgba(63,144,135,0.12); padding: 20px 16px; text-align: center; }
        .ct-icon { width: 44px; height: 44px; border-radius: 12px; background: var(--brand-light); display: flex; align-items: center; justify-content: center; margin: 0 auto 10px; }
        .ct-icon svg { width: 22px; height: 22px; color: var(--brand); }
        .ct-card h4 { font-size: 13px; font-weight: 700; color: #1a2e2c; margin-bottom: 4px; }
        .ct-card p  { font-size: 11.5px; color: #7a9190; line-height: 1.5; }

        /* Sidebar */
        .content-sidebar { display: flex; flex-direction: column; gap: 20px; }
        .side-card { background: #fff; border-radius: 18px; padding: 24px; box-shadow: 0 2px 16px rgba(63,144,135,0.07); border: 1px solid rgba(63,144,135,0.07); }
        .side-card h3 { font-size: 15px; font-weight: 700; color: #1a2e2c; margin-bottom: 16px; }
        .info-row { display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #f3f4f6; font-size: 13.5px; }
        .info-row:last-child { border-bottom: none; padding-bottom: 0; }
        .info-row span:first-child { color: #6b7280; }
        .info-row span:last-child  { font-weight: 600; color: #1a2e2c; }

        .enrol-side-btn { display: block; background: var(--brand); color: #fff; padding: 14px; border-radius: 12px; text-align: center; font-size: 15px; font-weight: 700; text-decoration: none; transition: background .15s; }
        .enrol-side-btn:hover { background: var(--brand-dark); }
        .enrol-side-btn-out { display: block; background: transparent; border: 2px solid var(--brand); color: var(--brand); padding: 12px; border-radius: 12px; text-align: center; font-size: 14px; font-weight: 600; text-decoration: none; transition: all .15s; margin-top: 10px; }
        .enrol-side-btn-out:hover { background: var(--brand); color: #fff; }

        /* Other courses */
        .other-course-link { display: flex; align-items: center; gap: 10px; padding: 10px 0; border-bottom: 1px solid #f3f4f6; text-decoration: none; color: #374151; font-size: 13.5px; font-weight: 500; transition: color .15s; }
        .other-course-link:last-child { border-bottom: none; padding-bottom: 0; }
        .other-course-link:hover { color: var(--brand); }
        .other-course-link svg { width: 15px; height: 15px; color: var(--brand); margin-left: auto; }

        /* CTA */
        .cta-section { background: linear-gradient(135deg, var(--brand) 0%, var(--brand-dark) 100%); padding: 80px 24px; text-align: center; position: relative; overflow: hidden; }
        .cta-section::before { content: 'نبات'; font-family: 'Amiri', serif; font-size: 200px; color: rgba(255,255,255,0.04); position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%); pointer-events: none; }
        .cta-section h2 { font-size: clamp(24px,4vw,40px); font-weight: 800; color: #fff; margin-bottom: 14px; position: relative; z-index: 1; }
        .cta-section p { font-size: 16px; color: rgba(255,255,255,0.75); margin-bottom: 32px; position: relative; z-index: 1; }
        .cta-btns { display: flex; gap: 16px; justify-content: center; flex-wrap: wrap; position: relative; z-index: 1; }
        .btn-primary { background: #fff; color: var(--brand-dark); padding: 14px 32px; border-radius: 50px; font-size: 15px; font-weight: 700; text-decoration: none; transition: all .2s; box-shadow: 0 8px 24px rgba(0,0,0,0.2); display: inline-flex; align-items: center; gap: 8px; }
        .btn-primary:hover { transform: translateY(-2px); }
        .btn-outline { background: transparent; border: 2px solid rgba(255,255,255,0.5); color: #fff; padding: 14px 28px; border-radius: 50px; font-size: 15px; font-weight: 600; text-decoration: none; transition: all .2s; display: inline-flex; align-items: center; gap: 8px; }
        .btn-outline:hover { background: rgba(255,255,255,0.1); border-color: #fff; }

        /* Footer */
        .footer { background: #0d3532; color: rgba(255,255,255,0.7); padding: 64px 24px 32px; }
        .footer-inner { max-width: 1200px; margin: 0 auto; }
        .footer-top { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 40px; margin-bottom: 48px; }
        .footer-brand strong { display: block; color: #fff; font-size: 18px; margin-bottom: 4px; }
        .footer-brand p { font-size: 13px; line-height: 1.7; margin-top: 12px; }
        .footer-col h4 { color: #fff; font-size: 14px; font-weight: 600; margin-bottom: 16px; }
        .footer-col a { display: block; color: rgba(255,255,255,0.6); text-decoration: none; font-size: 13px; margin-bottom: 10px; transition: color .2s; }
        .footer-col a:hover { color: var(--brand-mid); }
        .footer-bottom { border-top: 1px solid rgba(255,255,255,0.08); padding-top: 24px; display: flex; justify-content: space-between; align-items: center; font-size: 12px; }

        /* Float */
        .float-btn { position: fixed; bottom: 100px; z-index: 999; display: flex; flex-direction: column; align-items: center; gap: 6px; }
        .float-btn.right { right: 24px; } .float-btn.left { left: 24px; }
        .float-circle { width: 56px; height: 56px; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: all .3s; box-shadow: 0 6px 20px rgba(0,0,0,0.2); position: relative; }
        .float-circle.get-started { background: var(--brand); } .float-circle.call-btn { background: #25d366; }
        .float-circle:hover { transform: scale(1.1) translateY(-2px); }
        .float-label { font-size: 10px; font-weight: 600; color: #fff; background: rgba(0,0,0,0.6); padding: 3px 8px; border-radius: 10px; white-space: nowrap; }
        .float-pulse { position: absolute; border-radius: 50%; animation: pulse 2s ease-out infinite; }
        .float-circle.get-started .float-pulse { background: var(--brand); width: 56px; height: 56px; }
        .float-circle.call-btn .float-pulse { background: #25d366; width: 56px; height: 56px; }
        @keyframes pulse { 0%{transform:scale(1);opacity:.7} 100%{transform:scale(2);opacity:0} }

        /* Responsive */
        @media(max-width:1024px) {
            .hero-inner { grid-template-columns: 1fr; }
            .hero-side { display: none; }
            .content-wrap { grid-template-columns: 1fr; }
            .class-types-grid { grid-template-columns: 1fr 1fr; }
            .footer-top { grid-template-columns: 1fr 1fr; }
        }
        @media(max-width:768px) {
            .nav-links,.nav-cta { display: none; }
            .hamburger { display: flex; }
            .class-types-grid { grid-template-columns: 1fr; }
            .footer-top { grid-template-columns: 1fr; }
            .footer-bottom { flex-direction: column; gap: 8px; text-align: center; }
        }
    </style>
</head>
<body>

{{-- Navbar --}}
<nav class="navbar" id="navbar">
    <div class="nav-inner">
        <a href="{{ route('home') }}" class="nav-logo">
            <div class="nav-logo-icon"><img src="{{ asset('images/logo.webp') }}" alt="Nabaath"></div>
            <div class="nav-logo-text">
                <strong>Nabaath</strong>
                <span>Learning Point</span>
            </div>
        </a>
        <div class="nav-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('about') }}">About Us</a>
            <a href="{{ route('courses.index') }}">Courses</a>
            <a href="{{ route('home') }}#programs">Programs</a>
            <a href="{{ route('home') }}#contact">Contact</a>
        </div>
        <a href="{{ route('get-started') }}?program={{ urlencode($course->name) }}" class="nav-cta">Enrol Now</a>
        <div class="hamburger" onclick="toggleMenu()"><span></span><span></span><span></span></div>
    </div>
</nav>

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

{{-- Float --}}
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

<script src="{{ asset('js/common.js') }}"></script>
<script>
    let menuOpen = false;
    function toggleMenu() {
        menuOpen = !menuOpen;
        if (menuOpen) {
            if (!document.getElementById('mobile-menu')) {
                const menu = document.createElement('div');
                menu.id = 'mobile-menu';
                menu.style.cssText = 'position:fixed;top:72px;left:0;right:0;background:#fff;padding:20px 24px;border-bottom:1px solid rgba(63,144,135,0.15);box-shadow:0 8px 24px rgba(63,144,135,0.12);z-index:999;display:flex;flex-direction:column;gap:4px;';
                [['Home','{{ route("home") }}'],['About Us','{{ route("about") }}'],['Courses','{{ route("courses.index") }}'],['Contact','{{ route("home") }}#contact']].forEach(([label,href]) => {
                    const a = document.createElement('a'); a.href = href; a.textContent = label;
                    a.style.cssText = 'padding:12px 0;font-size:15px;font-weight:500;color:#1a2e2c;text-decoration:none;border-bottom:1px solid #f0faf9;';
                    a.onclick = () => { document.getElementById('mobile-menu').remove(); menuOpen = false; };
                    menu.appendChild(a);
                });
                const btn = document.createElement('a');
                btn.href = '{{ route("get-started") }}?program={{ urlencode($course->name) }}';
                btn.textContent = 'Enrol Now';
                btn.style.cssText = 'margin-top:12px;text-align:center;background:#3f9087;color:#fff;padding:12px;border-radius:50px;font-weight:600;font-size:14px;text-decoration:none;';
                menu.appendChild(btn);
                document.body.appendChild(menu);
            }
        } else { const m = document.getElementById('mobile-menu'); if (m) m.remove(); }
    }
</script>
</body>
</html>
