<footer class="footer" id="footer">
    <div class="footer-inner">
        <div class="footer-top">
            <div class="footer-brand">
                <div style="display:flex;align-items:center;gap:10px;margin-bottom:12px;">
                    <img src="{{ asset('images/logo-white.png') }}" alt="Nabaath Learning Point" style="height:36px;width:auto;object-fit:contain;">
                </div>
                <p>An Islamic-based learning institution for kids, nurturing young minds with Quran, Arabic, and Islamic studies in a loving and structured environment.</p>
            </div>

            <div class="footer-col">
                <h4>Quick Links</h4>
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('about') }}">About Us</a>
                <a href="{{ route('contact') }}">Contact Us</a>
                <a href="{{ route('home') }}#classes">Our Classes</a>
                <a href="{{ route('home') }}#programs">Programs</a>
            </div>

            <div class="footer-col">
                <h4>Programs</h4>
                <a href="{{ route('home') }}#programs">Quran Recitation</a>
                <a href="{{ route('home') }}#programs">Hifz ul Quran</a>
                <a href="{{ route('home') }}#programs">Arabic Language</a>
                <a href="{{ route('home') }}#programs">Islamic Studies</a>
                <a href="{{ route('home') }}#programs">Duas &amp; Adhkar</a>
            </div>

            <div class="footer-col">
                <h4>Contact</h4>
                <a href="tel:+1234567890">+1 234 567 890</a>
                <a href="mailto:info@nabaath.com">info@nabaath.com</a>
                <a href="https://wa.me/1234567890" target="_blank" rel="noopener">WhatsApp Us</a>
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
