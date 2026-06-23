// Navbar scroll effect
window.addEventListener('scroll', () => {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

// Fallback for scroll-driven animations if not supported by browser
if (!CSS.supports('(animation-timeline: view()) and (animation-range: entry)')) {
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.15
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
                entry.target.style.opacity = 1;
                entry.target.style.transform = 'translateY(0) scale(1)';
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Apply to elements that would normally use CSS scroll timelines
    const elementsToAnimate = document.querySelectorAll('.scroll-animated-list > *, .scroll-fade-in');
    
    elementsToAnimate.forEach(el => {
        // Initial state
        el.style.opacity = 0;
        el.style.transform = 'translateY(40px) scale(0.95)';
        observer.observe(el);
    });
}
