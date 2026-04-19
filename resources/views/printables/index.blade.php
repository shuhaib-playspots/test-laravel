<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free Printables &mdash; Nabaath Learning Point</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800,900|amiri:400,700" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <style>


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
        .hero-desc { font-size: 16px; line-height: 1.75; color: rgba(255,255,255,0.72); max-width: 520px; margin: 0 auto 28px; }
        .hero-breadcrumb { display: flex; align-items: center; justify-content: center; gap: 8px; font-size: 13px; color: rgba(255,255,255,0.5); }
        .hero-breadcrumb a { color: rgba(255,255,255,0.6); text-decoration: none; }
        .hero-breadcrumb a:hover { color: #7dd3c9; }

        /* ── Section ── */
        .section { padding: 72px 24px; }
        .section-inner { max-width: 1200px; margin: 0 auto; }

        /* ── Filter bar ── */
        .filter-bar { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; margin-bottom: 40px; }
        .filter-chip { display: inline-flex; align-items: center; gap: 6px; padding: 7px 16px; border-radius: 50px; font-size: 13px; font-weight: 600; cursor: pointer; border: 1.5px solid #e5e7eb; background: #fff; color: #6b7280; transition: all .2s; text-decoration: none; }
        .filter-chip:hover, .filter-chip.active { background: var(--brand); border-color: var(--brand); color: #fff; }
        .filter-count { font-size: 11px; background: rgba(0,0,0,0.1); padding: 1px 7px; border-radius: 20px; }
        .filter-chip.active .filter-count { background: rgba(255,255,255,0.25); }

        /* ── Grid ── */
        .printables-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 28px; }

        /* ── Card ── */
        .print-card { background: #fff; border-radius: 20px; box-shadow: 0 2px 16px rgba(63,144,135,0.07); border: 1px solid rgba(63,144,135,0.08); overflow: hidden; display: flex; flex-direction: column; transition: transform .3s, box-shadow .3s; }
        .print-card:hover { transform: translateY(-5px); box-shadow: 0 14px 44px rgba(63,144,135,0.15); }

        .print-cover { position: relative; height: 180px; background: linear-gradient(135deg, #0d3532 0%, #1a5c55 60%, #2d8078 100%); overflow: hidden; }
        .print-cover img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform .4s; }
        .print-card:hover .print-cover img { transform: scale(1.04); }
        .print-cover-placeholder { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; flex-direction: column; gap: 10px; }
        .print-cover-placeholder svg { width: 48px; height: 48px; color: rgba(255,255,255,0.35); }
        .print-cover-placeholder span { font-size: 12px; font-weight: 600; color: rgba(255,255,255,0.4); letter-spacing: .5px; text-transform: uppercase; }

        .print-subject { position: absolute; top: 12px; left: 12px; background: rgba(0,0,0,0.45); backdrop-filter: blur(6px); color: #fff; font-size: 10.5px; font-weight: 700; padding: 4px 10px; border-radius: 20px; letter-spacing: .3px; text-transform: uppercase; }

        .print-body { padding: 20px 22px; flex: 1; display: flex; flex-direction: column; gap: 12px; }
        .print-title { font-size: 16px; font-weight: 700; color: #111827; line-height: 1.35; }
        .print-desc { font-size: 13px; color: #6b7280; line-height: 1.65; flex: 1; }

        .print-footer { display: flex; align-items: center; justify-content: space-between; padding-top: 12px; border-top: 1px solid #f3f4f6; }
        .dl-count { display: inline-flex; align-items: center; gap: 5px; font-size: 12px; font-weight: 600; color: #9ca3af; }
        .dl-count svg { width: 13px; height: 13px; }

        .btn-download { display: inline-flex; align-items: center; gap: 7px; padding: 9px 18px; border-radius: 50px; background: var(--brand); color: #fff; font-size: 13px; font-weight: 600; text-decoration: none; transition: background .2s, transform .2s; box-shadow: 0 3px 10px rgba(63,144,135,0.3); }
        .btn-download:hover { background: var(--brand-dark); transform: translateY(-1px); }
        .btn-download svg { width: 14px; height: 14px; }

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
        @media(max-width:1024px) { .printables-grid { grid-template-columns: repeat(2,1fr); } .footer-top { grid-template-columns: 1fr 1fr; } }
        @media(max-width:768px)  { .nav-links,.nav-cta { display: none; } .hamburger { display: flex; } .printables-grid { grid-template-columns: 1fr; } .footer-top { grid-template-columns: 1fr; } .footer-bottom { flex-direction: column; gap: 8px; text-align: center; } }
    </style>
</head>
<body>

@include('nav-bar')

{{-- Hero --}}
<section class="hero">
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

</body>
</html>
