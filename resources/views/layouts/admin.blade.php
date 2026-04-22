<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') &mdash; {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { font-family: 'Inter', sans-serif; box-sizing: border-box; }

        /* ── Layout shell ── */
        .admin-shell   { display: flex; height: 100vh; overflow: hidden; background: #f0f2f5; }

        /* ── Sidebar ── */
        .sidebar       { width: 260px; flex-shrink: 0; background: #1b2f2e; display: flex; flex-direction: column; overflow: hidden; }
        .sidebar-logo  { display: flex; align-items: center; padding: 10px; }
        .sidebar-logo img  {height: 34px; width:100%;}
        .sidebar-logo-text strong { display: block; font-size: 14px; font-weight: 700; color: #fff; line-height: 1.2; }
        .sidebar-logo-text span   { font-size: 11px; color: rgba(255,255,255,.45); }

        .sidebar-section-label { font-size: 10px; font-weight: 600; letter-spacing: .08em; color: rgba(255,255,255,.3); text-transform: uppercase; padding: 20px 20px 6px; }

        .sidebar-nav   { flex: 1; overflow-y: auto; padding: 8px 12px; }
        .sidebar-nav::-webkit-scrollbar { width: 0; }

        .nav-item      { display: flex; align-items: center; gap: 11px; padding: 10px 12px; border-radius: 10px; color: rgba(255,255,255,.6); font-size: 13.5px; font-weight: 500; text-decoration: none; transition: background .15s, color .15s; margin-bottom: 2px; position: relative; }
        .nav-item:hover { background: rgba(255,255,255,.07); color: #fff; }
        .nav-item.active { background: #3f9087; color: #fff; font-weight: 600; }
        .nav-item svg  { width: 18px; height: 18px; flex-shrink: 0; }
        .nav-badge     { margin-left: auto; background: #d97706; color: #fff; font-size: 10px; font-weight: 700; padding: 1px 7px; border-radius: 20px; }
        .nav-item.active .nav-badge { background: rgba(255,255,255,.25); }

        .sidebar-footer { padding: 14px 12px; border-top: 1px solid rgba(255,255,255,.07); }
        .sidebar-user   { display: flex; align-items: center; gap: 10px; padding: 10px 12px; border-radius: 10px; }
        .sidebar-avatar { width: 34px; height: 34px; border-radius: 50%; background: #3f9087; display: flex; align-items: center; justify-content: center; font-size: 13px; font-weight: 700; color: #fff; flex-shrink: 0; }
        .sidebar-user-info strong { display: block; font-size: 13px; font-weight: 600; color: #fff; }
        .sidebar-user-info span   { font-size: 11px; color: rgba(255,255,255,.4); }

        .sidebar-logout { display: flex; align-items: center; gap: 9px; width: 100%; padding: 9px 12px; border-radius: 10px; background: rgba(255,255,255,.05); border: none; color: rgba(255,255,255,.5); font-size: 12.5px; font-weight: 500; cursor: pointer; transition: background .15s, color .15s; margin-top: 6px; }
        .sidebar-logout:hover { background: rgba(220,38,38,.15); color: #fca5a5; }
        .sidebar-logout svg { width: 15px; height: 15px; flex-shrink: 0; }

        /* ── Main area ── */
        .main-area     { flex: 1; display: flex; flex-direction: column; overflow: hidden; }

        /* ── TopBar ── */
        .topbar        { background: #fff; border-bottom: 1px solid #e8eaed; padding: 0 28px; height: 64px; display: flex; align-items: center; justify-content: space-between; flex-shrink: 0; box-shadow: 0 1px 3px rgba(0,0,0,.06); }
        .topbar-title  { font-size: 18px; font-weight: 700; color: #1a2e2d; }
        .topbar-sub    { font-size: 12px; color: #9ca3af; margin-top: 1px; }
        .topbar-right  { display: flex; align-items: center; gap: 12px; }
        .topbar-chip   { display: flex; align-items: center; gap: 7px; padding: 6px 14px 6px 8px; border-radius: 40px; background: #f0f2f5; border: 1px solid #e5e7eb; }
        .topbar-chip-avatar { width: 28px; height: 28px; border-radius: 50%; background: #3f9087; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 700; color: #fff; }
        .topbar-chip span { font-size: 13px; font-weight: 500; color: #374151; }

        /* ── Page content ── */
        .page-content  { flex: 1; overflow-y: auto; padding: 28px 28px; }
        .page-content::-webkit-scrollbar { width: 6px; }
        .page-content::-webkit-scrollbar-track { background: transparent; }
        .page-content::-webkit-scrollbar-thumb { background: #d1d5db; border-radius: 3px; }

        /* ── MUI-style cards ── */
        .mui-card      { background: #fff; border-radius: 14px; box-shadow: 0 1px 4px rgba(0,0,0,.06), 0 4px 16px rgba(0,0,0,.04); }

        /* ── Accordion nav groups ── */
        .nav-group         { margin-bottom: 2px; }
        .nav-group-toggle  { width: 100%; background: none; border: none; cursor: pointer; display: flex; align-items: center; gap: 11px; padding: 10px 12px; border-radius: 10px; color: rgba(255,255,255,.6); font-size: 13.5px; font-weight: 500; transition: background .15s, color .15s; text-align: left; }
        .nav-group-toggle:hover { background: rgba(255,255,255,.07); color: #fff; }
        .nav-group.open .nav-group-toggle { color: #fff; background: rgba(255,255,255,.05); }
        .nav-group-toggle svg { width: 18px; height: 18px; flex-shrink: 0; }
        .nav-chevron       { margin-left: auto; width: 14px !important; height: 14px !important; transition: transform .22s ease; flex-shrink: 0; }
        .nav-group.open .nav-chevron { transform: rotate(180deg); }
        .nav-group-toggle .nav-badge { margin-left: auto; margin-right: 4px; }

        .nav-submenu       { overflow: hidden; max-height: 0; transition: max-height .25s ease; }
        .nav-group.open .nav-submenu { max-height: 300px; }

        .nav-sub-item      { display: flex; align-items: center; gap: 9px; padding: 7.5px 12px 7.5px 36px; border-radius: 10px; color: rgba(255,255,255,.5); font-size: 13px; font-weight: 500; text-decoration: none; transition: background .15s, color .15s; margin-bottom: 1px; position: relative; }
        .nav-sub-item::before { content: ''; position: absolute; left: 20px; width: 5px; height: 5px; border-radius: 50%; background: currentColor; opacity: .45; }
        .nav-sub-item:hover { background: rgba(255,255,255,.07); color: rgba(255,255,255,.85); }
        .nav-sub-item.active { color: #7dd3c9; font-weight: 600; background:none !important}
        .nav-sub-item.active::before { opacity: 1; background: #7dd3c9; }

        /* ── Hamburger button (hidden on desktop) ── */
        .sidebar-toggle {
            display: none;
            align-items: center;
            justify-content: center;
            width: 40px; height: 40px;
            border: none; background: none; cursor: pointer;
            border-radius: 8px; padding: 8px;
            flex-shrink: 0; margin-right: 6px;
            transition: background .15s;
        }
        .sidebar-toggle:hover { background: #f0f2f5; }
        .sidebar-toggle svg { width: 22px; height: 22px; color: #1a2e2d; }

        /* ── Sidebar backdrop overlay ── */
        .sidebar-backdrop {
            position: fixed; inset: 0;
            background: rgba(0,0,0,.45);
            z-index: 998;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: opacity .3s ease, visibility .3s ease;
        }
        .sidebar-backdrop.active {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }

        /* ════════════════════════════════
           MOBILE RESPONSIVE  (≤ 768px)
           ════════════════════════════════ */
        @media (max-width: 768px) {

            /* Show hamburger */
            .sidebar-toggle { display: flex; }

            /* Sidebar becomes a fixed slide-in drawer */
            .sidebar {
                position: fixed;
                top: 0; left: 0; bottom: 0;
                z-index: 999;
                transform: translateX(-100%);
                transition: transform .3s cubic-bezier(.4,0,.2,1);
                box-shadow: none;
                width: 260px;
            }
            .sidebar.open {
                transform: translateX(0);
                box-shadow: 4px 0 24px rgba(0,0,0,.25);
            }

            /* Main area takes full width — no sidebar offset */
            .main-area { width: 100%; }

            /* Admin shell fills full screen height on mobile */
            .admin-shell { height: 100dvh; }

            /* Page content must scroll freely on mobile */
            .page-content {
                padding: 16px 14px;
                overflow-y: auto;
                -webkit-overflow-scrolling: touch;
            }

            /* TopBar adjustments */
            .topbar {
                padding: 0 14px;
                height: 56px;
            }
            .topbar-title { font-size: 15px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
            .topbar-sub { font-size: 11px; }

            /* Hide user chip name text on small screens, show avatar only */
            .topbar-chip span { display: none; }
            .topbar-chip { padding: 5px; border-radius: 50%; gap: 0; }
        }

        /* Tablet (769px – 1024px) */
        @media (min-width: 769px) and (max-width: 1024px) {
            .sidebar { width: 220px; }
            .topbar { padding: 0 20px; }
            .page-content { padding: 20px; }
        }
    </style>
</head>
<body style="margin:0; background:#f0f2f5;">

{{-- Sidebar backdrop (mobile) --}}
<div class="sidebar-backdrop" id="sidebar-backdrop" onclick="closeSidebar()"></div>

<div class="admin-shell">

    {{-- ══ SIDEBAR ══ --}}
    <aside class="sidebar">

        {{-- Logo --}}
        <div class="sidebar-logo">
            <img src="{{ asset('images/logo-white.png') }}" alt="Nabaath">
        </div>

        {{-- Navigation --}}
        @php
            $inAdmissions  = request()->routeIs('admin.admissions.*');
            $inCourses     = request()->routeIs('admin.courses.*');
            $inPrintables  = request()->routeIs('admin.printables.*');
            $inGallery     = request()->routeIs('admin.gallery.*');
            $inCareers     = request()->routeIs('admin.careers.*');
        @endphp
        <div class="sidebar-nav">

            {{-- Dashboard --}}
            <a href="{{ route('admin.dashboard') }}"
               class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/>
                </svg>
                Dashboard
            </a>

            {{-- Enquiries accordion --}}
            <div class="nav-group {{ $inAdmissions ? 'open' : '' }}" id="group-enquiries">
                <button type="button" class="nav-group-toggle" onclick="toggleGroup('group-enquiries')">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25z"/>
                    </svg>
                    Enquiries
                    @if(isset($stats) && $stats['pending'] > 0)
                        <span class="nav-badge">{{ $stats['pending'] }}</span>
                    @endif
                    <svg class="nav-chevron" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                    </svg>
                </button>
                <div class="nav-submenu">
                    <a href="{{ route('admin.admissions.index') }}"
                       class="nav-sub-item {{ $inAdmissions ? 'active' : '' }}">
                        All Enquiries
                    </a>
                </div>
            </div>

            {{-- Printables accordion --}}
            <div class="nav-group {{ $inPrintables ? 'open' : '' }}" id="group-printables">
                <button type="button" class="nav-group-toggle" onclick="toggleGroup('group-printables')">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"/>
                    </svg>
                    Printables
                    <svg class="nav-chevron" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                    </svg>
                </button>
                <div class="nav-submenu">
                    <a href="{{ route('admin.printables.index') }}"
                       class="nav-sub-item {{ request()->routeIs('admin.printables.index') || request()->routeIs('admin.printables.edit') ? 'active' : '' }}">
                        All Materials
                    </a>
                    <a href="{{ route('admin.printables.create') }}"
                       class="nav-sub-item {{ request()->routeIs('admin.printables.create') ? 'active' : '' }}">
                        Upload Material
                    </a>
                </div>
            </div>

            {{-- Gallery accordion --}}
            <div class="nav-group {{ $inGallery ? 'open' : '' }}" id="group-gallery">
                <button type="button" class="nav-group-toggle" onclick="toggleGroup('group-gallery')">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                    </svg>
                    Gallery
                    <svg class="nav-chevron" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                    </svg>
                </button>
                <div class="nav-submenu">
                    <a href="{{ route('admin.gallery.index') }}"
                       class="nav-sub-item {{ request()->routeIs('admin.gallery.index') || request()->routeIs('admin.gallery.edit') ? 'active' : '' }}">
                        All Photos
                    </a>
                    <a href="{{ route('admin.gallery.create') }}"
                       class="nav-sub-item {{ request()->routeIs('admin.gallery.create') ? 'active' : '' }}">
                        Upload Photo
                    </a>
                </div>
            </div>

            {{-- Careers accordion --}}
            <div class="nav-group {{ $inCareers ? 'open' : '' }}" id="group-careers">
                <button type="button" class="nav-group-toggle" onclick="toggleGroup('group-careers')">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z"/>
                    </svg>
                    Careers
                    <svg class="nav-chevron" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                    </svg>
                </button>
                <div class="nav-submenu">
                    <a href="{{ route('admin.careers.index') }}"
                       class="nav-sub-item {{ request()->routeIs('admin.careers.index') || request()->routeIs('admin.careers.edit') ? 'active' : '' }}">
                        All Listings
                    </a>
                    <a href="{{ route('admin.careers.create') }}"
                       class="nav-sub-item {{ request()->routeIs('admin.careers.create') ? 'active' : '' }}">
                        Add Listing
                    </a>
                </div>
            </div>

            {{-- Courses accordion --}}
            <div class="nav-group {{ $inCourses ? 'open' : '' }}" id="group-courses">
                <button type="button" class="nav-group-toggle" onclick="toggleGroup('group-courses')">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"/>
                    </svg>
                    Courses
                    <svg class="nav-chevron" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                    </svg>
                </button>
                <div class="nav-submenu">
                    <a href="{{ route('admin.courses.index') }}"
                       class="nav-sub-item {{ request()->routeIs('admin.courses.index') || request()->routeIs('admin.courses.edit') ? 'active' : '' }}">
                        All Courses
                    </a>
                    <a href="{{ route('admin.courses.create') }}"
                       class="nav-sub-item {{ request()->routeIs('admin.courses.create') ? 'active' : '' }}">
                        Add New Course
                    </a>
                </div>
            </div>
        </div>

        {{-- Footer: user + logout --}}
        <div class="sidebar-footer">
            <div class="sidebar-user">
                <div class="sidebar-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="sidebar-user-info">
                    <strong>{{ Auth::user()->name }}</strong>
                    <span>Administrator</span>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="sidebar-logout">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"/>
                    </svg>
                    Sign Out
                </button>
            </form>
        </div>
    </aside>

    {{-- ══ MAIN AREA ══ --}}
    <div class="main-area">

        {{-- TopBar --}}
        <header class="topbar">
            <div style="display:flex;align-items:center;min-width:0;">
                {{-- Hamburger (mobile only) --}}
                <button class="sidebar-toggle" id="sidebar-toggle" onclick="openSidebar()" aria-label="Open menu">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>
                </button>
                <div style="min-width:0;">
                    <div class="topbar-title">@yield('title', 'Dashboard')</div>
                    @hasSection('subtitle')
                        <div class="topbar-sub">@yield('subtitle')</div>
                    @endif
                </div>
            </div>
            <div class="topbar-right">
                <div class="topbar-chip">
                    <div class="topbar-chip-avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <span>{{ Auth::user()->name }}</span>
                </div>
            </div>
        </header>

        {{-- Page content --}}
        <main class="page-content">
            @if (session('success'))
                <div style="display:flex; align-items:center; gap:10px; padding:12px 16px; border-radius:10px; background:#f0fdf4; border:1px solid #bbf7d0; color:#15803d; font-size:13px; font-weight:500; margin-bottom:22px;">
                    <svg style="width:16px;height:16px;flex-shrink:0;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </main>

    </div>
</div>

<script>
    function toggleGroup(id) {
        document.getElementById(id).classList.toggle('open');
    }

    function openSidebar() {
        document.querySelector('.sidebar').classList.add('open');
        document.getElementById('sidebar-backdrop').classList.add('active');
        // Do NOT lock body scroll — page-content handles its own scroll
    }

    function closeSidebar() {
        document.querySelector('.sidebar').classList.remove('open');
        document.getElementById('sidebar-backdrop').classList.remove('active');
    }

    // Close sidebar when a nav link (not a group toggle) is tapped on mobile
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.nav-item, .nav-sub-item').forEach(function (el) {
            el.addEventListener('click', function () {
                if (window.innerWidth <= 768) {
                    // Small delay so the click registers before sidebar closes
                    setTimeout(closeSidebar, 120);
                }
            });
        });
    });
</script>
</body>
</html>
