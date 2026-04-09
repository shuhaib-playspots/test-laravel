<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery &mdash; Nabaath Learning Point</title>
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
        .hero-desc { font-size: 16px; line-height: 1.75; color: rgba(255,255,255,0.72); max-width: 520px; margin: 0 auto 28px; }
        .hero-breadcrumb { display: flex; align-items: center; justify-content: center; gap: 8px; font-size: 13px; color: rgba(255,255,255,0.5); }
        .hero-breadcrumb a { color: rgba(255,255,255,0.6); text-decoration: none; }
        .hero-breadcrumb a:hover { color: #7dd3c9; }

        /* ── Section ── */
        .section { padding: 72px 24px; }
        .section-inner { max-width: 1200px; margin: 0 auto; }

        /* ── Gallery grid ── */
        .gallery-grid {
            columns: 4;
            column-gap: 16px;
        }
        .gallery-item {
            break-inside: avoid;
            margin-bottom: 16px;
            border-radius: 14px;
            overflow: hidden;
            cursor: pointer;
            position: relative;
            aspect-ratio: 4 / 3;
            box-shadow: 0 2px 12px rgba(63,144,135,0.08);
            transition: transform .3s, box-shadow .3s;
        }
        .gallery-item:hover { transform: translateY(-4px); box-shadow: 0 12px 36px rgba(63,144,135,0.18); }
        .gallery-item img {
            width: 100%; height: 100%;
            object-fit: cover; display: block;
            transition: transform .4s;
        }
        .gallery-item:hover img { transform: scale(1.06); }

        .gallery-item-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(to top, rgba(13,53,50,0.85) 0%, transparent 60%);
            opacity: 0; transition: opacity .3s;
            display: flex; align-items: flex-end; padding: 16px;
        }
        .gallery-item:hover .gallery-item-overlay { opacity: 1; }
        .gallery-item-info .item-title { font-size: 13px; font-weight: 700; color: #fff; }
        .gallery-item-info .item-caption { font-size: 12px; color: rgba(255,255,255,0.7); margin-top: 3px; }

        .gallery-item-zoom {
            position: absolute; top: 12px; right: 12px;
            width: 36px; height: 36px; border-radius: 50%;
            background: rgba(255,255,255,0.15); backdrop-filter: blur(6px);
            display: flex; align-items: center; justify-content: center;
            opacity: 0; transition: opacity .3s;
        }
        .gallery-item:hover .gallery-item-zoom { opacity: 1; }
        .gallery-item-zoom svg { width: 16px; height: 16px; color: #fff; }

        /* ── Empty state ── */
        .empty-state { text-align: center; padding: 80px 20px; color: #9ca3af; }
        .empty-state svg { width: 64px; height: 64px; margin: 0 auto 20px; color: #d1d5db; }
        .empty-state h3 { font-size: 18px; font-weight: 600; color: #6b7280; margin-bottom: 8px; }
        .empty-state p { font-size: 14px; }

        /* ── Lightbox ── */
        .lightbox {
            display: none; position: fixed; inset: 0; z-index: 9999;
            background: rgba(0,0,0,0.92); backdrop-filter: blur(8px);
            align-items: center; justify-content: center;
        }
        .lightbox.open { display: flex; }
        .lightbox-inner { position: relative; max-width: 90vw; max-height: 90vh; animation: lbIn .25s ease; }
        @keyframes lbIn { from{opacity:0;transform:scale(.93)} to{opacity:1;transform:scale(1)} }
        .lightbox-img { max-width: 90vw; max-height: 80vh; object-fit: contain; border-radius: 12px; display: block; }
        .lightbox-info { margin-top: 16px; text-align: center; }
        .lightbox-title { font-size: 16px; font-weight: 700; color: #fff; }
        .lightbox-caption { font-size: 14px; color: rgba(255,255,255,0.6); margin-top: 4px; }
        .lightbox-close {
            position: fixed; top: 20px; right: 24px;
            width: 44px; height: 44px; border-radius: 50%;
            background: rgba(255,255,255,0.12); border: none; cursor: pointer;
            display: flex; align-items: center; justify-content: center;
            transition: background .2s; color: #fff;
        }
        .lightbox-close:hover { background: rgba(255,255,255,0.22); }
        .lightbox-close svg { width: 20px; height: 20px; }
        .lightbox-nav {
            position: fixed; top: 50%; transform: translateY(-50%);
            width: 48px; height: 48px; border-radius: 50%;
            background: rgba(255,255,255,0.12); border: none; cursor: pointer;
            display: flex; align-items: center; justify-content: center;
            transition: background .2s; color: #fff;
        }
        .lightbox-nav:hover { background: rgba(255,255,255,0.22); }
        .lightbox-nav.prev { left: 20px; }
        .lightbox-nav.next { right: 20px; }
        .lightbox-nav svg { width: 20px; height: 20px; }
        .lightbox-counter { position: fixed; bottom: 24px; left: 50%; transform: translateX(-50%); font-size: 13px; color: rgba(255,255,255,0.5); font-weight: 500; }

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
        @media(max-width:1024px) { .gallery-grid { columns: 3; } .footer-top { grid-template-columns: 1fr 1fr; } }
        @media(max-width:768px)  { .nav-links,.nav-cta { display: none; } .hamburger { display: flex; } .gallery-grid { columns: 2; } .footer-top { grid-template-columns: 1fr; } .footer-bottom { flex-direction: column; gap: 8px; text-align: center; } }
        @media(max-width:480px)  { .gallery-grid { columns: 1; } }
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
            <a href="{{ route('gallery.index') }}" class="active">Gallery</a>
            <a href="{{ route('printables.index') }}">Printables</a>
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
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
            </svg>
            Our Gallery
        </div>
        <h1 class="hero-title">Moments of <span class="accent">Learning</span></h1>
        <p class="hero-desc">Explore photos from our classes, events, and everyday moments at Nabaath Learning Point.</p>
        <div class="hero-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
            <span>Gallery</span>
        </div>
    </div>
</section>

{{-- Gallery --}}
<section class="section" style="background:#f8fffe;">
    <div class="section-inner">

        @if($images->isEmpty())
            <div class="empty-state">
                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                </svg>
                <h3>No photos yet</h3>
                <p>Check back soon — we're adding more photos regularly.</p>
            </div>
        @else
            <div class="gallery-grid" id="gallery-grid">
                @foreach($images as $index => $img)
                    <div class="gallery-item"
                         onclick="openLightbox({{ $index }})"
                         data-index="{{ $index }}">
                        <img src="{{ Storage::url($img->image_path) }}"
                             alt="{{ $img->title ?? 'Gallery photo' }}"
                             loading="lazy">
                        <div class="gallery-item-overlay">
                            @if($img->title || $img->caption)
                                <div class="gallery-item-info">
                                    @if($img->title)
                                        <div class="item-title">{{ $img->title }}</div>
                                    @endif
                                    @if($img->caption)
                                        <div class="item-caption">{{ $img->caption }}</div>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <div class="gallery-item-zoom">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607zM10.5 7.5v6m3-3h-6"/>
                            </svg>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</section>

{{-- CTA --}}
<section class="cta-section">
    <h2>Want to Join Our Community?</h2>
    <p>Enrol your child in one of our structured Islamic courses today.</p>
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

{{-- Lightbox --}}
<div class="lightbox" id="lightbox" onclick="closeLightboxOnBackdrop(event)">
    <button class="lightbox-close" onclick="closeLightbox()">
        <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>
    <button class="lightbox-nav prev" onclick="prevImage()">
        <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/>
        </svg>
    </button>
    <div class="lightbox-inner">
        <img class="lightbox-img" id="lightbox-img" src="" alt="">
        <div class="lightbox-info" id="lightbox-info"></div>
    </div>
    <button class="lightbox-nav next" onclick="nextImage()">
        <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
        </svg>
    </button>
    <div class="lightbox-counter" id="lightbox-counter"></div>
</div>

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
    // Navbar scroll
    window.addEventListener('scroll', () => {
        document.getElementById('navbar').classList.toggle('scrolled', window.scrollY > 20);
    });

    // Mobile menu
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
                    ['Contact', '{{ route("home") }}#contact']
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

    // Lightbox
    @php
        $galleryJson = $images->map(fn($img) => [
            'src'     => Storage::url($img->image_path),
            'title'   => $img->title,
            'caption' => $img->caption,
        ])->values();
    @endphp
    const galleryData = {!! json_encode($galleryJson) !!};

    let currentIndex = 0;

    function openLightbox(index) {
        currentIndex = index;
        renderLightbox();
        document.getElementById('lightbox').classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        document.getElementById('lightbox').classList.remove('open');
        document.body.style.overflow = '';
    }

    function closeLightboxOnBackdrop(e) {
        if (e.target === document.getElementById('lightbox')) closeLightbox();
    }

    function renderLightbox() {
        const item = galleryData[currentIndex];
        document.getElementById('lightbox-img').src = item.src;
        document.getElementById('lightbox-img').alt = item.title || 'Gallery photo';

        let info = '';
        if (item.title)   info += `<div class="lightbox-title">${item.title}</div>`;
        if (item.caption) info += `<div class="lightbox-caption">${item.caption}</div>`;
        document.getElementById('lightbox-info').innerHTML = info;
        document.getElementById('lightbox-counter').textContent = `${currentIndex + 1} / ${galleryData.length}`;
    }

    function prevImage() {
        currentIndex = (currentIndex - 1 + galleryData.length) % galleryData.length;
        renderLightbox();
    }

    function nextImage() {
        currentIndex = (currentIndex + 1) % galleryData.length;
        renderLightbox();
    }

    document.addEventListener('keydown', (e) => {
        const lb = document.getElementById('lightbox');
        if (!lb.classList.contains('open')) return;
        if (e.key === 'Escape')     closeLightbox();
        if (e.key === 'ArrowLeft')  prevImage();
        if (e.key === 'ArrowRight') nextImage();
    });
</script>
</body>
</html>
