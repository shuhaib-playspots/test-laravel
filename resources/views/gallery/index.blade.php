@extends('layout')

@section('title', 'Gallery &mdash; Nabaath Learning Point')

@section('css')
<link rel="stylesheet" href="{{ asset('css/common.css') }}">
<link rel="stylesheet" href="{{ asset('css/gallery.css') }}">
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

@include('footer')

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

@endsection
