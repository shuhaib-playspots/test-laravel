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
        .sidebar-logo  { display: flex; align-items: center; gap: 12px; padding: 22px 20px 18px; border-bottom: 1px solid rgba(255,255,255,.07); }
        .sidebar-logo img  { width: 34px; height: 34px; object-fit: contain; border-radius: 8px; }
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
        .nav-sub-item.active { color: #7dd3c9; font-weight: 600; background: rgba(63,144,135,.15); }
        .nav-sub-item.active::before { opacity: 1; background: #7dd3c9; }
    </style>
</head>
<body style="margin:0; background:#f0f2f5;">

<div class="admin-shell">

    {{-- ══ SIDEBAR ══ --}}
    <aside class="sidebar">

        {{-- Logo --}}
        <div class="sidebar-logo">
            <img src="{{ asset('images/logo.webp') }}" alt="{{ config('app.name') }}">
            <div class="sidebar-logo-text">
                <strong>Nabaath</strong>
                <span>Learning Point</span>
            </div>
        </div>

        {{-- Navigation --}}
        @php
            $inAdmissions  = request()->routeIs('admin.admissions.*');
            $inCourses     = request()->routeIs('admin.courses.*');
            $inPrintables  = request()->routeIs('admin.printables.*');
        @endphp
        <div class="sidebar-nav">
            <div class="sidebar-section-label">Menu</div>

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
            <div>
                <div class="topbar-title">@yield('title', 'Dashboard')</div>
                @hasSection('subtitle')
                    <div class="topbar-sub">@yield('subtitle')</div>
                @endif
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
</script>
</body>
</html>
