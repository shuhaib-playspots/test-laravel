@extends('layout')

@section('title', 'Contact Us &mdash; Nabaath Learning Point')

@section('css')
<link rel="stylesheet" href="{{ asset('css/common.css') }}">
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')

{{-- ── HERO ── --}}
<section class="hero">
    <div class="hero-bg-pattern"></div>
    <div class="hero-orb hero-orb-1"></div>
    <div class="hero-orb hero-orb-2"></div>
    <span class="arabic-letter" style="font-size:80px;top:20%;left:6%;animation-delay:0s;">ن</span>
    <span class="arabic-letter" style="font-size:56px;top:65%;left:4%;animation-delay:2s;">ب</span>
    <span class="arabic-letter" style="font-size:64px;top:25%;right:5%;animation-delay:1s;">ا</span>
    <span class="arabic-letter" style="font-size:48px;bottom:20%;right:7%;animation-delay:3s;">ت</span>

    <div class="hero-content">
        <div class="hero-badge">
            <svg width="12" height="12" fill="currentColor" viewBox="0 0 24 24">
                <path d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
            </svg>
            Get in Touch
        </div>
        <h1 class="hero-title">
            We'd Love to <span class="accent">Hear</span><br>
            From <span class="gold">You</span>
        </h1>
        <p class="hero-desc">
            Have a question about our programmes, want to enrol your child, or simply want to say salaam?
            We're here and happy to help — reach out to us today.
        </p>
        <div class="hero-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span class="sep">/</span>
            <span class="breadcrumb-current">Contact Us</span>
        </div>
    </div>
</section>

{{-- ── CONTACT INFO CARDS ── --}}
<section class="section">
    <div class="section-inner">
        <div class="info-grid">
            <div class="info-card">
                <div class="info-icon">
                    <svg width="26" height="26" fill="none" stroke="#3f9087" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                    </svg>
                </div>
                <h3>Phone</h3>
                <a href="tel:+1234567890">+1 234 567 890</a>
                <p class="info-card-hint">Mon–Fri, 9am–6pm</p>
            </div>

            <div class="info-card">
                <div class="info-icon">
                    <svg width="26" height="26" fill="none" stroke="#c9a84c" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                    </svg>
                </div>
                <h3>Email</h3>
                <a href="mailto:info@nabaath.com">info@nabaath.com</a>
                <p class="info-card-hint">We reply within 24 hours</p>
            </div>

            <div class="info-card">
                <div class="info-icon">
                    <svg width="26" height="26" fill="none" stroke="#3f9087" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                    </svg>
                </div>
                <h3>Location</h3>
                <p>123 Learning Lane<br>Your City, Country</p>
            </div>

            <div class="info-card">
                <div class="info-icon">
                    <svg width="26" height="26" fill="none" stroke="#25d366" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z"/>
                    </svg>
                </div>
                <h3>WhatsApp</h3>
                <a href="https://wa.me/1234567890" target="_blank" rel="noopener">Message Us</a>
                <p class="info-card-hint">Quick responses guaranteed</p>
            </div>
        </div>

        {{-- ── FORM + SIDE PANEL ── --}}
        <div class="contact-layout">
            {{-- Form --}}
            <div class="contact-form-wrap">
                <div class="form-title">Send Us a Message</div>
                <div class="form-sub">Fill in the form below and we'll get back to you as soon as possible, in sha Allah.</div>

                @if(session('success'))
                    <div class="alert alert-success">
                        <svg class="icon-inline" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-error">
                        <svg class="icon-inline" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/>
                        </svg>
                        Please fix the errors below.
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" novalidate>
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Your Name <span class="required">*</span></label>
                            <input type="text" id="name" name="name" placeholder="e.g. Ahmed Ali"
                                   value="{{ old('name') }}"
                                   class="{{ $errors->has('name') ? 'input-error' : '' }}">
                            @error('name')<p class="field-error">{{ $message }}</p>@enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address <span class="required">*</span></label>
                            <input type="email" id="email" name="email" placeholder="you@example.com"
                                   value="{{ old('email') }}"
                                   class="{{ $errors->has('email') ? 'input-error' : '' }}">
                            @error('email')<p class="field-error">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" placeholder="+1 234 567 890"
                                   value="{{ old('phone') }}">
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject <span class="required">*</span></label>
                            <select id="subject" name="subject"
                                    class="{{ $errors->has('subject') ? 'input-error' : '' }}">
                                <option value="" disabled {{ old('subject') ? '' : 'selected' }}>Select a subject</option>
                                <option value="Enrolment Enquiry"    {{ old('subject') == 'Enrolment Enquiry'    ? 'selected' : '' }}>Enrolment Enquiry</option>
                                <option value="Programme Information" {{ old('subject') == 'Programme Information' ? 'selected' : '' }}>Programme Information</option>
                                <option value="Fees &amp; Payment"   {{ old('subject') == 'Fees & Payment'       ? 'selected' : '' }}>Fees &amp; Payment</option>
                                <option value="Schedule &amp; Timing" {{ old('subject') == 'Schedule & Timing'   ? 'selected' : '' }}>Schedule &amp; Timing</option>
                                <option value="Online Classes"        {{ old('subject') == 'Online Classes'       ? 'selected' : '' }}>Online Classes</option>
                                <option value="Other"                 {{ old('subject') == 'Other'                ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('subject')<p class="field-error">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message">Message <span class="required">*</span></label>
                        <textarea id="message" name="message" placeholder="Write your message here..."
                                  class="{{ $errors->has('message') ? 'input-error' : '' }}">{{ old('message') }}</textarea>
                        @error('message')<p class="field-error">{{ $message }}</p>@enderror
                    </div>

                    <button type="submit" class="form-submit">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/>
                        </svg>
                        Send Message
                    </button>
                </form>
            </div>

            {{-- Side panel --}}
            <div class="contact-side">
                <div class="side-card">
                    <h4>
                        <svg class="icon-inline" width="16" height="16" fill="none" stroke="#3f9087" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Office Hours
                    </h4>
                    <ul class="hours-list">
                        <li><span class="day">Monday – Thursday</span> <span class="badge-open">9am – 6pm</span></li>
                        <li><span class="day">Friday</span> <span class="badge-open">9am – 1pm</span></li>
                        <li><span class="day">Saturday</span> <span class="badge-open">10am – 4pm</span></li>
                        <li><span class="day">Sunday</span> <span class="badge-closed">Closed</span></li>
                    </ul>
                </div>

                <div class="side-card">
                    <h4>
                        <svg class="icon-inline" width="16" height="16" fill="none" stroke="#3f9087" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z"/>
                        </svg>
                        Follow Us
                    </h4>
                    <div class="social-links">
                        <a href="https://wa.me/1234567890" target="_blank" rel="noopener" class="social-link whatsapp">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            WhatsApp
                        </a>
                        <a href="#" class="social-link facebook">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                            Facebook
                        </a>
                        <a href="#" class="social-link instagram">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                            Instagram
                        </a>
                    </div>
                </div>

                <div class="side-card">
                    <h4>
                        <svg class="icon-inline" width="16" height="16" fill="none" stroke="#3f9087" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                        </svg>
                        Find Us
                    </h4>
                    <p class="side-card-address">
                        123 Learning Lane, Your City, Country.<br>
                        Near the central mosque — look for the green sign.
                    </p>
                    <a href="https://maps.google.com" target="_blank" rel="noopener" class="map-link">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/>
                        </svg>
                        Open in Google Maps
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── FAQ ── --}}
<section class="section faq-section">
    <div class="section-inner">
        <div class="section-header center">
            <div class="section-tag">FAQ</div>
            <h2 class="section-title">Common <span class="accent">Questions</span></h2>
            <p class="section-sub">
                Can't find what you're looking for? Send us a message using the form above and we'll get back to you promptly.
            </p>
        </div>
        <div class="faq-grid">
            <div class="faq-item">
                <h4><span class="faq-q">Q</span> What age groups do you teach?</h4>
                <p>We welcome children from age 4 onwards. Our programmes are structured by age and ability so every child learns at the right pace in a comfortable, nurturing environment.</p>
            </div>
            <div class="faq-item">
                <h4><span class="faq-q">Q</span> Do you offer online classes?</h4>
                <p>Yes! We have fully live online classes available for families who cannot attend in person. Our online students receive the same quality of teaching and attention as our in-person students.</p>
            </div>
            <div class="faq-item">
                <h4><span class="faq-q">Q</span> How do I enrol my child?</h4>
                <p>Simply click the "Get Started" button anywhere on our website, fill in the short admission form, and our team will contact you within 24 hours to discuss the next steps.</p>
            </div>
            <div class="faq-item">
                <h4><span class="faq-q">Q</span> What are the class timings?</h4>
                <p>We run weekday evening sessions and weekend morning sessions. Exact timings depend on the programme and your child's age group. Contact us and we'll share the current schedule.</p>
            </div>
            <div class="faq-item">
                <h4><span class="faq-q">Q</span> Are fees monthly or termly?</h4>
                <p>Fees are charged monthly. We believe in making Islamic education accessible, so we also offer flexible payment options for families who need them — please speak to us in confidence.</p>
            </div>
            <div class="faq-item">
                <h4><span class="faq-q">Q</span> How quickly will you respond to my message?</h4>
                <p>We aim to respond to all enquiries within 24 hours on working days. For urgent matters, please call us directly or send us a WhatsApp message for a faster response.</p>
            </div>
        </div>
    </div>
</section>

{{-- ── CTA ── --}}
<section class="cta-section">
    <h2>Ready to Join the Nabaath Family?</h2>
    <p>Give your child the gift of Islamic knowledge — enrol today and watch them grow in faith and confidence.</p>
    <div class="cta-btns">
        <a href="{{ route('get-started') }}" class="btn-primary">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/>
            </svg>
            Apply Now
        </a>
        <a href="{{ route('about') }}" class="btn-outline">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/>
            </svg>
            About Us
        </a>
    </div>
</section>

{{-- ── FOOTER ── --}}
@include('footer')

{{-- ── FLOATING BUTTONS ── --}}
<div class="float-btn right">
    <a href="{{ route('get-started') }}" class="float-circle get-started" title="Get Started">
        <div class="float-pulse"></div>
        <svg width="22" height="22" fill="none" stroke="#fff" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/>
        </svg>
    </a>
    <span class="float-label">Get Started</span>
</div>

<div class="float-btn left">
    <a href="tel:+1234567890" class="float-circle call-btn" title="Call Us">
        <div class="float-pulse"></div>
        <svg width="22" height="22" fill="none" stroke="#fff" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
        </svg>
    </a>
    <span class="float-label">Call Us</span>
</div>

@endsection
