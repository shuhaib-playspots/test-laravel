<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nabaath Learning Point &mdash; Islamic Education for Kids</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800,900|amiri:400,700" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --brand:       #3f9087;
            --brand-dark:  #2d6e67;
            --brand-light: #e8f5f4;
            --brand-mid:   #5aada3;
            --gold:        #c9a84c;
            --gold-light:  #fdf4e0;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body { font-family: 'Inter', sans-serif; color: #1a2e2c; overflow-x: hidden; }

        /* ── Navbar ── */
        .navbar {
            position: fixed; top: 0; left: 0; right: 0; z-index: 1000;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(63,144,135,0.12);
            transition: box-shadow .3s;
        }
        .navbar.scrolled { box-shadow: 0 4px 24px rgba(63,144,135,0.15); }
        .nav-inner {
            max-width: 1200px; margin: 0 auto;
            padding: 0 24px;
            display: flex; align-items: center; justify-content: space-between;
            height: 72px;
        }
        .nav-logo { display: flex; align-items: center; gap: 10px; text-decoration: none; }
        .nav-logo-icon {
            width: 42px; height: 42px; border-radius: 12px;
            background: var(--brand);
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 4px 12px rgba(63,144,135,0.35);
        }
        .nav-logo-text { line-height: 1.1; }
        .nav-logo-text strong { display: block; font-size: 16px; font-weight: 700; color: var(--brand-dark); }
        .nav-logo-text span  { font-size: 10px; font-weight: 500; color: #888; letter-spacing: .5px; text-transform: uppercase; }
        .nav-links { display: flex; align-items: center; gap: 32px; }
        .nav-links a { font-size: 14px; font-weight: 500; color: #4a5568; text-decoration: none; transition: color .2s; }
        .nav-links a:hover { color: var(--brand); }
        .nav-cta {
            background: var(--brand); color: #fff;
            padding: 10px 22px; border-radius: 50px;
            font-size: 14px; font-weight: 600;
            text-decoration: none;
            transition: background .2s, transform .2s, box-shadow .2s;
            box-shadow: 0 4px 14px rgba(63,144,135,0.35);
        }
        .nav-cta:hover { background: var(--brand-dark); transform: translateY(-1px); box-shadow: 0 6px 20px rgba(63,144,135,0.4); }
        .hamburger { display: none; flex-direction: column; gap: 5px; cursor: pointer; padding: 4px; }
        .hamburger span { width: 24px; height: 2px; background: var(--brand); border-radius: 2px; transition: all .3s; }

        /* ── Hero ── */
        .hero {
            min-height: 100vh;
            background: linear-gradient(135deg, #0d3532 0%, #1a5c55 40%, #2d8078 70%, #3f9087 100%);
            display: flex; align-items: center; justify-content: center;
            position: relative; overflow: hidden;
            padding: 100px 24px 60px;
        }
        .hero-bg-pattern {
            position: absolute; inset: 0; opacity: .06;
            background-image:
                repeating-linear-gradient(45deg, #fff 0, #fff 1px, transparent 0, transparent 50%),
                repeating-linear-gradient(-45deg, #fff 0, #fff 1px, transparent 0, transparent 50%);
            background-size: 40px 40px;
        }
        .hero-orb {
            position: absolute; border-radius: 50%;
            background: rgba(255,255,255,0.06);
            animation: float 8s ease-in-out infinite;
        }
        .hero-orb-1 { width: 500px; height: 500px; top: -150px; right: -100px; animation-delay: 0s; }
        .hero-orb-2 { width: 300px; height: 300px; bottom: -80px; left: -60px; animation-delay: 3s; }
        .hero-orb-3 { width: 200px; height: 200px; top: 50%; right: 20%; animation-delay: 5s; }
        @keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-20px)} }

        /* Floating Arabic letters */
        .arabic-letter {
            position: absolute; font-family: 'Amiri', serif;
            color: rgba(255,255,255,0.12); font-weight: 700;
            animation: floatLetter 10s ease-in-out infinite;
            user-select: none; pointer-events: none;
        }
        @keyframes floatLetter {
            0%,100%{transform:translateY(0) rotate(0deg)}
            33%{transform:translateY(-15px) rotate(5deg)}
            66%{transform:translateY(10px) rotate(-3deg)}
        }

        .hero-inner {
            max-width: 1200px; width: 100%;
            display: grid; grid-template-columns: 1fr 1fr;
            gap: 60px; align-items: center;
            position: relative; z-index: 2;
        }
        .hero-badge {
            display: inline-flex; align-items: center; gap: 8px;
            background: rgba(201,168,76,0.2); border: 1px solid rgba(201,168,76,0.4);
            color: #f0d080; padding: 6px 16px; border-radius: 50px;
            font-size: 12px; font-weight: 600; letter-spacing: .5px;
            text-transform: uppercase; margin-bottom: 20px;
        }
        .hero-title {
            font-size: clamp(36px, 5vw, 60px); font-weight: 800;
            color: #fff; line-height: 1.1; margin-bottom: 20px;
        }
        .hero-title .accent { color: #7dd3c9; }
        .hero-title .gold { color: #f0d080; }
        .hero-desc {
            font-size: 16px; line-height: 1.75; color: rgba(255,255,255,0.75);
            margin-bottom: 36px; max-width: 480px;
        }
        .hero-actions { display: flex; gap: 16px; flex-wrap: wrap; }
        .btn-primary {
            background: #fff; color: var(--brand-dark);
            padding: 14px 32px; border-radius: 50px;
            font-size: 15px; font-weight: 700;
            text-decoration: none; transition: all .2s;
            box-shadow: 0 8px 24px rgba(0,0,0,0.2);
            display: inline-flex; align-items: center; gap: 8px;
        }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 12px 30px rgba(0,0,0,0.3); }
        .btn-outline {
            background: transparent;
            border: 2px solid rgba(255,255,255,0.5);
            color: #fff;
            padding: 14px 28px; border-radius: 50px;
            font-size: 15px; font-weight: 600;
            text-decoration: none; transition: all .2s;
            display: inline-flex; align-items: center; gap: 8px;
        }
        .btn-outline:hover { background: rgba(255,255,255,0.1); border-color: #fff; }
        .hero-stats {
            display: flex; gap: 32px; margin-top: 40px;
        }
        .hero-stat { text-align: left; }
        .hero-stat-num { font-size: 28px; font-weight: 800; color: #fff; }
        .hero-stat-lbl { font-size: 12px; color: rgba(255,255,255,0.6); font-weight: 500; }

        /* Hero visual side */
        .hero-visual { display: flex; justify-content: center; align-items: center; }
        .hero-card-stack { position: relative; width: 360px; height: 420px; }
        .hero-main-card {
            position: absolute; inset: 0;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 28px;
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            gap: 16px; padding: 40px;
        }
        .hero-card-icon {
            width: 100px; height: 100px; border-radius: 50%;
            background: rgba(255,255,255,0.15);
            border: 3px solid rgba(255,255,255,0.3);
            display: flex; align-items: center; justify-content: center;
            font-family: 'Amiri', serif; font-size: 52px; color: #fff;
        }
        .hero-card-tag {
            background: rgba(201,168,76,0.3); border: 1px solid rgba(201,168,76,0.5);
            color: #f0d080; padding: 5px 14px; border-radius: 50px;
            font-size: 11px; font-weight: 600; letter-spacing: .5px;
        }
        .hero-card-label { color: #fff; font-size: 16px; font-weight: 600; text-align: center; }
        .hero-card-sub { color: rgba(255,255,255,0.65); font-size: 13px; text-align: center; line-height: 1.6; }
        .hero-float-badge {
            position: absolute;
            background: #fff; border-radius: 16px;
            padding: 10px 16px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.2);
            display: flex; align-items: center; gap: 10px;
            animation: float 6s ease-in-out infinite;
        }
        .hero-float-badge-1 { top: -20px; right: -20px; animation-delay: 0s; }
        .hero-float-badge-2 { bottom: 30px; left: -30px; animation-delay: 2s; }
        .hfb-icon { width: 36px; height: 36px; border-radius: 10px; display: flex; align-items: center; justify-content: center; }
        .hfb-text strong { display: block; font-size: 13px; font-weight: 700; color: #1a2e2c; }
        .hfb-text span { font-size: 11px; color: #888; }

        /* ── Section base ── */
        .section { padding: 90px 24px; }
        .section-inner { max-width: 1200px; margin: 0 auto; }
        .section-tag {
            display: inline-flex; align-items: center; gap: 6px;
            background: var(--brand-light); color: var(--brand);
            padding: 5px 14px; border-radius: 50px;
            font-size: 12px; font-weight: 600; letter-spacing: .5px;
            text-transform: uppercase; margin-bottom: 16px;
        }
        .section-tag.gold-tag { background: var(--gold-light); color: var(--gold); }
        .section-title {
            font-size: clamp(26px, 4vw, 40px); font-weight: 800;
            color: #1a2e2c; line-height: 1.2; margin-bottom: 14px;
        }
        .section-title .accent { color: var(--brand); }
        .section-title .gold { color: var(--gold); }
        .section-sub {
            font-size: 16px; line-height: 1.75; color: #5a7270;
            max-width: 600px;
        }
        .section-header { margin-bottom: 56px; }
        .section-header.center { text-align: center; }
        .section-header.center .section-sub { margin: 0 auto; }

        /* ── What is Nabaath ── */
        .what-grid {
            display: grid; grid-template-columns: 1fr 1fr;
            gap: 64px; align-items: center;
        }
        .what-visual {
            background: linear-gradient(135deg, var(--brand-light) 0%, #d0ede9 100%);
            border-radius: 28px; padding: 48px 40px;
            position: relative; overflow: hidden;
        }
        .what-visual::before {
            content: 'نباط'; font-family: 'Amiri', serif;
            font-size: 120px; font-weight: 700;
            color: rgba(63,144,135,0.08);
            position: absolute; right: -10px; bottom: -20px;
            line-height: 1;
        }
        .what-visual-inner {
            position: relative; z-index: 1;
            display: flex; flex-direction: column; gap: 20px;
        }
        .what-pill {
            display: flex; align-items: center; gap: 14px;
            background: #fff; border-radius: 16px; padding: 16px 20px;
            box-shadow: 0 2px 12px rgba(63,144,135,0.1);
        }
        .what-pill-icon {
            width: 44px; height: 44px; border-radius: 12px;
            background: var(--brand-light); display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .what-pill strong { font-size: 14px; font-weight: 700; color: #1a2e2c; }
        .what-pill span  { font-size: 12px; color: #7a9190; margin-top: 2px; display: block; }

        .what-content { display: flex; flex-direction: column; gap: 20px; }
        .what-point { display: flex; gap: 16px; align-items: flex-start; }
        .what-point-num {
            width: 36px; height: 36px; border-radius: 10px;
            background: var(--brand); color: #fff;
            font-size: 14px; font-weight: 700;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0; margin-top: 2px;
        }
        .what-point h4 { font-size: 15px; font-weight: 700; color: #1a2e2c; margin-bottom: 4px; }
        .what-point p { font-size: 14px; color: #5a7270; line-height: 1.6; }

        /* ── Classes section ── */
        .classes-section { background: linear-gradient(135deg, #0d3532 0%, #1a5c55 100%); }
        .classes-section .section-title,
        .classes-section .section-sub { color: rgba(255,255,255,0.9); }
        .classes-section .section-sub { color: rgba(255,255,255,0.65); }
        .classes-section .section-tag { background: rgba(255,255,255,0.1); color: rgba(255,255,255,0.8); }
        .classes-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
        .class-card {
            border-radius: 20px;
            border: 1px solid rgba(255,255,255,0.12);
            background: rgba(255,255,255,0.06);
            backdrop-filter: blur(10px);
            padding: 32px 28px;
            transition: all .3s;
            position: relative; overflow: hidden;
        }
        .class-card:hover {
            background: rgba(255,255,255,0.12);
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(0,0,0,0.3);
        }
        .class-card::after {
            content: ''; position: absolute;
            top: 0; left: 0; right: 0; height: 3px;
            background: linear-gradient(90deg, var(--brand), var(--brand-mid));
            border-radius: 20px 20px 0 0;
        }
        .class-icon {
            width: 56px; height: 56px; border-radius: 16px;
            background: rgba(255,255,255,0.1);
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 20px;
        }
        .class-card h3 { font-size: 18px; font-weight: 700; color: #fff; margin-bottom: 10px; }
        .class-card p { font-size: 14px; color: rgba(255,255,255,0.65); line-height: 1.7; }
        .class-tag {
            display: inline-block; margin-top: 16px;
            background: rgba(63,144,135,0.3); color: #7dd3c9;
            padding: 4px 12px; border-radius: 50px;
            font-size: 11px; font-weight: 600;
        }

        /* ── About us ── */
        .about-grid {
            display: grid; grid-template-columns: 1fr 1fr;
            gap: 64px; align-items: center;
        }
        .about-img {
            border-radius: 28px; overflow: hidden;
            background: linear-gradient(145deg, var(--brand) 0%, var(--brand-dark) 100%);
            aspect-ratio: 4/5; position: relative;
            display: flex; align-items: center; justify-content: center;
        }
        .about-img-pattern {
            position: absolute; inset: 0; opacity: .08;
            background-image: repeating-linear-gradient(
                60deg, #fff 0, #fff 1px, transparent 0, transparent 30px
            );
        }
        .about-img-content { position: relative; z-index: 1; text-align: center; padding: 40px; }
        .about-arabic {
            font-family: 'Amiri', serif; font-size: 72px;
            color: rgba(255,255,255,0.9); line-height: 1.2;
            display: block; margin-bottom: 16px;
        }
        .about-img-sub { color: rgba(255,255,255,0.7); font-size: 14px; }
        .about-stats-bar {
            display: grid; grid-template-columns: repeat(3,1fr);
            gap: 12px; margin-top: 24px;
        }
        .about-stat-box {
            background: rgba(255,255,255,0.15); border-radius: 16px;
            padding: 14px 10px; text-align: center;
        }
        .about-stat-box strong { display: block; color: #fff; font-size: 20px; font-weight: 800; }
        .about-stat-box span { color: rgba(255,255,255,0.7); font-size: 10px; font-weight: 500; }
        .about-content { display: flex; flex-direction: column; gap: 24px; }
        .about-value {
            display: flex; gap: 16px; align-items: flex-start;
            padding: 20px; background: var(--brand-light);
            border-radius: 16px; border-left: 4px solid var(--brand);
        }
        .about-value h4 { font-size: 15px; font-weight: 700; color: var(--brand-dark); margin-bottom: 4px; }
        .about-value p { font-size: 14px; color: #5a7270; line-height: 1.6; }

        /* ── Included programs ── */
        .programs-section { background: var(--brand-light); }
        .programs-grid { display: grid; grid-template-columns: repeat(4,1fr); gap: 20px; }
        .program-card {
            background: #fff; border-radius: 20px;
            padding: 28px 22px; text-align: center;
            box-shadow: 0 2px 16px rgba(63,144,135,0.08);
            transition: all .3s; position: relative; overflow: hidden;
        }
        .program-card:hover { transform: translateY(-6px); box-shadow: 0 12px 40px rgba(63,144,135,0.18); }
        .program-card::before {
            content: ''; position: absolute;
            bottom: 0; left: 0; right: 0; height: 0;
            background: linear-gradient(0deg, var(--brand-light), transparent);
            transition: height .3s;
        }
        .program-card:hover::before { height: 50%; }
        .prog-icon {
            width: 64px; height: 64px; border-radius: 18px;
            background: var(--brand-light);
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 16px; position: relative; z-index: 1;
            transition: background .3s;
        }
        .program-card:hover .prog-icon { background: var(--brand); }
        .program-card:hover .prog-icon svg { stroke: #fff; }
        .program-card h3 { font-size: 15px; font-weight: 700; color: #1a2e2c; margin-bottom: 8px; position: relative; z-index: 1; }
        .program-card p { font-size: 13px; color: #7a9190; line-height: 1.6; position: relative; z-index: 1; }
        .prog-number {
            position: absolute; top: 16px; right: 16px;
            font-size: 36px; font-weight: 900; color: rgba(63,144,135,0.07);
            line-height: 1; font-style: italic;
        }

        /* ── Founders ── */
        .founders-grid { display: grid; grid-template-columns: repeat(2,1fr); gap: 32px; max-width: 900px; margin: 0 auto; }
        .founder-card {
            background: #fff; border-radius: 24px;
            padding: 36px 32px;
            box-shadow: 0 4px 24px rgba(63,144,135,0.1);
            display: flex; flex-direction: column; gap: 20px;
            transition: all .3s;
            border: 1px solid rgba(63,144,135,0.1);
        }
        .founder-card:hover { transform: translateY(-4px); box-shadow: 0 12px 40px rgba(63,144,135,0.18); }
        .founder-avatar {
            width: 80px; height: 80px; border-radius: 50%;
            background: linear-gradient(135deg, var(--brand) 0%, var(--brand-dark) 100%);
            display: flex; align-items: center; justify-content: center;
            font-family: 'Amiri', serif; font-size: 28px; color: #fff;
            font-weight: 700;
            border: 3px solid var(--brand-light);
            box-shadow: 0 4px 16px rgba(63,144,135,0.3);
        }
        .founder-info h3 { font-size: 18px; font-weight: 700; color: #1a2e2c; margin-bottom: 4px; }
        .founder-info span { font-size: 13px; color: var(--brand); font-weight: 600; }
        .founder-quote {
            font-size: 14px; color: #5a7270; line-height: 1.75;
            padding: 16px 18px;
            background: var(--brand-light);
            border-radius: 12px;
            border-left: 3px solid var(--brand);
            font-style: italic;
            position: relative;
        }
        .founder-quote::before {
            content: '\201C';
            font-size: 40px; color: var(--brand); opacity: .4;
            position: absolute; top: -5px; left: 12px;
            font-family: Georgia, serif; line-height: 1;
        }
        .founder-quote p { padding-left: 20px; }
        .founder-tags { display: flex; gap: 8px; flex-wrap: wrap; }
        .founder-tag {
            background: var(--brand-light); color: var(--brand);
            padding: 4px 12px; border-radius: 50px;
            font-size: 11px; font-weight: 600;
        }

        /* ── CTA banner ── */
        .cta-section {
            background: linear-gradient(135deg, var(--brand) 0%, var(--brand-dark) 100%);
            padding: 80px 24px; text-align: center; position: relative; overflow: hidden;
        }
        .cta-section::before {
            content: 'نباط'; font-family: 'Amiri', serif; font-size: 200px;
            color: rgba(255,255,255,0.04); position: absolute;
            top: 50%; left: 50%; transform: translate(-50%,-50%);
            white-space: nowrap; pointer-events: none;
        }
        .cta-section h2 { font-size: clamp(26px,4vw,42px); font-weight: 800; color: #fff; margin-bottom: 14px; position: relative; z-index: 1; }
        .cta-section p { font-size: 16px; color: rgba(255,255,255,0.75); margin-bottom: 36px; position: relative; z-index: 1; }
        .cta-btns { display: flex; gap: 16px; justify-content: center; flex-wrap: wrap; position: relative; z-index: 1; }

        /* ── Footer ── */
        .footer { background: #0d3532; color: rgba(255,255,255,0.7); padding: 64px 24px 32px; }
        .footer-inner { max-width: 1200px; margin: 0 auto; }
        .footer-top {
            display: grid; grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 40px; margin-bottom: 48px;
        }
        .footer-brand strong { display: block; color: #fff; font-size: 18px; margin-bottom: 4px; }
        .footer-brand p { font-size: 13px; line-height: 1.7; margin-top: 12px; }
        .footer-col h4 { color: #fff; font-size: 14px; font-weight: 600; margin-bottom: 16px; }
        .footer-col a {
            display: block; color: rgba(255,255,255,0.6);
            text-decoration: none; font-size: 13px;
            margin-bottom: 10px; transition: color .2s;
        }
        .footer-col a:hover { color: var(--brand-mid); }
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.08);
            padding-top: 24px; display: flex;
            justify-content: space-between; align-items: center;
            font-size: 12px;
        }

        /* ── Floating Buttons ── */
        .float-btn {
            position: fixed; bottom: 100px; z-index: 999;
            display: flex; flex-direction: column; align-items: center; gap: 6px;
        }
        .float-btn.right { right: 24px; }
        .float-btn.left  { left: 24px; }
        .float-circle {
            width: 56px; height: 56px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            text-decoration: none; transition: all .3s;
            box-shadow: 0 6px 20px rgba(0,0,0,0.2);
        }
        .float-circle.get-started { background: var(--brand); }
        .float-circle.call-btn    { background: #25d366; }
        .float-circle:hover { transform: scale(1.1) translateY(-2px); box-shadow: 0 10px 28px rgba(0,0,0,0.3); }
        .float-label {
            font-size: 10px; font-weight: 600; color: #fff;
            background: rgba(0,0,0,0.6); padding: 3px 8px;
            border-radius: 10px; white-space: nowrap;
            backdrop-filter: blur(4px);
        }
        .float-pulse {
            position: absolute; border-radius: 50%;
            animation: pulse 2s ease-out infinite;
        }
        .float-circle.get-started .float-pulse { background: var(--brand); width: 56px; height: 56px; }
        .float-circle.call-btn    .float-pulse { background: #25d366; width: 56px; height: 56px; }
        @keyframes pulse {
            0%   { transform: scale(1); opacity: .7; }
            100% { transform: scale(2); opacity: 0; }
        }

        /* ── Responsive ── */
        @media(max-width:1024px){
            .hero-inner       { grid-template-columns: 1fr; text-align: center; }
            .hero-visual      { display: none; }
            .hero-actions     { justify-content: center; }
            .hero-stats       { justify-content: center; }
            .what-grid        { grid-template-columns: 1fr; }
            .about-grid       { grid-template-columns: 1fr; }
            .about-img        { aspect-ratio: 16/7; }
            .programs-grid    { grid-template-columns: repeat(2,1fr); }
            .footer-top       { grid-template-columns: 1fr 1fr; }
        }
        @media(max-width:768px){
            .nav-links, .nav-cta { display: none; }
            .hamburger { display: flex; }
            .classes-grid     { grid-template-columns: 1fr; }
            .founders-grid    { grid-template-columns: 1fr; }
            .programs-grid    { grid-template-columns: 1fr 1fr; }
            .hero-stats       { flex-wrap: wrap; gap: 20px; }
            .footer-top       { grid-template-columns: 1fr; }
            .footer-bottom    { flex-direction: column; gap: 8px; text-align: center; }
        }
        @media(max-width:480px){
            .programs-grid { grid-template-columns: 1fr; }
            .float-btn { bottom: 80px; }
            .float-circle { width: 50px; height: 50px; }
        }
    </style>
</head>
<body>

{{-- ── NAVBAR ── --}}
<nav class="navbar" id="navbar">
    <div class="nav-inner">
        <a href="/" class="nav-logo">
            <div class="nav-logo-icon">
                <svg width="22" height="22" fill="none" stroke="#fff" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                </svg>
            </div>
            <div class="nav-logo-text">
                <strong>Nabaath</strong>
                <span>Learning Point</span>
            </div>
        </a>

        <div class="nav-links">
            <a href="{{ route('about') }}">About Us</a>
            <a href="{{ route('courses.index') }}">Courses</a>
            <a href="#classes">Our Classes</a>
            <a href="#programs">Programs</a>
            <a href="#contact">Contact</a>
        </div>

        <a href="{{ route('get-started') }}" class="nav-cta">Get Started</a>

        <div class="hamburger" onclick="toggleMenu()">
            <span></span><span></span><span></span>
        </div>
    </div>
</nav>

{{-- ── HERO ── --}}
<section class="hero" id="home">
    <div class="hero-bg-pattern"></div>
    <div class="hero-orb hero-orb-1"></div>
    <div class="hero-orb hero-orb-2"></div>
    <div class="hero-orb hero-orb-3"></div>

    {{-- Floating Arabic letters --}}
    <span class="arabic-letter" style="font-size:64px;top:15%;left:8%;animation-delay:0s;">ا</span>
    <span class="arabic-letter" style="font-size:48px;top:70%;left:5%;animation-delay:2s;">ب</span>
    <span class="arabic-letter" style="font-size:56px;top:30%;right:5%;animation-delay:1s;">ج</span>
    <span class="arabic-letter" style="font-size:40px;top:75%;right:8%;animation-delay:3s;">د</span>
    <span class="arabic-letter" style="font-size:44px;top:50%;left:3%;animation-delay:4s;">ن</span>

    <div class="hero-inner">
        <div>
            <div class="hero-badge">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
                Islamic Learning for Kids
            </div>
            <h1 class="hero-title">
                Learn <span class="accent">Arabic</span> &amp;<br>
                <span class="gold">Quran</span> the Right Way
            </h1>
            <p class="hero-desc">
                Nabaath Learning Point is an Islamic-based education institution dedicated to nurturing
                children's spiritual and academic growth through Quran, Arabic, and Islamic studies —
                in a loving, structured, and engaging environment.
            </p>
            <div class="hero-actions">
                <a href="{{ route('get-started') }}" class="btn-primary">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/>
                    </svg>
                    Get Started Today
                </a>
                <a href="#about" class="btn-outline">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z"/>
                    </svg>
                    Learn More
                </a>
            </div>
            <div class="hero-stats">
                <div class="hero-stat">
                    <div class="hero-stat-num">500+</div>
                    <div class="hero-stat-lbl">Students Enrolled</div>
                </div>
                <div class="hero-stat">
                    <div class="hero-stat-num">10+</div>
                    <div class="hero-stat-lbl">Years of Experience</div>
                </div>
                <div class="hero-stat">
                    <div class="hero-stat-num">100%</div>
                    <div class="hero-stat-lbl">Islamic Values</div>
                </div>
            </div>
        </div>

        <div class="hero-visual">
            <div class="hero-card-stack">
                <div class="hero-main-card">
                    <div class="hero-card-icon">&#x646;</div>
                    <div class="hero-card-tag">Est. with Love</div>
                    <div class="hero-card-label">Nabaath Learning Point</div>
                    <div class="hero-card-sub">Guiding young minds through the light of Islamic knowledge and the beauty of the Quran.</div>
                </div>
                <div class="hero-float-badge hero-float-badge-1">
                    <div class="hfb-icon" style="background:#e8f5f4;">
                        <svg width="18" height="18" fill="none" stroke="#3f9087" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="hfb-text">
                        <strong>Quran Classes</strong>
                        <span>Tajweed &amp; Hifz</span>
                    </div>
                </div>
                <div class="hero-float-badge hero-float-badge-2">
                    <div class="hfb-icon" style="background:#fdf4e0;">
                        <svg width="18" height="18" fill="none" stroke="#c9a84c" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"/>
                        </svg>
                    </div>
                    <div class="hfb-text">
                        <strong>Arabic Language</strong>
                        <span>Speaking &amp; Writing</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── WHAT IS NABAATH ── --}}
<section class="section" id="nabaath">
    <div class="section-inner">
        <div class="what-grid">
            <div class="what-visual">
                <div class="what-visual-inner">
                    <div class="what-pill">
                        <div class="what-pill-icon">
                            <svg width="22" height="22" fill="none" stroke="#3f9087" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                            </svg>
                        </div>
                        <div>
                            <strong>Quran &amp; Hifz</strong>
                            <span>Memorization with proper Tajweed</span>
                        </div>
                    </div>
                    <div class="what-pill">
                        <div class="what-pill-icon">
                            <svg width="22" height="22" fill="none" stroke="#3f9087" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 21l5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 016-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 01-3.827-5.802"/>
                            </svg>
                        </div>
                        <div>
                            <strong>Arabic Language</strong>
                            <span>Reading, writing &amp; speaking</span>
                        </div>
                    </div>
                    <div class="what-pill">
                        <div class="what-pill-icon">
                            <svg width="22" height="22" fill="none" stroke="#3f9087" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"/>
                            </svg>
                        </div>
                        <div>
                            <strong>Islamic Studies</strong>
                            <span>Fiqh, Aqeedah &amp; Seerah</span>
                        </div>
                    </div>
                    <div class="what-pill">
                        <div class="what-pill-icon">
                            <svg width="22" height="22" fill="none" stroke="#3f9087" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                            </svg>
                        </div>
                        <div>
                            <strong>Expert Ustadhs</strong>
                            <span>Qualified Islamic educators</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="what-content">
                <div>
                    <div class="section-tag">
                        <svg width="12" height="12" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                        What is Nabaath
                    </div>
                    <h2 class="section-title">Nurturing Young<br>Minds with <span class="accent">Islamic Values</span></h2>
                    <p class="section-sub" style="margin-bottom:32px;">
                        <strong>Nabaath</strong> (نبات) means "growth" — and that is exactly our mission.
                        We are an Islamic-based learning institution dedicated to helping children grow
                        in faith, knowledge, and character through a structured and caring educational environment.
                    </p>
                </div>

                <div class="what-point">
                    <div class="what-point-num">01</div>
                    <div>
                        <h4>Faith-Centered Learning</h4>
                        <p>Every lesson is grounded in Islamic principles, ensuring children develop a strong connection with their deen alongside academic excellence.</p>
                    </div>
                </div>
                <div class="what-point">
                    <div class="what-point-num">02</div>
                    <div>
                        <h4>Child-Friendly Approach</h4>
                        <p>Our curriculum is designed specifically for young learners, making complex concepts accessible, engaging, and enjoyable for children of all ages.</p>
                    </div>
                </div>
                <div class="what-point">
                    <div class="what-point-num">03</div>
                    <div>
                        <h4>Holistic Development</h4>
                        <p>We focus on the complete growth of a child — spiritual, intellectual, and character development — preparing them for life guided by Islamic values.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── OUR WAY OF CLASSES ── --}}
<section class="section classes-section" id="classes">
    <div class="section-inner">
        <div class="section-header center">
            <div class="section-tag">Our Methodology</div>
            <h2 class="section-title" style="color:#fff;">Our Way of <span style="color:#7dd3c9;">Teaching</span></h2>
            <p class="section-sub" style="color:rgba(255,255,255,0.65);margin:0 auto;">
                We combine traditional Islamic teaching methods with modern, child-centered educational
                approaches to create an enriching learning experience.
            </p>
        </div>

        <div class="classes-grid">
            <div class="class-card">
                <div class="class-icon">
                    <svg width="28" height="28" fill="none" stroke="#7dd3c9" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                    </svg>
                </div>
                <h3>One-on-One Quran Sessions</h3>
                <p>Personalized Quran recitation classes where each child receives individual attention from a qualified Ustadh, ensuring correct Tajweed and steady progress.</p>
                <span class="class-tag">Quran &amp; Tajweed</span>
            </div>

            <div class="class-card">
                <div class="class-icon">
                    <svg width="28" height="28" fill="none" stroke="#7dd3c9" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                    </svg>
                </div>
                <h3>Small Group Classes</h3>
                <p>Interactive small group sessions for Arabic language and Islamic studies, fostering collaboration, discussion, and peer learning in a safe, supportive environment.</p>
                <span class="class-tag">Arabic &amp; Islamic Studies</span>
            </div>

            <div class="class-card">
                <div class="class-icon">
                    <svg width="28" height="28" fill="none" stroke="#7dd3c9" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0H3"/>
                    </svg>
                </div>
                <h3>Online Live Classes</h3>
                <p>High-quality live online sessions accessible from anywhere, allowing children to learn from the comfort of their home with real-time interaction and guidance.</p>
                <span class="class-tag">Online &amp; Flexible</span>
            </div>

            <div class="class-card">
                <div class="class-icon">
                    <svg width="28" height="28" fill="none" stroke="#7dd3c9" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/>
                    </svg>
                </div>
                <h3>Gamified Learning Activities</h3>
                <p>Engaging, reward-based learning activities that make memorization, vocabulary, and Islamic knowledge fun and exciting for young learners.</p>
                <span class="class-tag">Interactive &amp; Fun</span>
            </div>

            <div class="class-card">
                <div class="class-icon">
                    <svg width="28" height="28" fill="none" stroke="#7dd3c9" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3>Flexible Scheduling</h3>
                <p>Classes designed around family life, with morning, afternoon, and evening slots available on weekdays and weekends to suit every family's schedule.</p>
                <span class="class-tag">Weekdays &amp; Weekends</span>
            </div>

            <div class="class-card">
                <div class="class-icon">
                    <svg width="28" height="28" fill="none" stroke="#7dd3c9" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/>
                    </svg>
                </div>
                <h3>Progress Tracking</h3>
                <p>Regular assessments and detailed progress reports keep parents informed of their child's spiritual and academic development throughout the program.</p>
                <span class="class-tag">Transparent Reporting</span>
            </div>
        </div>
    </div>
</section>

{{-- ── ABOUT US ── --}}
<section class="section" id="about">
    <div class="section-inner">
        <div class="about-grid">
            <div class="about-img">
                <div class="about-img-pattern"></div>
                <div class="about-img-content">
                    <span class="about-arabic">نبات</span>
                    <p class="about-img-sub">Nabaath — meaning "Growth"</p>
                    <div class="about-stats-bar">
                        <div class="about-stat-box">
                            <strong>500+</strong>
                            <span>Students</span>
                        </div>
                        <div class="about-stat-box">
                            <strong>10+</strong>
                            <span>Years</span>
                        </div>
                        <div class="about-stat-box">
                            <strong>20+</strong>
                            <span>Educators</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="about-content">
                <div>
                    <div class="section-tag">About Us</div>
                    <h2 class="section-title">Rooted in <span class="accent">Faith</span>,<br>Growing in <span class="gold">Knowledge</span></h2>
                    <p class="section-sub">
                        Nabaath Learning Point was founded with a simple but powerful belief — every Muslim child
                        deserves access to quality Islamic education delivered with love, care, and excellence.
                        We are more than a learning centre; we are a community that grows together.
                    </p>
                </div>

                <div class="about-value">
                    <div style="flex-shrink:0;margin-top:2px;">
                        <svg width="22" height="22" fill="none" stroke="#3f9087" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h4>Our Mission</h4>
                        <p>To provide authentic, high-quality Islamic education to children, nurturing their love for Allah, the Quran, and the Sunnah through compassionate and structured teaching.</p>
                    </div>
                </div>

                <div class="about-value">
                    <div style="flex-shrink:0;margin-top:2px;">
                        <svg width="22" height="22" fill="none" stroke="#3f9087" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h4>Our Vision</h4>
                        <p>To be the leading Islamic learning institution for children, where every student leaves with strong faith, a love of learning, and the tools to navigate the modern world as proud Muslims.</p>
                    </div>
                </div>

                <div class="about-value">
                    <div style="flex-shrink:0;margin-top:2px;">
                        <svg width="22" height="22" fill="none" stroke="#3f9087" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                        </svg>
                    </div>
                    <div>
                        <h4>Our Values</h4>
                        <p>Sincerity (Ikhlaas), Excellence (Ihsaan), Compassion (Rahmah), and Community (Ummah) — these core values guide everything we do at Nabaath.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── WHAT'S INCLUDED ── --}}
<section class="section programs-section" id="programs">
    <div class="section-inner">
        <div class="section-header center">
            <div class="section-tag">
                <svg width="12" height="12" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
                Our Programs
            </div>
            <h2 class="section-title">What's Included in Our<br><span class="accent">Learning Programs</span></h2>
            <p class="section-sub">
                A comprehensive curriculum designed to give every child a complete Islamic education —
                from Quranic foundations to practical daily knowledge.
            </p>
        </div>

        <div class="programs-grid">
            @php
            $programs = [
                ['num'=>'01','title'=>'Quran Recitation','desc'=>'Proper recitation with Makharij and Tajweed rules from beginner level to advanced reading.','icon'=>'M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0118 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25'],
                ['num'=>'02','title'=>'Hifz ul Quran','desc'=>'Structured memorization program with daily revision, tracking, and motivational milestones.','icon'=>'M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5'],
                ['num'=>'03','title'=>'Arabic Language','desc'=>'Speaking, reading, and writing in Arabic using age-appropriate, interactive methods.','icon'=>'M10.5 21l5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 016-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 01-3.827-5.802'],
                ['num'=>'04','title'=>'Islamic Studies','desc'=>'Age-appropriate Fiqh, Aqeedah, Seerah, and Adab lessons to build a strong Islamic identity.','icon'=>'M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5'],
                ['num'=>'05','title'=>'Duas &amp; Adhkar','desc'=>'Learning essential daily duas, morning/evening adhkar, and Sunnah supplications by heart.','icon'=>'M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18'],
                ['num'=>'06','title'=>'Islamic Character','desc'=>'Building manners, ethics, and noble character (Akhlaq) through stories, role models, and practice.','icon'=>'M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z'],
                ['num'=>'07','title'=>'Parent Reports','desc'=>'Regular progress reports and parent-teacher consultations to keep families engaged in their child\'s journey.','icon'=>'M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z'],
                ['num'=>'08','title'=>'Certificates &amp; Awards','desc'=>'Recognition certificates, badges, and awards to celebrate every milestone and motivate continued growth.','icon'=>'M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z'],
            ];
            @endphp

            @foreach($programs as $prog)
            <div class="program-card">
                <div class="prog-number">{{ $prog['num'] }}</div>
                <div class="prog-icon">
                    <svg width="26" height="26" fill="none" stroke="#3f9087" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $prog['icon'] }}"/>
                    </svg>
                </div>
                <h3>{!! $prog['title'] !!}</h3>
                <p>{{ $prog['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ── FOUNDERS ── --}}
<section class="section" id="founders">
    <div class="section-inner">
        <div class="section-header center">
            <div class="section-tag gold-tag">
                <svg width="12" height="12" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
                Our Founders
            </div>
            <h2 class="section-title">The Hearts Behind<br><span class="accent">Nabaath</span></h2>
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
                    <p>We started Nabaath because we believed every child, regardless of their background, deserves to experience the beauty of the Quran and the warmth of Islamic knowledge.</p>
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

{{-- ── CTA BANNER ── --}}
<section class="cta-section" id="contact">
    <h2>Ready to Begin Your Child's<br>Islamic Learning Journey?</h2>
    <p>Join hundreds of families who trust Nabaath Learning Point to guide their children in faith and knowledge.</p>
    <div class="cta-btns">
        <a href="{{ route('get-started') }}" class="btn-primary">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/>
            </svg>
            Apply Now
        </a>
        <a href="#nabaath" class="btn-outline">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/>
            </svg>
            Explore Programs
        </a>
    </div>
</section>

{{-- ── FOOTER ── --}}
<footer class="footer" id="footer">
    <div class="footer-inner">
        <div class="footer-top">
            <div class="footer-brand">
                <div style="display:flex;align-items:center;gap:10px;margin-bottom:12px;">
                    <div style="width:36px;height:36px;border-radius:10px;background:var(--brand);display:flex;align-items:center;justify-content:center;">
                        <svg width="18" height="18" fill="none" stroke="#fff" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0118 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                        </svg>
                    </div>
                    <strong>Nabaath Learning Point</strong>
                </div>
                <p>An Islamic-based learning institution for kids, nurturing young minds with Quran, Arabic, and Islamic studies in a loving and structured environment.</p>
            </div>

            <div class="footer-col">
                <h4>Quick Links</h4>
                <a href="#nabaath">What is Nabaath</a>
                <a href="#classes">Our Classes</a>
                <a href="#about">About Us</a>
                <a href="#programs">Programs</a>
                <a href="#founders">Founders</a>
            </div>

            <div class="footer-col">
                <h4>Programs</h4>
                <a href="#programs">Quran Recitation</a>
                <a href="#programs">Hifz ul Quran</a>
                <a href="#programs">Arabic Language</a>
                <a href="#programs">Islamic Studies</a>
                <a href="#programs">Duas &amp; Adhkar</a>
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

<script>
    // Navbar scroll effect
    window.addEventListener('scroll', () => {
        document.getElementById('navbar').classList.toggle('scrolled', window.scrollY > 20);
    });

    // Mobile menu toggle
    let menuOpen = false;
    function toggleMenu() {
        menuOpen = !menuOpen;
        const links = document.querySelector('.nav-links');
        const cta   = document.querySelector('.nav-cta');
        if (menuOpen) {
            // Simple inline menu for mobile
            if (!document.getElementById('mobile-menu')) {
                const menu = document.createElement('div');
                menu.id = 'mobile-menu';
                menu.style.cssText = `
                    position:fixed;top:72px;left:0;right:0;
                    background:#fff;padding:20px 24px;
                    border-bottom:1px solid rgba(63,144,135,0.15);
                    box-shadow:0 8px 24px rgba(63,144,135,0.12);
                    z-index:999;display:flex;flex-direction:column;gap:4px;
                `;
                ['About Us:#about','Our Classes:#classes','Programs:#programs','Founders:#founders','Contact:#contact'].forEach(item => {
                    const [label, href] = item.split(':');
                    const a = document.createElement('a');
                    a.href = href; a.textContent = label;
                    a.style.cssText = 'padding:12px 0;font-size:15px;font-weight:500;color:#1a2e2c;text-decoration:none;border-bottom:1px solid #f0faf9;';
                    a.onclick = () => { document.getElementById('mobile-menu').remove(); menuOpen = false; };
                    menu.appendChild(a);
                });
                const btn = document.createElement('a');
                btn.href='#contact'; btn.textContent='Get Started';
                btn.style.cssText='margin-top:12px;text-align:center;background:#3f9087;color:#fff;padding:12px;border-radius:50px;font-weight:600;font-size:14px;text-decoration:none;';
                btn.onclick = () => { document.getElementById('mobile-menu').remove(); menuOpen = false; };
                menu.appendChild(btn);
                document.body.appendChild(menu);
            }
        } else {
            const m = document.getElementById('mobile-menu');
            if (m) m.remove();
        }
    }

    // Smooth scroll for anchors
    document.querySelectorAll('a[href^="#"]').forEach(a => {
        a.addEventListener('click', e => {
            const target = document.querySelector(a.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // Scroll reveal animation
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.program-card, .class-card, .founder-card, .what-pill, .about-value').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(24px)';
        el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        observer.observe(el);
    });
</script>

</body>
</html>
