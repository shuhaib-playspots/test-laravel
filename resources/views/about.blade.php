@extends('layout')

@section('title', 'About Us &mdash; Nabaath Learning Point')

@section('css')
<link rel="stylesheet" href="{{ asset('css/common.css') }}">
<link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endsection

@section('content')

{{-- ── HERO ── --}}
<section class="hero" style="background: linear-gradient(135deg, rgba(0,0,0,0.55) 0%, rgba(0,0,0,0.65) 100%), url('{{ asset('images/img1.webp') }}') center/cover no-repeat;">
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
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
            </svg>
            About Nabaath Learning Point
        </div>
        <h1 class="hero-title">
            Rooted in <span class="accent">Faith</span>,<br>
            Growing in <span class="gold">Knowledge</span>
        </h1>
        <p class="hero-desc">
            We are more than a learning centre — we are a community built on love, faith, and the sincere
            desire to see every Muslim child flourish in their deen and in life.
        </p>
        <div class="hero-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span class="sep">/</span>
            <span style="color:rgba(255,255,255,0.9);">About Us</span>
        </div>
    </div>
</section>

{{-- ── MISSION / VISION / VALUES ── --}}
<section class="section">
    <div class="section-inner">
        <div class="section-header center">
            <div class="section-tag">Who We Are</div>
            <h2 class="section-title">Our <span class="accent">Purpose</span> &amp; <span class="gold">Direction</span></h2>
            <p class="section-sub">
                Everything we do at Nabaath is driven by three pillars — a clear mission, an inspiring vision,
                and values that guide every teacher and every lesson.
            </p>
        </div>

        <div class="mv-grid">
            <div class="mv-card">
                <div class="mv-icon">
                    <svg width="26" height="26" fill="none" stroke="#3f9087" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/>
                    </svg>
                </div>
                <h3>Our Mission</h3>
                <p>To provide authentic, high-quality Islamic education to children — nurturing their love for Allah, the Quran, and the Sunnah through compassionate, structured, and engaging teaching in a safe and caring environment.</p>
            </div>

            <div class="mv-card">
                <div class="mv-icon">
                    <svg width="26" height="26" fill="none" stroke="#c9a84c" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h3>Our Vision</h3>
                <p>To be the leading Islamic learning institution for children — a place where every student leaves with strong faith, a deep love of knowledge, and the character to navigate the modern world as a proud, confident Muslim.</p>
            </div>

            <div class="mv-card">
                <div class="mv-icon">
                    <svg width="26" height="26" fill="none" stroke="#3f9087" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                    </svg>
                </div>
                <h3>Our Values</h3>
                <p>Love, sincerity, and excellence define us. We believe every child deserves a teacher who cares, a curriculum that inspires, and a community that uplifts — rooted always in the remembrance of Allah.</p>
            </div>
        </div>
    </div>
</section>

{{-- ── HOW WE STARTED ── --}}
<section class="section timeline-section" id="how-we-started">
    <div class="section-inner">
        <div class="section-header center">
            <div class="section-tag">Our Journey</div>
            <h2 class="section-title">How We <span class="accent">Started</span></h2>
            <p class="section-sub">
                Nabaath began as a small dream held by two passionate educators — a dream that every Muslim child in
                their community would have a place to learn, grow, and connect with their faith. Here is our story.
            </p>
        </div>

        <div class="timeline">

            <div class="tl-item left">
                <div class="tl-card">
                    <span class="tl-card-tag">The Idea</span>
                    <h4>A Dream is Born</h4>
                    <p>
                        Two teachers, Ustadh Mohammed and Ustazah Fatima, noticed a gap in their community —
                        children were growing up without access to structured, quality Islamic education. Around a
                        kitchen table, over cups of tea, Nabaath was conceived: a learning point built on love
                        for Allah and love for children.
                    </p>
                </div>
                <div class="tl-center">
                    <div class="tl-dot">
                        <svg fill="none" stroke="#fff" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18"/>
                        </svg>
                    </div>
                    <div class="tl-year">2013</div>
                </div>
                <div class="tl-empty"></div>
            </div>

            <div class="tl-item right">
                <div class="tl-empty"></div>
                <div class="tl-center">
                    <div class="tl-dot">
                        <svg fill="none" stroke="#fff" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                        </svg>
                    </div>
                    <div class="tl-year">2014</div>
                </div>
                <div class="tl-card">
                    <span class="tl-card-tag">First Steps</span>
                    <h4>Opening Our Doors</h4>
                    <p>
                        Nabaath Learning Point officially opened with just 12 students meeting in a single room.
                        Classes were held on weekends, teaching Quran recitation and basic Arabic. Word spread
                        quickly — parents were overjoyed to see their children fall in love with the Quran.
                    </p>
                </div>
            </div>

            <div class="tl-item left">
                <div class="tl-card">
                    <span class="tl-card-tag">Growing Fast</span>
                    <h4>Expanding the Family</h4>
                    <p>
                        Enrolment grew to over 80 students. We introduced Islamic Studies and Hifz programmes,
                        recruited two more qualified Ustadhs, and moved to a dedicated learning space.
                        Parents called it "the best decision we ever made for our children."
                    </p>
                </div>
                <div class="tl-center">
                    <div class="tl-dot">
                        <svg fill="none" stroke="#fff" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                        </svg>
                    </div>
                    <div class="tl-year">2016</div>
                </div>
                <div class="tl-empty"></div>
            </div>

            <div class="tl-item right">
                <div class="tl-empty"></div>
                <div class="tl-center">
                    <div class="tl-dot">
                        <svg fill="none" stroke="#fff" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0H3"/>
                        </svg>
                    </div>
                    <div class="tl-year">2019</div>
                </div>
                <div class="tl-card">
                    <span class="tl-card-tag">Going Online</span>
                    <h4>Reaching Beyond Borders</h4>
                    <p>
                        We launched our online live classes platform, bringing Nabaath's warmth and quality
                        to families across the globe. Students joined from multiple countries, and our community
                        grew into a truly international family united by faith and learning.
                    </p>
                </div>
            </div>

            <div class="tl-item left">
                <div class="tl-card">
                    <span class="tl-card-tag">Today</span>
                    <h4>A Thriving Community</h4>
                    <p>
                        Today, Nabaath Learning Point serves over 500 students across in-person and online
                        programmes, with a team of 20+ dedicated educators. Our first students are now teenagers
                        who carry the Quran in their hearts — and that is our greatest highlight of all.
                    </p>
                </div>
                <div class="tl-center">
                    <div class="tl-dot" style="background: var(--gold);">
                        <svg fill="none" stroke="#fff" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/>
                        </svg>
                    </div>
                    <div class="tl-year" style="background:var(--gold);">2024</div>
                </div>
                <div class="tl-empty"></div>
            </div>

        </div>
    </div>
</section>

{{-- ── OUR HIGHLIGHTS ── --}}
<section class="section highlights-section" id="highlights">
    <div class="section-inner" style="position:relative;z-index:1;">
        <div class="section-header center">
            <div class="section-tag" style="background:rgba(255,255,255,0.1);color:rgba(255,255,255,0.85);">
                <svg width="12" height="12" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/>
                </svg>
                Our Highlights
            </div>
            <h2 class="section-title" style="color:#fff;">
                A Decade of <span style="color:#7dd3c9;">Impact</span>
            </h2>
            <p class="section-sub" style="color:rgba(255,255,255,0.65);margin:0 auto;">
                Numbers tell a part of our story — but behind every number is a child who found their love
                for the Quran, a parent who found peace, and a family that grew closer to Allah.
            </p>
        </div>

        <div class="hl-grid">
            <div class="hl-card">
                <div class="hl-icon">
                    <svg width="28" height="28" fill="none" stroke="#7dd3c9" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                    </svg>
                </div>
                <div class="hl-num">500+</div>
                <div class="hl-label">Students Enrolled</div>
                <div class="hl-desc">Active learners across in-person and online programmes</div>
            </div>

            <div class="hl-card">
                <div class="hl-icon">
                    <svg width="28" height="28" fill="none" stroke="#7dd3c9" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="hl-num">10+</div>
                <div class="hl-label">Years of Service</div>
                <div class="hl-desc">A decade of nurturing faith and knowledge in children</div>
            </div>

            <div class="hl-card">
                <div class="hl-icon">
                    <svg width="28" height="28" fill="none" stroke="#7dd3c9" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"/>
                    </svg>
                </div>
                <div class="hl-num">20+</div>
                <div class="hl-label">Qualified Educators</div>
                <div class="hl-desc">Certified Ustadhs and Ustazahs with specialised Islamic training</div>
            </div>

            <div class="hl-card">
                <div class="hl-icon">
                    <svg width="28" height="28" fill="none" stroke="#7dd3c9" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0118 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                    </svg>
                </div>
                <div class="hl-num">5</div>
                <div class="hl-label">Core Programmes</div>
                <div class="hl-desc">Quran, Hifz, Arabic, Islamic Studies &amp; Duas</div>
            </div>
        </div>

        {{-- Achievement cards below stats --}}
        <div class="achieve-grid" style="margin-top:40px;">
            <div class="achieve-card">
                <div class="achieve-icon">
                    <svg width="26" height="26" fill="none" stroke="#3f9087" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <h4>First Hifz Graduates</h4>
                    <p>In 2018, Nabaath celebrated its first batch of Hifz graduates — six children who completed memorisation of the entire Quran under the guidance of our Ustadhs. Their ceremony moved every parent to tears of joy.</p>
                </div>
            </div>

            <div class="achieve-card">
                <div class="achieve-icon">
                    <svg width="26" height="26" fill="none" stroke="#3f9087" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0H3"/>
                    </svg>
                </div>
                <div>
                    <h4>Online Programme Launch</h4>
                    <p>Our 2019 online expansion brought Nabaath to families in over 8 countries. Within six months, our online cohort matched the size of our original in-person programme — proof that the need was everywhere.</p>
                </div>
            </div>

            <div class="achieve-card">
                <div class="achieve-icon">
                    <svg width="26" height="26" fill="none" stroke="#3f9087" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/>
                    </svg>
                </div>
                <div>
                    <h4>Community Recognition</h4>
                    <p>Recognised by local Islamic scholars and community leaders for our contribution to Islamic education. In 2022, we received a commendation from regional Islamic education bodies for our child-centred methodology.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── THE FOUNDERS ── --}}
<section class="section" id="founders">
    <div class="section-inner">
        <div class="section-header center">
            <div class="section-tag gold-tag">
                <svg width="12" height="12" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
                Our Founders
            </div>
            <h2 class="section-title">The Hearts Behind <span class="accent">Nabaath</span></h2>
            <p class="section-sub">
                Founded by passionate educators and devoted Muslims, Nabaath Learning Point was built
                on a shared dream — to make quality Islamic education accessible to every child.
            </p>
        </div>

        <div class="founders-grid">
            <div class="founder-card">
                <div style="display:flex;align-items:center;gap:16px;">
                    <div class="founder-avatar">م</div>
                    <div class="founder-info">
                        <h3>Ustadh Mohammed</h3>
                        <span>Co-Founder &amp; Head of Quran Studies</span>
                    </div>
                </div>
                <div class="founder-quote">
                    <p>We started Nabaath because we believed every child, regardless of background, deserves to experience the beauty of the Quran and the warmth of Islamic knowledge.</p>
                </div>
                <div class="founder-tags">
                    <span class="founder-tag">Quran Specialist</span>
                    <span class="founder-tag">Tajweed Expert</span>
                    <span class="founder-tag">10+ Years Teaching</span>
                </div>
            </div>

            <div class="founder-card">
                <div style="display:flex;align-items:center;gap:16px;">
                    <div class="founder-avatar">ف</div>
                    <div class="founder-info">
                        <h3>Ustazah Fatima</h3>
                        <span>Co-Founder &amp; Head of Islamic Studies</span>
                    </div>
                </div>
                <div class="founder-quote">
                    <p>My vision was to create a space where children feel safe, loved, and inspired — where learning about Islam is the most exciting part of their day.</p>
                </div>
                <div class="founder-tags">
                    <span class="founder-tag">Islamic Studies</span>
                    <span class="founder-tag">Child Education</span>
                    <span class="founder-tag">Curriculum Designer</span>
                </div>
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
        <a href="{{ route('home') }}" class="btn-outline">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
            </svg>
            Back to Home
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
