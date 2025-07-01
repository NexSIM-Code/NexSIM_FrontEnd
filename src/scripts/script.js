document.addEventListener('DOMContentLoaded', function () {
    // Menu hamburger responsive
    const navLinks = document.querySelector('.nav-links');
    const contactBtn = document.querySelector('.contact-btn');
    const logoContainer = document.querySelector('.logo-container');

    // Créer le bouton hamburger
    const hamburger = document.createElement('div');
    hamburger.classList.add('hamburger');
    hamburger.innerHTML = '<span></span><span></span><span></span>';
    document.querySelector('nav').appendChild(hamburger);

    // Gérer le clic sur le menu hamburger
    hamburger.addEventListener('click', function () {
        navLinks.classList.toggle('active');
        hamburger.classList.toggle('active');
    });

    // Handle all contact buttons on the page
    document.querySelectorAll('.contact-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            window.location.href = "mailto:contact@lusim.fr?subject=Demande de renseignements Nexsim";
        });
    });

    // Animation au défilement
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
            }
        });
    }, {threshold: 0.2});

    // Observer toutes les sections de contenu
    document.querySelectorAll('.content-section, .product-card').forEach(section => {
        section.classList.add('fade-in');
        observer.observe(section);
    });

    // Animation des boutons d'appel à l'action
    document.querySelectorAll('.cta-button').forEach(button => {
        button.addEventListener('mouseover', function () {
            this.classList.add('pulse');
        });
        button.addEventListener('animationend', function () {
            this.classList.remove('pulse');
        });
    });
    // Ajout de l'initialisation du switch de thème
    setupThemeToggle();
});

// Theme switcher
function setupThemeToggle() {
    const toggleSwitch = document.querySelector('#checkbox');
    const currentTheme = localStorage.getItem('theme') ||
        (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');

    // Fonction pour appliquer le thème
    function setTheme(theme) {
        if (theme === 'dark') {
            document.body.classList.add('dark-mode');
            toggleSwitch.checked = true;

            // Changer les images pour les versions dark
            document.querySelectorAll('img[data-dark-src]').forEach(img => {
                img.setAttribute('data-light-src', img.src); // Sauvegarder la source originale
                img.src = img.getAttribute('data-dark-src');
            });
        } else {
            document.body.classList.remove('dark-mode');
            toggleSwitch.checked = false;

            // Restaurer les images originales
            document.querySelectorAll('img[data-dark-src]').forEach(img => {
                if (img.hasAttribute('data-light-src')) {
                    img.src = img.getAttribute('data-light-src');
                }
            });
        }
        localStorage.setItem('theme', theme);
    }

    // Appliquer le thème actuel
    setTheme(currentTheme);

    // Écouteur d'événement pour le changement de thème
    toggleSwitch.addEventListener('change', function () {
        setTheme(this.checked ? 'dark' : 'light');
    });
}
