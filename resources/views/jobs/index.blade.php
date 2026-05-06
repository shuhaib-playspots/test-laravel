@extends('layout')

@section('title', 'Jobs &mdash; Nabaath Learning Point')

@section('css')
<link rel="stylesheet" href="{{ asset('css/common.css') }}">
<link rel="stylesheet" href="{{ asset('css/jobs.css') }}">
@endsection

@section('content')

{{-- Hero --}}
<section class="hero">
    <div class="hero-orb hero-orb-1"></div>
    <div class="hero-orb hero-orb-2"></div>
    <span class="arabic-letter" style="font-size:80px;top:20%;left:6%;animation-delay:0s;">ن</span>
    <span class="arabic-letter" style="font-size:56px;top:65%;left:4%;animation-delay:2s;">ب</span>
    <span class="arabic-letter" style="font-size:64px;top:25%;right:5%;animation-delay:1s;">ا</span>
    <span class="arabic-letter" style="font-size:48px;bottom:20%;right:7%;animation-delay:3s;">ت</span>

    <div class="hero-content">
        <div class="hero-badge">
            <svg width="12" height="12" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z"/>
            </svg>
            Work with Nabaath
        </div>
        <h1 class="hero-title">
            Shape <span class="accent">Better Learners</span>
        </h1>
        <p class="hero-desc">
            Be part of a mission to shape better learners through meaningful education and values.
        </p>
        <div class="hero-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span class="sep">/</span>
            <span style="color:rgba(255,255,255,0.9);">Jobs</span>
        </div>
    </div>
</section>

{{-- Main Content --}}
<section class="section" style="background:#f8fffe;">
    <div class="section-inner">

        @php $activeTab = request('tab', 'tutor'); @endphp

        {{-- Tab Navigation --}}
        <div class="tabs-nav">
            <button class="tab-btn {{ $activeTab === 'tutor' ? 'active' : '' }}"
                    onclick="switchTab('tutor')" id="btn-tutor">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"/>
                </svg>
                Online Tutor
                <span class="tab-always-badge">Always Open</span>
            </button>
            <button class="tab-btn {{ $activeTab === 'openings' ? 'active' : '' }}"
                    onclick="switchTab('openings')" id="btn-openings">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z"/>
                </svg>
                Job Openings
                @if($careers->count())
                    <span class="tab-count">{{ $careers->count() }}</span>
                @endif
            </button>
        </div>

        {{-- ══════════ TAB 1: ONLINE TUTOR ══════════ --}}
        <div class="tab-pane {{ $activeTab === 'tutor' ? 'active' : '' }}" id="pane-tutor">

            {{-- Role Header --}}
            <div class="role-header">
                <div class="role-number">1</div>
                <div class="role-header-text">
                    <h2 class="role-title">Online Tutor</h2>
                    <p class="role-tagline">"We are not looking for just tutors — but for mentors who can inspire students."</p>
                </div>
            </div>

            {{-- Requirements --}}
            <div class="req-card">
                <div class="req-card-head">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Requirements
                </div>
                <ul class="req-list">
                    <li>Excellent communication skills</li>
                    <li>Strong proficiency in Arabic &amp; English</li>
                    <li>Ability to simplify concepts for children</li>
                    <li>Prior teaching experience <span class="req-pref">(preferred)</span></li>
                    <li>Basic technical skills (Zoom, Google Meet, etc.)</li>
                </ul>
            </div>

            {{-- Success banner --}}
            @if(session('application_success') && $activeTab === 'tutor')
                <div class="success-banner">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ session('application_success') }}
                </div>
            @endif

            {{-- Application Form --}}
            <div class="apply-section">
                <div class="apply-section-head">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z"/>
                    </svg>
                    Apply Here
                </div>

                <form method="POST" action="{{ route('jobs.apply') }}"
                      enctype="multipart/form-data" class="apply-form" novalidate>
                    @csrf
                    <input type="hidden" name="application_type" value="tutor">

                    {{-- Name & Age --}}
                    <div class="f-grid-2">
                        <div class="f-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="f-label">Name <span class="req-star">*</span></label>
                            <input type="text" name="name" class="f-input"
                                   value="{{ old('name') }}" placeholder="Your full name">
                            @error('name')<p class="f-err">{{ $message }}</p>@enderror
                        </div>
                        <div class="f-group {{ $errors->has('age') ? 'has-error' : '' }}">
                            <label class="f-label">Age</label>
                            <input type="number" name="age" class="f-input"
                                   value="{{ old('age') }}" placeholder="e.g. 25" min="18" max="70">
                            @error('age')<p class="f-err">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    {{-- Education & College --}}
                    <div class="f-grid-2">
                        <div class="f-group {{ $errors->has('education_qualification') ? 'has-error' : '' }}">
                            <label class="f-label">Education Qualification</label>
                            <input type="text" name="education_qualification" class="f-input"
                                   value="{{ old('education_qualification') }}" placeholder="e.g. B.Ed, Hafiz, BA Arabic">
                            @error('education_qualification')<p class="f-err">{{ $message }}</p>@enderror
                        </div>
                        <div class="f-group {{ $errors->has('college_university') ? 'has-error' : '' }}">
                            <label class="f-label">College / University of Study</label>
                            <input type="text" name="college_university" class="f-input"
                                   value="{{ old('college_university') }}" placeholder="Institution name">
                            @error('college_university')<p class="f-err">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    {{-- Position Type --}}
                    <div class="f-group {{ $errors->has('position_type') ? 'has-error' : '' }}">
                        <label class="f-label">Position Type <span class="req-star">*</span></label>
                        <div class="radio-row">
                            <label class="radio-opt {{ old('position_type') === 'full-time' ? 'selected' : '' }}">
                                <input type="radio" name="position_type" value="full-time"
                                       {{ old('position_type') === 'full-time' ? 'checked' : '' }}>
                                <span class="radio-box"></span>
                                Full Time
                            </label>
                            <label class="radio-opt {{ old('position_type') === 'part-time' ? 'selected' : '' }}">
                                <input type="radio" name="position_type" value="part-time"
                                       {{ old('position_type') === 'part-time' ? 'checked' : '' }}>
                                <span class="radio-box"></span>
                                Part Time
                            </label>
                        </div>
                        @error('position_type')<p class="f-err">{{ $message }}</p>@enderror
                    </div>

                    {{-- Subjects --}}
                    <div class="f-group {{ $errors->has('subjects') ? 'has-error' : '' }}">
                        <label class="f-label">Subjects You Expertise In <span class="req-star">*</span></label>
                        <div class="check-grid">
                            @foreach(['Islamic Subjects', "Qira'ath", 'Hifz', 'Arabic Language', 'All School Subjects'] as $subj)
                                <label class="check-opt {{ in_array($subj, old('subjects', [])) ? 'selected' : '' }}">
                                    <input type="checkbox" name="subjects[]" value="{{ $subj }}"
                                           {{ in_array($subj, old('subjects', [])) ? 'checked' : '' }}>
                                    <span class="check-box"></span>
                                    {{ $subj }}
                                </label>
                            @endforeach
                        </div>
                        @error('subjects')<p class="f-err">{{ $message }}</p>@enderror
                    </div>

                    {{-- Language Medium --}}
                    <div class="f-group {{ $errors->has('language_medium') ? 'has-error' : '' }}">
                        <label class="f-label">Medium of Language You Can Teach <span class="req-star">*</span></label>
                        <div class="check-grid">
                            @foreach(['English', 'Malayalam', 'Arabic'] as $lang)
                                <label class="check-opt {{ in_array($lang, old('language_medium', [])) ? 'selected' : '' }}">
                                    <input type="checkbox" name="language_medium[]" value="{{ $lang }}"
                                           {{ in_array($lang, old('language_medium', [])) ? 'checked' : '' }}>
                                    <span class="check-box"></span>
                                    {{ $lang }}
                                </label>
                            @endforeach
                        </div>
                        @error('language_medium')<p class="f-err">{{ $message }}</p>@enderror
                    </div>

                    {{-- Available Days --}}
                    <div class="f-group {{ $errors->has('available_days') ? 'has-error' : '' }}">
                        <label class="f-label">Days You Can Work <span class="req-star">*</span></label>
                        <div class="check-grid">
                            @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                <label class="check-opt {{ in_array($day, old('available_days', [])) ? 'selected' : '' }}">
                                    <input type="checkbox" name="available_days[]" value="{{ $day }}"
                                           {{ in_array($day, old('available_days', [])) ? 'checked' : '' }}>
                                    <span class="check-box"></span>
                                    {{ $day }}
                                </label>
                            @endforeach
                        </div>
                        @error('available_days')<p class="f-err">{{ $message }}</p>@enderror
                    </div>

                    {{-- Hours & Preferred Time --}}
                    <div class="f-grid-2">
                        <div class="f-group {{ $errors->has('teaching_hours') ? 'has-error' : '' }}">
                            <label class="f-label">No. of Hours You Can Teach <span class="req-star">*</span></label>
                            <select name="teaching_hours" class="f-select">
                                <option value="">Select hours per day</option>
                                @foreach([1, 2, 3, 4, 5] as $h)
                                    <option value="{{ $h }}" {{ old('teaching_hours') == $h ? 'selected' : '' }}>
                                        {{ $h }} hour{{ $h > 1 ? 's' : '' }}
                                    </option>
                                @endforeach
                            </select>
                            @error('teaching_hours')<p class="f-err">{{ $message }}</p>@enderror
                        </div>
                        <div class="f-group">
                            <label class="f-label">Preferred Time to Start</label>
                            <input type="time" name="preferred_time" class="f-input"
                                   value="{{ old('preferred_time') }}">
                        </div>
                    </div>

                    {{-- Contact Info --}}
                    <div class="f-divider"><span>Contact Information</span></div>

                    <div class="f-grid-2">
                        <div class="f-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="f-label">Email <span class="req-star">*</span></label>
                            <input type="email" name="email" class="f-input"
                                   value="{{ old('email') }}" placeholder="your@email.com">
                            @error('email')<p class="f-err">{{ $message }}</p>@enderror
                        </div>
                        <div class="f-group">
                            <label class="f-label">Phone Number</label>
                            <input type="tel" name="phone" class="f-input"
                                   value="{{ old('phone') }}" placeholder="+91 00000 00000">
                        </div>
                    </div>

                    <div class="f-grid-2">
                        <div class="f-group">
                            <label class="f-label">WhatsApp Number</label>
                            <input type="tel" name="whatsapp" class="f-input"
                                   value="{{ old('whatsapp') }}" placeholder="+91 00000 00000">
                        </div>
                        <div class="f-group">
                            <label class="f-label">City</label>
                            <input type="text" name="city" class="f-input"
                                   value="{{ old('city') }}" placeholder="Your city">
                        </div>
                    </div>

                    {{-- File Uploads --}}
                    <div class="f-divider"><span>Documents</span></div>

                    <div class="f-grid-2">
                        <div class="f-group">
                            <label class="f-label">Photograph</label>
                            <label class="file-upload-area">
                                <input type="file" name="photograph" accept="image/jpeg,image/png,image/webp"
                                       onchange="updateFileName(this, 'photo-name-tutor')">
                                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                                </svg>
                                <span id="photo-name-tutor">Click to upload photo</span>
                            </label>
                            <p class="f-hint">JPG, PNG, WebP &mdash; max 2MB</p>
                            @error('photograph')<p class="f-err">{{ $message }}</p>@enderror
                        </div>
                        <div class="f-group">
                            <label class="f-label">Resume / CV</label>
                            <label class="file-upload-area">
                                <input type="file" name="resume" accept=".pdf,.doc,.docx"
                                       onchange="updateFileName(this, 'resume-name-tutor')">
                                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                                </svg>
                                <span id="resume-name-tutor">Click to upload CV</span>
                            </label>
                            <p class="f-hint">PDF, DOC, DOCX &mdash; max 5MB</p>
                            @error('resume')<p class="f-err">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <button type="submit" class="btn-submit-app">
                        Submit Application
                        <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        {{-- ══════════ TAB 2: JOB OPENINGS ══════════ --}}
        <div class="tab-pane {{ $activeTab === 'openings' ? 'active' : '' }}" id="pane-openings">

            {{-- Role Header --}}
            <div class="role-header">
                <div class="role-number">2</div>
                <div class="role-header-text">
                    <h2 class="role-title">Operations &amp; Support Roles</h2>
                    <p class="role-tagline">"We are not just hiring staff — but people who make meaningful learning possible behind the scenes."</p>
                </div>
            </div>

            {{-- Job Listings (from admin) or NO VACANCIES --}}
            @if($careers->isEmpty())
                <div class="no-vacancy-card">
                    <div class="no-vacancy-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z"/>
                        </svg>
                    </div>
                    <span class="no-vacancy-label">NO VACANCIES</span>
                    <p class="no-vacancy-sub">We currently have no open positions in this category.<br>Check back soon — or send us a general application below.</p>
                </div>
            @else
                @foreach($careers as $i => $career)
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
                        </div>
                    </div>
                @endforeach
            @endif

            {{-- General Application Form --}}
            <div class="general-apply-banner">
                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                </svg>
                <div>
                    <strong>Interested in joining us?</strong>
                    <span>Submit a general application and we'll reach out when a suitable role opens up.</span>
                </div>
            </div>

            {{-- Success banner --}}
            @if(session('application_success') && $activeTab === 'openings')
                <div class="success-banner">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ session('application_success') }}
                </div>
            @endif

            <div class="apply-section">
                <div class="apply-section-head">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z"/>
                    </svg>
                    Submit Application
                </div>

                <form method="POST" action="{{ route('jobs.apply') }}"
                      enctype="multipart/form-data" class="apply-form" novalidate>
                    @csrf
                    <input type="hidden" name="application_type" value="general">

                    <div class="f-grid-2">
                        <div class="f-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="f-label">Name <span class="req-star">*</span></label>
                            <input type="text" name="name" class="f-input"
                                   value="{{ old('name') }}" placeholder="Your full name">
                            @error('name')<p class="f-err">{{ $message }}</p>@enderror
                        </div>
                        <div class="f-group">
                            <label class="f-label">Age</label>
                            <input type="number" name="age" class="f-input"
                                   value="{{ old('age') }}" placeholder="e.g. 25" min="18" max="70">
                        </div>
                    </div>

                    <div class="f-grid-2">
                        <div class="f-group">
                            <label class="f-label">Education Qualification</label>
                            <input type="text" name="education_qualification" class="f-input"
                                   value="{{ old('education_qualification') }}" placeholder="Your highest qualification">
                        </div>
                        <div class="f-group">
                            <label class="f-label">College / University</label>
                            <input type="text" name="college_university" class="f-input"
                                   value="{{ old('college_university') }}" placeholder="Institution name">
                        </div>
                    </div>

                    <div class="f-grid-2">
                        <div class="f-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="f-label">Email <span class="req-star">*</span></label>
                            <input type="email" name="email" class="f-input"
                                   value="{{ old('email') }}" placeholder="your@email.com">
                            @error('email')<p class="f-err">{{ $message }}</p>@enderror
                        </div>
                        <div class="f-group">
                            <label class="f-label">Phone Number</label>
                            <input type="tel" name="phone" class="f-input"
                                   value="{{ old('phone') }}" placeholder="+91 00000 00000">
                        </div>
                    </div>

                    <div class="f-grid-2">
                        <div class="f-group">
                            <label class="f-label">WhatsApp Number</label>
                            <input type="tel" name="whatsapp" class="f-input"
                                   value="{{ old('whatsapp') }}" placeholder="+91 00000 00000">
                        </div>
                        <div class="f-group">
                            <label class="f-label">City</label>
                            <input type="text" name="city" class="f-input"
                                   value="{{ old('city') }}" placeholder="Your city">
                        </div>
                    </div>

                    <div class="f-divider"><span>Documents</span></div>

                    <div class="f-grid-2">
                        <div class="f-group">
                            <label class="f-label">Photograph</label>
                            <label class="file-upload-area">
                                <input type="file" name="photograph" accept="image/jpeg,image/png,image/webp"
                                       onchange="updateFileName(this, 'photo-name-gen')">
                                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                                </svg>
                                <span id="photo-name-gen">Click to upload photo</span>
                            </label>
                            <p class="f-hint">JPG, PNG, WebP &mdash; max 2MB</p>
                        </div>
                        <div class="f-group">
                            <label class="f-label">Resume / CV</label>
                            <label class="file-upload-area">
                                <input type="file" name="resume" accept=".pdf,.doc,.docx"
                                       onchange="updateFileName(this, 'resume-name-gen')">
                                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                                </svg>
                                <span id="resume-name-gen">Click to upload CV</span>
                            </label>
                            <p class="f-hint">PDF, DOC, DOCX &mdash; max 5MB</p>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit-app">
                        Submit Application
                        <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>

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

<script>
function switchTab(tab) {
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    document.querySelectorAll('.tab-pane').forEach(p => p.classList.remove('active'));
    document.getElementById('btn-' + tab).classList.add('active');
    document.getElementById('pane-' + tab).classList.add('active');
    const url = new URL(window.location);
    url.searchParams.set('tab', tab);
    url.searchParams.delete('applied');
    window.history.replaceState({}, '', url);
}

function toggleReq(i) {
    const body = document.getElementById('req-' + i);
    const btn = body.previousElementSibling;
    const open = body.classList.toggle('open');
    btn.classList.toggle('open', open);
}

function updateFileName(input, spanId) {
    const span = document.getElementById(spanId);
    if (input.files && input.files[0]) {
        span.textContent = input.files[0].name;
        input.closest('.file-upload-area').classList.add('has-file');
    }
}

// Highlight radio/checkbox on change
document.querySelectorAll('.radio-opt input').forEach(input => {
    input.addEventListener('change', () => {
        input.closest('.radio-row').querySelectorAll('.radio-opt').forEach(opt => opt.classList.remove('selected'));
        input.closest('.radio-opt').classList.add('selected');
    });
});
document.querySelectorAll('.check-opt input').forEach(input => {
    input.addEventListener('change', () => {
        input.closest('.check-opt').classList.toggle('selected', input.checked);
    });
});
</script>

@endsection
