<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Careers &mdash; Nabaath Learning Point</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800,900|amiri:400,700" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --brand: #3f9087; --brand-dark: #2d6e67; --brand-light: #e8f5f4;
            --brand-mid: #5aada3; --gold: #c9a84c; --gold-light: #fdf4e0;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body { font-family: 'Inter', sans-serif; color: #1a2e2c; overflow-x: hidden; }

        /* ── Navbar ── */
        .navbar { position: fixed; top: 0; left: 0; right: 0; z-index: 1000; background: rgba(255,255,255,0.95); backdrop-filter: blur(12px); border-bottom: 1px solid rgba(63,144,135,0.12); transition: box-shadow .3s; }
        .navbar.scrolled { box-shadow: 0 4px 24px rgba(63,144,135,0.15); }
        .nav-inner { max-width: 1200px; margin: 0 auto; padding: 0 24px; display: flex; align-items: center; justify-content: space-between; height: 72px; }
        .nav-logo { display: flex; align-items: center; gap: 10px; text-decoration: none; }
        .nav-logo-icon { width: 42px; height: 42px; border-radius: 12px; background: var(--brand); display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(63,144,135,0.35); overflow: hidden; }
        .nav-logo-icon img { width: 100%; height: 100%; object-fit: contain; }
        .nav-logo-text strong { display: block; font-size: 16px; font-weight: 700; color: var(--brand-dark); }
        .nav-logo-text span { font-size: 10px; font-weight: 500; color: #888; letter-spacing: .5px; text-transform: uppercase; }
        .nav-links { display: flex; align-items: center; gap: 32px; }
        .nav-links a { font-size: 14px; font-weight: 500; color: #4a5568; text-decoration: none; transition: color .2s; }
        .nav-links a:hover, .nav-links a.active { color: var(--brand); }
        .nav-cta { background: var(--brand); color: #fff; padding: 10px 22px; border-radius: 50px; font-size: 14px; font-weight: 600; text-decoration: none; transition: background .2s, transform .2s; box-shadow: 0 4px 14px rgba(63,144,135,0.35); }
        .nav-cta:hover { background: var(--brand-dark); transform: translateY(-1px); }
        .hamburger { display: none; flex-direction: column; gap: 5px; cursor: pointer; padding: 4px; }
        .hamburger span { width: 24px; height: 2px; background: var(--brand); border-radius: 2px; }

        /* ── Hero ── */
        .hero { min-height: 48vh; background: linear-gradient(135deg, #0d3532 0%, #1a5c55 45%, #2d8078 75%, #3f9087 100%); display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden; padding: 120px 24px 80px; }
        .hero-bg-pattern { position: absolute; inset: 0; opacity: .05; background-image: repeating-linear-gradient(45deg,#fff 0,#fff 1px,transparent 0,transparent 50%),repeating-linear-gradient(-45deg,#fff 0,#fff 1px,transparent 0,transparent 50%); background-size: 40px 40px; }
        .hero-orb { position: absolute; border-radius: 50%; background: rgba(255,255,255,0.05); animation: float 8s ease-in-out infinite; }
        .hero-orb-1 { width: 400px; height: 400px; top: -100px; right: -80px; }
        .hero-orb-2 { width: 250px; height: 250px; bottom: -60px; left: -40px; animation-delay: 3s; }
        @keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-18px)} }
        .hero-content { position: relative; z-index: 2; text-align: center; max-width: 680px; }
        .hero-badge { display: inline-flex; align-items: center; gap: 8px; background: rgba(201,168,76,0.2); border: 1px solid rgba(201,168,76,0.4); color: #f0d080; padding: 6px 16px; border-radius: 50px; font-size: 12px; font-weight: 600; letter-spacing: .5px; text-transform: uppercase; margin-bottom: 20px; }
        .hero-title { font-size: clamp(30px,5vw,52px); font-weight: 800; color: #fff; line-height: 1.15; margin-bottom: 18px; }
        .hero-title .accent { color: #7dd3c9; }
        .hero-desc { font-size: 16px; line-height: 1.75; color: rgba(255,255,255,0.72); max-width: 540px; margin: 0 auto 28px; }
        .hero-breadcrumb { display: flex; align-items: center; justify-content: center; gap: 8px; font-size: 13px; color: rgba(255,255,255,0.5); }
        .hero-breadcrumb a { color: rgba(255,255,255,0.6); text-decoration: none; }
        .hero-breadcrumb a:hover { color: #7dd3c9; }

        /* ── Section ── */
        .section { padding: 72px 24px; }
        .section-inner { max-width: 860px; margin: 0 auto; }

        /* ── Filter bar ── */
        .filter-bar { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; margin-bottom: 36px; }
        .filter-chip { display: inline-flex; align-items: center; gap: 6px; padding: 7px 16px; border-radius: 50px; font-size: 13px; font-weight: 600; cursor: pointer; border: 1.5px solid #e5e7eb; background: #fff; color: #6b7280; transition: all .2s; text-decoration: none; }
        .filter-chip:hover, .filter-chip.active { background: var(--brand); border-color: var(--brand); color: #fff; }
        .filter-count { font-size: 11px; background: rgba(0,0,0,0.1); padding: 1px 7px; border-radius: 20px; }
        .filter-chip.active .filter-count { background: rgba(255,255,255,0.25); }

        /* ── Job card ── */
        .job-card {
            background: #fff;
            border: 1px solid rgba(63,144,135,0.1);
            border-radius: 18px;
            padding: 28px 32px;
            margin-bottom: 20px;
            box-shadow: 0 2px 14px rgba(63,144,135,0.07);
            transition: transform .25s, box-shadow .25s, border-color .25s;
        }
        .job-card:hover { transform: translateY(-3px); box-shadow: 0 10px 36px rgba(63,144,135,0.14); border-color: rgba(63,144,135,0.25); }

        .job-card-top { display: flex; align-items: flex-start; justify-content: space-between; gap: 16px; margin-bottom: 16px; }
        .job-title { font-size: 19px; font-weight: 700; color: #111827; line-height: 1.3; }
        .job-dept  { font-size: 13px; color: #9ca3af; margin-top: 4px; }

        .job-badges { display: flex; gap: 8px; flex-wrap: wrap; flex-shrink: 0; }
        .badge { display: inline-flex; align-items: center; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; white-space: nowrap; }
        .badge-type-full-time  { background: #eff6ff; color: #2563eb; }
        .badge-type-part-time  { background: #fdf4e0; color: #b45309; }
        .badge-type-contract   { background: #f3e8ff; color: #7c3aed; }
        .badge-type-volunteer  { background: #f0fdf4; color: #16a34a; }

        .job-meta { display: flex; align-items: center; gap: 20px; flex-wrap: wrap; margin-bottom: 16px; }
        .job-meta-item { display: flex; align-items: center; gap: 6px; font-size: 13px; color: #6b7280; }
        .job-meta-item svg { width: 14px; height: 14px; color: var(--brand); flex-shrink: 0; }

        .job-desc { font-size: 14px; line-height: 1.75; color: #4b5563; }

        .job-card-footer { display: flex; align-items: center; justify-content: space-between; margin-top: 24px; padding-top: 20px; border-top: 1px solid #f3f4f6; flex-wrap: wrap; gap: 12px; }
        .deadline-info { font-size: 12.5px; color: #9ca3af; display: flex; align-items: center; gap: 6px; }
        .deadline-info svg { width: 13px; height: 13px; }
        .deadline-info.soon { color: #d97706; font-weight: 600; }

        .btn-apply { display: inline-flex; align-items: center; gap: 8px; padding: 10px 24px; border-radius: 50px; background: var(--brand); color: #fff; font-size: 14px; font-weight: 600; text-decoration: none; transition: background .2s, transform .2s; box-shadow: 0 4px 14px rgba(63,144,135,0.3); }
        .btn-apply:hover { background: var(--brand-dark); transform: translateY(-1px); }
        .btn-apply svg { width: 15px; height: 15px; }

        /* ── Requirements toggle ── */
        .req-toggle { background: none; border: none; cursor: pointer; font-size: 13px; font-weight: 600; color: var(--brand); display: inline-flex; align-items: center; gap: 5px; margin-top: 10px; padding: 0; transition: color .2s; }
        .req-toggle:hover { color: var(--brand-dark); }
        .req-toggle svg { width: 14px; height: 14px; transition: transform .2s; }
        .req-toggle.open svg { transform: rotate(180deg); }
        .req-body { display: none; margin-top: 12px; padding: 14px 16px; background: #f8fffe; border: 1px solid rgba(63,144,135,0.12); border-radius: 10px; font-size: 13.5px; line-height: 1.75; color: #374151; white-space: pre-line; }
        .req-body.open { display: block; }

        /* ── Empty state ── */
        .empty-state { text-align: center; padding: 80px 20px; color: #9ca3af; }
        .empty-state svg { width: 64px; height: 64px; margin: 0 auto 20px; color: #d1d5db; }
        .empty-state h3 { font-size: 18px; font-weight: 600; color: #6b7280; margin-bottom: 8px; }
        .empty-state p { font-size: 14px; }

        /* ── CTA ── */
        .cta-section { background: linear-gradient(135deg, var(--brand) 0%, var(--brand-dark) 100%); padding: 80px 24px; text-align: center; position: relative; overflow: hidden; }
        .cta-section::before { content: 'نبات'; font-family: 'Amiri', serif; font-size: 200px; color: rgba(255,255,255,0.04); position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%); pointer-events: none; }
        .cta-section h2 { font-size: clamp(26px,4vw,42px); font-weight: 800; color: #fff; margin-bottom: 14px; position: relative; z-index: 1; }
        .cta-section p { font-size: 16px; color: rgba(255,255,255,0.75); margin-bottom: 36px; position: relative; z-index: 1; }
        .cta-btns { display: flex; gap: 16px; justify-content: center; flex-wrap: wrap; position: relative; z-index: 1; }
        .btn-primary { background: #fff; color: var(--brand-dark); padding: 14px 32px; border-radius: 50px; font-size: 15px; font-weight: 700; text-decoration: none; transition: all .2s; box-shadow: 0 8px 24px rgba(0,0,0,0.2); display: inline-flex; align-items: center; gap: 8px; }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 12px 30px rgba(0,0,0,0.3); }
        .btn-outline { background: transparent; border: 2px solid rgba(255,255,255,0.5); color: #fff; padding: 14px 28px; border-radius: 50px; font-size: 15px; font-weight: 600; text-decoration: none; transition: all .2s; display: inline-flex; align-items: center; gap: 8px; }
        .btn-outline:hover { background: rgba(255,255,255,0.1); border-color: #fff; }

        /* ── Footer ── */
        .footer { background: #0d3532; color: rgba(255,255,255,0.7); padding: 64px 24px 32px; }
        .footer-inner { max-width: 1200px; margin: 0 auto; }
        .footer-top { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 40px; margin-bottom: 48px; }
        .footer-brand strong { display: block; color: #fff; font-size: 18px; margin-bottom: 4px; }
        .footer-brand p { font-size: 13px; line-height: 1.7; margin-top: 12px; }
        .footer-col h4 { color: #fff; font-size: 14px; font-weight: 600; margin-bottom: 16px; }
        .footer-col a { display: block; color: rgba(255,255,255,0.6); text-decoration: none; font-size: 13px; margin-bottom: 10px; transition: color .2s; }
        .footer-col a:hover { color: var(--brand-mid); }
        .footer-bottom { border-top: 1px solid rgba(255,255,255,0.08); padding-top: 24px; display: flex; justify-content: space-between; align-items: center; font-size: 12px; }

        /* ── Float ── */
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

        /* ── Responsive ── */
        @media(max-width:768px) {
            .nav-links,.nav-cta { display: none; }
            .hamburger { display: flex; }
            .job-card-top { flex-direction: column; }
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
            <div class="nav-logo-icon">
                <img src="{{ asset('images/logo.webp') }}" alt="Nabaath">
            </div>
            <div class="nav-logo-text">
                <strong>Nabaath</strong>
                <span>Learning Point</span>
            </div>
        </a>
        <div class="nav-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('about') }}">About Us</a>
            <a href="{{ route('courses.index') }}">Courses</a>
            <a href="{{ route('gallery.index') }}">Gallery</a>
            <a href="{{ route('printables.index') }}">Printables</a>
            <a href="{{ route('careers.index') }}" class="active">Careers</a>
            <a href="{{ route('home') }}#contact">Contact</a>
        </div>
        <a href="{{ route('get-started') }}" class="nav-cta">Get Started</a>
        <div class="hamburger" onclick="toggleMenu()"><span></span><span></span><span></span></div>
    </div>
</nav>

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

{{-- Footer --}}
<footer class="footer">
    <div class="footer-inner">
        <div class="footer-top">
            <div class="footer-brand">
                <strong>Nabaath Learning Point</strong>
                <span style="font-family:'Amiri',serif;font-size:18px;color:var(--brand-mid);">نبات</span>
                <p>Nurturing young hearts and minds through authentic Islamic education, one lesson at a time.</p>
            </div>
            <div class="footer-col">
                <h4>Quick Links</h4>
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('about') }}">About Us</a>
                <a href="{{ route('courses.index') }}">Courses</a>
                <a href="{{ route('gallery.index') }}">Gallery</a>
                <a href="{{ route('printables.index') }}">Printables</a>
                <a href="{{ route('careers.index') }}">Careers</a>
            </div>
            <div class="footer-col">
                <h4>Courses</h4>
                <a href="{{ route('courses.index') }}">Quran Recitation</a>
                <a href="{{ route('courses.index') }}">Hifz ul Quran</a>
                <a href="{{ route('courses.index') }}">Tajweed</a>
                <a href="{{ route('courses.index') }}">Arabic Language</a>
                <a href="{{ route('courses.index') }}">Islamic Studies</a>
            </div>
            <div class="footer-col">
                <h4>Contact</h4>
                <a href="tel:+1234567890">+1 234 567 890</a>
                <a href="mailto:info@nabaath.com">info@nabaath.com</a>
                <a href="#">WhatsApp Us</a>
                <a href="#">Facebook</a>
                <a href="#">Instagram</a>
            </div>
        </div>
        <div class="footer-bottom">
            <span>&copy; {{ date('Y') }} Nabaath Learning Point. All rights reserved.</span>
            <span style="font-family:'Amiri',serif;font-size:16px;color:rgba(255,255,255,0.3);">نبات</span>
        </div>
    </div>
</footer>

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

<script>
    window.addEventListener('scroll', () => {
        document.getElementById('navbar').classList.toggle('scrolled', window.scrollY > 20);
    });

    let menuOpen = false;
    function toggleMenu() {
        menuOpen = !menuOpen;
        if (menuOpen) {
            if (!document.getElementById('mobile-menu')) {
                const menu = document.createElement('div');
                menu.id = 'mobile-menu';
                menu.style.cssText = 'position:fixed;top:72px;left:0;right:0;background:#fff;padding:20px 24px;border-bottom:1px solid rgba(63,144,135,0.15);box-shadow:0 8px 24px rgba(63,144,135,0.12);z-index:999;display:flex;flex-direction:column;gap:4px;';
                [
                    ['Home', '{{ route("home") }}'],
                    ['About Us', '{{ route("about") }}'],
                    ['Courses', '{{ route("courses.index") }}'],
                    ['Gallery', '{{ route("gallery.index") }}'],
                    ['Printables', '{{ route("printables.index") }}'],
                    ['Careers', '{{ route("careers.index") }}'],
                    ['Contact', '{{ route("home") }}#contact'],
                ].forEach(([label, href]) => {
                    const a = document.createElement('a');
                    a.href = href; a.textContent = label;
                    a.style.cssText = 'padding:12px 0;font-size:15px;font-weight:500;color:#1a2e2c;text-decoration:none;border-bottom:1px solid #f0faf9;';
                    a.onclick = () => { document.getElementById('mobile-menu').remove(); menuOpen = false; };
                    menu.appendChild(a);
                });
                const btn = document.createElement('a');
                btn.href = '{{ route("get-started") }}'; btn.textContent = 'Get Started';
                btn.style.cssText = 'margin-top:12px;text-align:center;background:#3f9087;color:#fff;padding:12px;border-radius:50px;font-weight:600;font-size:14px;text-decoration:none;';
                menu.appendChild(btn);
                document.body.appendChild(menu);
            }
        } else { const m = document.getElementById('mobile-menu'); if (m) m.remove(); }
    }

    function toggleReq(index) {
        const body = document.getElementById('req-' + index);
        const btn  = body.previousElementSibling;
        body.classList.toggle('open');
        btn.classList.toggle('open');
        btn.querySelector('span') && (btn.querySelector('span').textContent =
            body.classList.contains('open') ? 'Hide Requirements' : 'View Requirements');
    }
</script>
</body>
</html>
