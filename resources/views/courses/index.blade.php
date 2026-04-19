<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Courses &mdash; Nabaath Learning Point</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800,900|amiri:400,700" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <style>


        /* ── Hero ── */
        .hero { min-height: 52vh; background: linear-gradient(135deg, #0d3532 0%, #1a5c55 45%, #2d8078 75%, #3f9087 100%); display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden; padding: 120px 24px 80px; }
        .hero-bg-pattern { position: absolute; inset: 0; opacity: .05; background-image: repeating-linear-gradient(45deg,#fff 0,#fff 1px,transparent 0,transparent 50%),repeating-linear-gradient(-45deg,#fff 0,#fff 1px,transparent 0,transparent 50%); background-size: 40px 40px; }
        .hero-orb { position: absolute; border-radius: 50%; background: rgba(255,255,255,0.05); animation: float 8s ease-in-out infinite; }
        .hero-orb-1 { width: 400px; height: 400px; top: -100px; right: -80px; }
        .hero-orb-2 { width: 250px; height: 250px; bottom: -60px; left: -40px; animation-delay: 3s; }
        @keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-18px)} }
        .arabic-letter { position: absolute; font-family: 'Amiri', serif; color: rgba(255,255,255,0.1); font-weight: 700; animation: floatLetter 10s ease-in-out infinite; pointer-events: none; }
        @keyframes floatLetter { 0%,100%{transform:translateY(0) rotate(0deg)} 50%{transform:translateY(-12px) rotate(4deg)} }
        .hero-content { position: relative; z-index: 2; text-align: center; max-width: 720px; }
        .hero-badge { display: inline-flex; align-items: center; gap: 8px; background: rgba(201,168,76,0.2); border: 1px solid rgba(201,168,76,0.4); color: #f0d080; padding: 6px 16px; border-radius: 50px; font-size: 12px; font-weight: 600; letter-spacing: .5px; text-transform: uppercase; margin-bottom: 20px; }
        .hero-title { font-size: clamp(34px,5.5vw,60px); font-weight: 800; color: #fff; line-height: 1.1; margin-bottom: 20px; }
        .hero-title .accent { color: #7dd3c9; }
        .hero-title .gold { color: #f0d080; }
        .hero-desc { font-size: 17px; line-height: 1.75; color: rgba(255,255,255,0.72); max-width: 560px; margin: 0 auto 32px; }
        .hero-breadcrumb { display: flex; align-items: center; justify-content: center; gap: 8px; font-size: 13px; color: rgba(255,255,255,0.5); }
        .hero-breadcrumb a { color: rgba(255,255,255,0.6); text-decoration: none; }
        .hero-breadcrumb a:hover { color: #7dd3c9; }

        /* ── Section base ── */
        .section { padding: 80px 24px; }
        .section-inner { max-width: 1200px; margin: 0 auto; }

        /* ── Course grid ── */
        .courses-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 28px; }

        .course-card {
            background: #fff; border-radius: 22px;
            box-shadow: 0 2px 16px rgba(63,144,135,0.07);
            border: 1px solid rgba(63,144,135,0.08);
            overflow: hidden; display: flex; flex-direction: column;
            transition: transform .3s, box-shadow .3s;
            position: relative;
        }
        .course-card:hover { transform: translateY(-6px); box-shadow: 0 16px 48px rgba(63,144,135,0.16); }

        .course-card-top {
            background: linear-gradient(135deg, #0d3532 0%, #1a5c55 60%, #2d8078 100%);
            padding: 28px 28px 24px; position: relative; overflow: hidden;
        }
        .course-card-top::before {
            content: attr(data-arabic); font-family: 'Amiri', serif;
            font-size: 80px; color: rgba(255,255,255,0.06);
            position: absolute; right: 16px; bottom: -10px; line-height: 1;
        }
        .course-num {
            display: inline-flex; align-items: center; justify-content: center;
            width: 40px; height: 40px; border-radius: 12px;
            background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.15);
            font-size: 15px; font-weight: 800; color: #7dd3c9;
            margin-bottom: 14px; position: relative; z-index: 1;
        }
        .course-card-top h3 { font-size: 18px; font-weight: 700; color: #fff; margin-bottom: 6px; position: relative; z-index: 1; line-height: 1.3; }
        .course-card-top p  { font-size: 13px; color: rgba(255,255,255,0.65); line-height: 1.5; position: relative; z-index: 1; }

        .course-meta {
            display: flex; gap: 8px; flex-wrap: wrap;
            padding: 14px 20px; background: #f8fffe;
            border-bottom: 1px solid rgba(63,144,135,0.07);
        }
        .meta-chip {
            display: inline-flex; align-items: center; gap: 5px;
            font-size: 11px; font-weight: 600; padding: 4px 10px; border-radius: 20px;
        }
        .meta-chip svg { width: 12px; height: 12px; flex-shrink: 0; }
        .chip-level    { background: var(--brand-light); color: var(--brand); }
        .chip-duration { background: var(--gold-light); color: var(--gold); }
        .chip-age      { background: #eff6ff; color: #2563eb; }

        .course-body { padding: 20px 24px; flex: 1; display: flex; flex-direction: column; gap: 16px; }
        .course-desc { font-size: 13.5px; color: #5a7270; line-height: 1.7; }

        .class-types { display: flex; gap: 6px; flex-wrap: wrap; }
        .class-type-badge {
            font-size: 11px; font-weight: 600; padding: 3px 10px; border-radius: 20px;
            background: #f3f4f6; color: #4b5563;
        }

        .course-actions {
            display: flex; gap: 10px; margin-top: auto; padding-top: 4px;
        }
        .btn-details {
            flex: 1; padding: 10px 0; border-radius: 10px; text-align: center;
            font-size: 13px; font-weight: 600; text-decoration: none;
            border: 2px solid var(--brand); color: var(--brand);
            transition: background .15s, color .15s;
        }
        .btn-details:hover { background: var(--brand); color: #fff; }
        .btn-enrol {
            flex: 1; padding: 10px 0; border-radius: 10px; text-align: center;
            font-size: 13px; font-weight: 600; text-decoration: none;
            background: var(--brand); color: #fff;
            transition: background .15s;
        }
        .btn-enrol:hover { background: var(--brand-dark); }

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
        @media(max-width:1024px) { .courses-grid { grid-template-columns: repeat(2, 1fr); } .footer-top { grid-template-columns: 1fr 1fr; } }
        @media(max-width:768px)  { .nav-links,.nav-cta { display: none; } .hamburger { display: flex; } .courses-grid { grid-template-columns: 1fr; } .footer-top { grid-template-columns: 1fr; } .footer-bottom { flex-direction: column; gap: 8px; text-align: center; } }
    </style>
</head>
<body>

@include('nav-bar')

{{-- Hero --}}
<section class="hero">
    <div class="hero-bg-pattern"></div>
    <div class="hero-orb hero-orb-1"></div>
    <div class="hero-orb hero-orb-2"></div>
    <span class="arabic-letter" style="font-size:72px;top:18%;left:5%;animation-delay:0s;">ع</span>
    <span class="arabic-letter" style="font-size:52px;top:65%;left:4%;animation-delay:2s;">ل</span>
    <span class="arabic-letter" style="font-size:64px;top:22%;right:5%;animation-delay:1s;">م</span>
    <span class="arabic-letter" style="font-size:44px;bottom:18%;right:7%;animation-delay:3s;">ق</span>

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

</body>
</html>
