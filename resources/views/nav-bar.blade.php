<nav class="navbar" id="navbar">
    <div class="nav-inner">
        <a href="{{ route('home') }}" class="nav-logo">
            <div class="nav-logo-container">
                <img src="{{ asset('images/logo-no-bg.png') }}" alt="Nabaath Learning Point">
            </div>
        </a>

        <div class="nav-links">
            <a href="{{ route('home') }} @class(['active' => request()->routeIs('home')])">Home</a>
            <a href="{{ route('about') }}" @class(['active' => request()->routeIs('about')])>About Us</a>
            <a href="{{ route('courses.index') }}" @class(['active' => request()->routeIs('courses.*')])>Courses</a>
            <a href="{{ route('gallery.index') }}" @class(['active' => request()->routeIs('gallery.*')])>Gallery</a>
            <a href="{{ route('posts.index') }}" @class(['active' => request()->routeIs('posts.*')])>Posts</a>
            <a href="{{ route('printables.index') }}" @class(['active' => request()->routeIs('printables.*')])>Printables</a>
            <a href="{{ route('careers.index') }}" @class(['active' => request()->routeIs('careers.*')])>Careers</a>
            <a href="{{ route('contact') }}" @class(['active' => request()->routeIs('contact')])>Contact</a>
        </div>

        <a href="{{ route('get-started') }}" class="nav-cta">Get Started</a>

        <div class="hamburger" onclick="toggleMenu()">
            <span></span><span></span><span></span>
        </div>
    </div>
</nav>

<script>
    window.addEventListener('scroll', () => {
        document.getElementById('navbar').classList.toggle('scrolled', window.scrollY > 20);
    });

    let menuOpen = false;
    function toggleMenu() {
        menuOpen = !menuOpen;
        if (menuOpen) {
            if (!document.getElementById('mobile-menu')) {
                const menu = document.createElement('div');
                menu.id = 'mobile-menu';
                menu.style.cssText = 'position:fixed;top:72px;left:0;right:0;background:#fff;padding:20px 24px;border-bottom:1px solid rgba(63,144,135,0.15);box-shadow:0 8px 24px rgba(63,144,135,0.12);z-index:999;display:flex;flex-direction:column;gap:4px;';
                [
                    ['About Us',    '{{ route("about") }}'],
                    ['Courses',     '{{ route("courses.index") }}'],
                    ['Gallery',     '{{ route("gallery.index") }}'],
                    ['Posts',       '{{ route("posts.index") }}'],
                    ['Printables',  '{{ route("printables.index") }}'],
                    ['Careers',     '{{ route("careers.index") }}'],
                    ['Programs',    '{{ route("home") }}#programs'],
                    ['Contact',     '{{ route("contact") }}'],
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
                btn.onclick = () => { document.getElementById('mobile-menu').remove(); menuOpen = false; };
                menu.appendChild(btn);
                document.body.appendChild(menu);
            }
        } else {
            const m = document.getElementById('mobile-menu');
            if (m) m.remove();
        }
    }
</script>
