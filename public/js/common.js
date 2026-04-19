// Smooth scroll for in-page anchor links
document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
        const target = document.querySelector(a.getAttribute('href'));
        if (target) {
            e.preventDefault();
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
});

// Scroll reveal — covers cards/elements across all pages
const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, { threshold: 0.1 });

document.querySelectorAll(
    '.program-card, .class-card, .founder-card, .what-pill, .about-value, ' +
    '.mv-card, .tl-card, .hl-card, .achieve-card, ' +
    '.info-card, .faq-item, .side-card, .contact-form-wrap, ' +
    '.step, .career-card, .printable-card, .gallery-item, .course-card'
).forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(24px)';
    el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
    revealObserver.observe(el);
});
