<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Started &mdash; Nabaath Learning Point</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800|amiri:400,700" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <style>
        .nav-back {
            display: inline-flex; align-items: center; gap: 6px;
            color: var(--brand); font-size: 14px; font-weight: 600;
            text-decoration: none; transition: gap .2s;
        }
        .nav-back:hover { gap: 10px; }

        /* ── Page hero ── */
        .page-hero {
            background: linear-gradient(135deg, #0d3532 0%, #1a5c55 50%, #3f9087 100%);
            padding: 110px 24px 60px;
            position: relative; overflow: hidden;
            text-align: center;
        }
        .page-hero::before {
            content: ''; position: absolute; inset: 0;
            background-image: repeating-linear-gradient(45deg,rgba(255,255,255,.03) 0,rgba(255,255,255,.03) 1px,transparent 0,transparent 50%);
            background-size: 36px 36px;
        }
        .arabic-deco {
            position: absolute; font-family: 'Amiri', serif;
            color: rgba(255,255,255,0.06); font-weight: 700;
            user-select: none; pointer-events: none;
        }
        .page-hero-inner { position: relative; z-index: 1; max-width: 680px; margin: 0 auto; }
        .page-badge {
            display: inline-flex; align-items: center; gap: 6px;
            background: rgba(201,168,76,.2); border: 1px solid rgba(201,168,76,.4);
            color: #f0d080; padding: 5px 14px; border-radius: 50px;
            font-size: 11px; font-weight: 600; letter-spacing: .5px;
            text-transform: uppercase; margin-bottom: 18px;
        }
        .page-hero h1 {
            font-size: clamp(28px, 5vw, 48px); font-weight: 800;
            color: #fff; line-height: 1.15; margin-bottom: 14px;
        }
        .page-hero h1 span { color: #7dd3c9; }
        .page-hero p { font-size: 15px; color: rgba(255,255,255,.7); line-height: 1.75; }

        /* ── Layout ── */
        .page-body { max-width: 1200px; margin: 0 auto; padding: 56px 24px 80px; }
        .page-grid { display: grid; grid-template-columns: 5fr 7fr; gap: 48px; align-items: start; }

        /* ── Procedures sidebar ── */
        .procedures { position: sticky; top: 90px; }
        .sidebar-title {
            font-size: 11px; font-weight: 700; letter-spacing: 1px;
            text-transform: uppercase; color: var(--brand); margin-bottom: 20px;
        }
        .step {
            display: flex; gap: 16px; align-items: flex-start;
            position: relative; padding-bottom: 28px;
        }
        .step:last-child { padding-bottom: 0; }
        .step:not(:last-child)::after {
            content: ''; position: absolute;
            left: 19px; top: 44px; bottom: 0; width: 2px;
            background: linear-gradient(180deg, var(--brand-light), transparent);
        }
        .step-num {
            width: 40px; height: 40px; border-radius: 50%;
            background: var(--brand-light); border: 2px solid var(--brand);
            color: var(--brand); font-size: 14px; font-weight: 800;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0; position: relative; z-index: 1;
            transition: all .3s;
        }
        .step.done .step-num { background: var(--brand); color: #fff; border-color: var(--brand); }
        .step-body h4 { font-size: 15px; font-weight: 700; color: #1a2e2c; margin-bottom: 4px; }
        .step-body p  { font-size: 13px; color: #7a9190; line-height: 1.6; }

        .info-box {
            margin-top: 28px;
            background: var(--gold-light); border: 1px solid rgba(201,168,76,.3);
            border-radius: 16px; padding: 18px 20px;
        }
        .info-box h4 { font-size: 13px; font-weight: 700; color: var(--gold); margin-bottom: 8px; }
        .info-box p  { font-size: 12px; color: #7a6128; line-height: 1.65; }

        .contact-strip {
            margin-top: 20px; background: #fff;
            border: 1px solid rgba(63,144,135,.12);
            border-radius: 16px; padding: 16px 20px;
            display: flex; flex-direction: column; gap: 10px;
        }
        .contact-row {
            display: flex; align-items: center; gap: 10px;
            font-size: 13px; color: #5a7270; text-decoration: none;
            transition: color .2s;
        }
        .contact-row:hover { color: var(--brand); }
        .contact-row-icon {
            width: 32px; height: 32px; border-radius: 9px;
            background: var(--brand-light);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        /* ── Form card ── */
        .form-card {
            background: #fff; border-radius: 24px;
            box-shadow: 0 4px 32px rgba(63,144,135,.1);
            border: 1px solid rgba(63,144,135,.08);
            overflow: hidden;
        }
        .form-card-header {
            background: linear-gradient(135deg, var(--brand) 0%, var(--brand-dark) 100%);
            padding: 28px 32px;
        }
        .form-card-header h2 { font-size: 20px; font-weight: 700; color: #fff; margin-bottom: 4px; }
        .form-card-header p  { font-size: 13px; color: rgba(255,255,255,.7); }
        .form-card-body { padding: 32px; }

        /* Form elements */
        .form-section-title {
            font-size: 11px; font-weight: 700; letter-spacing: 1px;
            text-transform: uppercase; color: var(--brand);
            margin-bottom: 18px; padding-bottom: 8px;
            border-bottom: 2px solid var(--brand-light);
            display: flex; align-items: center; gap: 8px;
        }
        .form-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; }
        .form-group { display: flex; flex-direction: column; gap: 6px; margin-bottom: 18px; }
        .form-group:last-child { margin-bottom: 0; }
        .form-label {
            font-size: 13px; font-weight: 600; color: #374151;
        }
        .form-label .req { color: #ef4444; margin-left: 2px; }
        .form-input, .form-select, .form-textarea {
            width: 100%; padding: 11px 14px;
            border: 1.5px solid #e5e7eb; border-radius: 12px;
            font-size: 14px; color: #1a2e2c;
            background: #fafafa;
            outline: none; transition: all .2s;
            font-family: 'Inter', sans-serif;
        }
        .form-input::placeholder, .form-textarea::placeholder { color: #9ca3af; }
        .form-input:focus, .form-select:focus, .form-textarea:focus {
            border-color: var(--brand);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(63,144,135,.12);
        }
        .form-select { cursor: pointer; appearance: none; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236b7280' stroke-width='2'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 12px center; background-size: 16px; padding-right: 40px; }
        .form-textarea { resize: vertical; min-height: 100px; line-height: 1.6; }
        .input-error { border-color: #ef4444 !important; background: #fff5f5 !important; }
        .error-msg  { font-size: 12px; color: #ef4444; margin-top: 4px; }

        /* Radio group */
        .radio-group { display: flex; gap: 12px; flex-wrap: wrap; }
        .radio-option {
            flex: 1; min-width: 90px;
            border: 1.5px solid #e5e7eb; border-radius: 12px;
            padding: 11px 14px;
            display: flex; align-items: center; gap: 8px;
            cursor: pointer; transition: all .2s; background: #fafafa;
            font-size: 13px; font-weight: 500; color: #4b5563;
            user-select: none;
        }
        .radio-option:hover { border-color: var(--brand); background: var(--brand-light); }
        .radio-option input[type="radio"] { display: none; }
        .radio-option.selected { border-color: var(--brand); background: var(--brand-light); color: var(--brand-dark); }
        .radio-dot {
            width: 16px; height: 16px; border-radius: 50%;
            border: 2px solid #d1d5db; flex-shrink: 0;
            display: flex; align-items: center; justify-content: center;
            transition: all .2s;
        }
        .radio-option.selected .radio-dot { border-color: var(--brand); background: var(--brand); }
        .radio-option.selected .radio-dot::after {
            content: ''; width: 6px; height: 6px;
            border-radius: 50%; background: #fff; display: block;
        }

        /* Divider */
        .form-divider { height: 1px; background: var(--brand-light); margin: 24px 0; }

        /* Submit */
        .btn-submit {
            width: 100%; padding: 15px;
            background: var(--brand); color: #fff;
            border: none; border-radius: 14px;
            font-size: 15px; font-weight: 700;
            cursor: pointer; transition: all .25s;
            display: flex; align-items: center; justify-content: center; gap: 8px;
            box-shadow: 0 4px 16px rgba(63,144,135,.35);
            font-family: 'Inter', sans-serif;
        }
        .btn-submit:hover { background: var(--brand-dark); transform: translateY(-1px); box-shadow: 0 8px 24px rgba(63,144,135,.4); }
        .btn-submit:active { transform: translateY(0); }
        .btn-note { text-align: center; font-size: 12px; color: #9ca3af; margin-top: 10px; }

        /* ── Success alert ── */
        .alert-success {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            border: 1px solid #34d399;
            border-radius: 16px; padding: 20px 24px;
            margin-bottom: 28px;
            display: flex; gap: 14px; align-items: flex-start;
        }
        .alert-success-icon {
            width: 44px; height: 44px; border-radius: 12px;
            background: #059669; flex-shrink: 0;
            display: flex; align-items: center; justify-content: center;
        }
        .alert-success h4 { font-size: 15px; font-weight: 700; color: #065f46; margin-bottom: 4px; }
        .alert-success p  { font-size: 13px; color: #047857; line-height: 1.6; }

        /* ── Floating buttons ── */
        .float-btn { position: fixed; bottom: 100px; z-index: 999; display: flex; flex-direction: column; align-items: center; gap: 6px; }
        .float-btn.right { right: 24px; }
        .float-btn.left  { left: 24px; }
        .float-circle {
            width: 52px; height: 52px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            text-decoration: none; transition: all .3s;
            box-shadow: 0 6px 20px rgba(0,0,0,.2); position: relative;
        }
        .float-circle.get-started { background: var(--brand); }
        .float-circle.call-btn    { background: #25d366; }
        .float-circle:hover { transform: scale(1.1) translateY(-2px); }
        .float-label { font-size: 10px; font-weight: 600; color: #fff; background: rgba(0,0,0,.6); padding: 3px 8px; border-radius: 10px; white-space: nowrap; }
        .float-pulse { position: absolute; border-radius: 50%; animation: pulse 2s ease-out infinite; }
        .float-circle.get-started .float-pulse { background: var(--brand); width: 52px; height: 52px; }
        .float-circle.call-btn    .float-pulse { background: #25d366; width: 52px; height: 52px; }
        @keyframes pulse { 0%{ transform:scale(1); opacity:.7; } 100%{ transform:scale(2); opacity:0; } }

        /* ── Responsive ── */
        @media(max-width:900px) {
            .page-grid { grid-template-columns: 1fr; }
            .procedures { position: static; }
        }
        @media(max-width:600px) {
            .form-card-body { padding: 22px 18px; }
            .form-grid-2 { grid-template-columns: 1fr; }
            .radio-group { flex-direction: column; }
        }
    </style>
</head>
<body>

{{-- ── NAVBAR ── --}}
@include('nav-bar')

{{-- ── PAGE HERO ── --}}
<section class="page-hero">
    <span class="arabic-deco" style="font-size:160px;top:-30px;left:-40px;">ن</span>
    <span class="arabic-deco" style="font-size:120px;bottom:-20px;right:-20px;">ب</span>
    <div class="page-hero-inner">
        <div class="page-badge">
            <svg width="10" height="10" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
            </svg>
            Admissions Open
        </div>
        <h1>Begin Your Child's<br><span>Islamic Learning Journey</span></h1>
        <p>Fill out the admission form below and our team will get in touch with you within 24–48 hours, In sha Allah. No prior knowledge required — all levels welcome.</p>
    </div>
</section>

{{-- ── PAGE BODY ── --}}
<div class="page-body">
    <div class="page-grid">

        {{-- ── LEFT: Procedures ── --}}
        <div class="procedures">
            <p class="sidebar-title">Admission Procedure</p>

            <div class="step done">
                <div class="step-num">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                    </svg>
                </div>
                <div class="step-body">
                    <h4>Step 1 — Submit Enquiry</h4>
                    <p>Fill out the admission form on this page with your child's details and preferred program. This takes less than 3 minutes.</p>
                </div>
            </div>

            <div class="step">
                <div class="step-num">2</div>
                <div class="step-body">
                    <h4>Step 2 — Confirmation Call</h4>
                    <p>Our admissions team will contact you within 24–48 hours to confirm your enquiry, answer any questions, and schedule an assessment.</p>
                </div>
            </div>

            <div class="step">
                <div class="step-num">3</div>
                <div class="step-body">
                    <h4>Step 3 — Level Assessment</h4>
                    <p>A short, friendly assessment session is conducted to understand your child's current level in Quran and Arabic so we can place them correctly.</p>
                </div>
            </div>

            <div class="step">
                <div class="step-num">4</div>
                <div class="step-body">
                    <h4>Step 4 — Class Assignment</h4>
                    <p>Based on the assessment, your child is matched with the right class, teacher, and schedule that suits your family best.</p>
                </div>
            </div>

            <div class="step">
                <div class="step-num">5</div>
                <div class="step-body">
                    <h4>Step 5 — Begin Learning</h4>
                    <p>Your child attends their first class! We provide a welcome kit, study materials, and continuous parent updates to ensure a smooth start.</p>
                </div>
            </div>

            <div class="info-box">
                <h4>&#9733; Important Notes</h4>
                <p>
                    &bull; All programs are open to children aged 4–16.<br>
                    &bull; No prior Arabic or Quran knowledge is required.<br>
                    &bull; Classes are available online and in-person.<br>
                    &bull; Siblings may receive special discounts — ask us!
                </p>
            </div>

            <div class="contact-strip">
                <p style="font-size:12px;font-weight:600;color:#9ca3af;text-transform:uppercase;letter-spacing:.5px;">Have questions? Reach us</p>
                <a href="tel:+1234567890" class="contact-row">
                    <div class="contact-row-icon">
                        <svg width="15" height="15" fill="none" stroke="#3f9087" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                        </svg>
                    </div>
                    +1 234 567 890
                </a>
                <a href="mailto:info@nabaath.com" class="contact-row">
                    <div class="contact-row-icon">
                        <svg width="15" height="15" fill="none" stroke="#3f9087" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                        </svg>
                    </div>
                    info@nabaath.com
                </a>
                <a href="#" class="contact-row">
                    <div class="contact-row-icon">
                        <svg width="15" height="15" fill="#3f9087" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                    </div>
                    WhatsApp Us
                </a>
            </div>
        </div>

        {{-- ── RIGHT: Form ── --}}
        <div>

            {{-- Success message --}}
            @if(session('success'))
            <div class="alert-success">
                <div class="alert-success-icon">
                    <svg width="22" height="22" fill="none" stroke="#fff" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                    </svg>
                </div>
                <div>
                    <h4>Alhamdulillah! Enquiry Received</h4>
                    <p>{{ session('success') }}</p>
                </div>
            </div>
            @endif

            <div class="form-card">
                <div class="form-card-header">
                    <h2>Admission Enquiry Form</h2>
                    <p>All fields marked with <span style="color:#fbbf24;">*</span> are required</p>
                </div>
                <div class="form-card-body">
                    <form method="POST" action="{{ route('get-started.store') }}" id="admissionForm" novalidate>
                        @csrf

                        {{-- Parent / Guardian ── --}}
                        <p class="form-section-title">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                            </svg>
                            Parent / Guardian Details
                        </p>

                        <div class="form-grid-2">
                            <div class="form-group">
                                <label class="form-label" for="parent_name">Full Name <span class="req">*</span></label>
                                <input type="text" id="parent_name" name="parent_name"
                                       class="form-input @error('parent_name') input-error @enderror"
                                       value="{{ old('parent_name') }}"
                                       placeholder="e.g. Ahmed Abdullah">
                                @error('parent_name')<p class="error-msg">{{ $message }}</p>@enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="parent_phone">Phone / WhatsApp <span class="req">*</span></label>
                                <input type="tel" id="parent_phone" name="parent_phone"
                                       class="form-input @error('parent_phone') input-error @enderror"
                                       value="{{ old('parent_phone') }}"
                                       placeholder="+1 234 567 890">
                                @error('parent_phone')<p class="error-msg">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="parent_email">Email Address <span class="req">*</span></label>
                            <input type="email" id="parent_email" name="parent_email"
                                   class="form-input @error('parent_email') input-error @enderror"
                                   value="{{ old('parent_email') }}"
                                   placeholder="you@example.com">
                            @error('parent_email')<p class="error-msg">{{ $message }}</p>@enderror
                        </div>

                        <div class="form-divider"></div>

                        {{-- Student Details ── --}}
                        <p class="form-section-title">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"/>
                            </svg>
                            Student Details
                        </p>

                        <div class="form-group">
                            <label class="form-label" for="student_name">Student's Full Name <span class="req">*</span></label>
                            <input type="text" id="student_name" name="student_name"
                                   class="form-input @error('student_name') input-error @enderror"
                                   value="{{ old('student_name') }}"
                                   placeholder="e.g. Mariam Ahmed">
                            @error('student_name')<p class="error-msg">{{ $message }}</p>@enderror
                        </div>

                        <div class="form-grid-2">
                            <div class="form-group">
                                <label class="form-label" for="student_dob">Date of Birth <span class="req">*</span></label>
                                <input type="date" id="student_dob" name="student_dob"
                                       class="form-input @error('student_dob') input-error @enderror"
                                       value="{{ old('student_dob') }}"
                                       max="{{ date('Y-m-d') }}">
                                @error('student_dob')<p class="error-msg">{{ $message }}</p>@enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Gender <span class="req">*</span></label>
                                <div class="radio-group" id="genderGroup">
                                    <label class="radio-option {{ old('student_gender') === 'male' ? 'selected' : '' }}" onclick="selectRadio(this,'genderGroup','student_gender','male')">
                                        <input type="radio" name="student_gender" value="male" {{ old('student_gender') === 'male' ? 'checked' : '' }}>
                                        <span class="radio-dot"></span> Boy
                                    </label>
                                    <label class="radio-option {{ old('student_gender') === 'female' ? 'selected' : '' }}" onclick="selectRadio(this,'genderGroup','student_gender','female')">
                                        <input type="radio" name="student_gender" value="female" {{ old('student_gender') === 'female' ? 'checked' : '' }}>
                                        <span class="radio-dot"></span> Girl
                                    </label>
                                </div>
                                @error('student_gender')<p class="error-msg">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="form-divider"></div>

                        {{-- Program ── --}}
                        <p class="form-section-title">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/>
                            </svg>
                            Program &amp; Class Preference
                        </p>

                        <div class="form-group">
                            <label class="form-label" for="program">Program of Interest <span class="req">*</span></label>
                            @php $selectedProgram = old('program', request('program')); @endphp
                            <select id="program" name="program"
                                    class="form-select @error('program') input-error @enderror">
                                <option value="" disabled {{ $selectedProgram ? '' : 'selected' }}>— Select a program —</option>
                                @foreach([
                                    'Quran Recitation (Nazra)',
                                    'Hifz ul Quran (Memorisation)',
                                    'Tajweed',
                                    'Arabic Language',
                                    'Islamic Studies',
                                    'Duas & Adhkar',
                                    'Islamic Manners (Akhlaq)',
                                ] as $prog)
                                    <option value="{{ $prog }}" {{ $selectedProgram === $prog ? 'selected' : '' }}>
                                        {{ $prog }}
                                    </option>
                                @endforeach
                            </select>
                            @error('program')<p class="error-msg">{{ $message }}</p>@enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Preferred Class Type <span class="req">*</span></label>
                            <div class="radio-group" id="classGroup">
                                @foreach(['one_on_one' => 'One-on-One', 'group' => 'Small Group', 'online' => 'Online Live'] as $val => $lbl)
                                <label class="radio-option {{ old('class_type') === $val ? 'selected' : '' }}"
                                       onclick="selectRadio(this,'classGroup','class_type','{{ $val }}')">
                                    <input type="radio" name="class_type" value="{{ $val }}" {{ old('class_type') === $val ? 'checked' : '' }}>
                                    <span class="radio-dot"></span> {{ $lbl }}
                                </label>
                                @endforeach
                            </div>
                            @error('class_type')<p class="error-msg">{{ $message }}</p>@enderror
                        </div>

                        <div class="form-divider"></div>

                        {{-- Message ── --}}
                        <div class="form-group">
                            <label class="form-label" for="message">Additional Message <span style="color:#9ca3af;font-weight:400;">(optional)</span></label>
                            <textarea id="message" name="message"
                                      class="form-textarea @error('message') input-error @enderror"
                                      placeholder="Tell us anything useful — your child's current level, special needs, preferred schedule, or any questions you have...">{{ old('message') }}</textarea>
                            @error('message')<p class="error-msg">{{ $message }}</p>@enderror
                        </div>

                        <button type="submit" class="btn-submit" id="submitBtn">
                            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/>
                            </svg>
                            Submit Admission Enquiry
                        </button>
                        <p class="btn-note">By submitting, you agree to be contacted by our admissions team. JazakAllahu Khayran.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ── FLOATING BUTTONS ── --}}
<div class="float-btn right">
    <a href="#admissionForm" class="float-circle get-started" title="Apply Now">
        <div class="float-pulse"></div>
        <svg width="20" height="20" fill="none" stroke="#fff" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125"/>
        </svg>
    </a>
    <span class="float-label">Apply Now</span>
</div>

<div class="float-btn left">
    <a href="tel:+1234567890" class="float-circle call-btn" title="Call Us">
        <div class="float-pulse"></div>
        <svg width="20" height="20" fill="none" stroke="#fff" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
        </svg>
    </a>
    <span class="float-label">Call Us</span>
</div>

<script src="{{ asset('js/common.js') }}"></script>
<script>
    function selectRadio(el, groupId, name, value) {
        document.querySelectorAll('#' + groupId + ' .radio-option').forEach(o => o.classList.remove('selected'));
        el.classList.add('selected');
        el.querySelector('input[type="radio"]').checked = true;
    }

    document.getElementById('admissionForm').addEventListener('submit', function() {
        const btn = document.getElementById('submitBtn');
        btn.innerHTML = '<svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="animation:spin 1s linear infinite"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/></svg> Submitting...';
        btn.disabled = true;
    });
</script>
<style>@keyframes spin{ to{ transform: rotate(360deg); } }</style>

</body>
</html>
