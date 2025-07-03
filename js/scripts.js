// JavaScript pour le menu de navigation moderne
const mobileMenuBtn = document.getElementById('mobile-menu-btn');
const mobileMenu = document.getElementById('mobile-menu');
const closeMobileMenu = document.getElementById('close-mobile-menu');
const mobileMenuOverlay = document.getElementById('mobile-menu');
const servicesMobileBtn = document.getElementById('services-mobile-btn');
const servicesMobileSubmenu = document.getElementById('services-mobile-submenu');

// Ouvrir le menu mobile
if (mobileMenuBtn) {
    mobileMenuBtn.addEventListener('click', () => {
        mobileMenu.classList.remove('opacity-0', 'invisible');
        mobileMenu.querySelector('.absolute').classList.remove('translate-x-full');
        document.body.style.overflow = 'hidden';
    });
}

// Fermer le menu mobile
function closeMobileMenuFunc() {
    mobileMenu.classList.add('opacity-0', 'invisible');
    mobileMenu.querySelector('.absolute').classList.add('translate-x-full');
    document.body.style.overflow = 'auto';
}

if (closeMobileMenu) {
    closeMobileMenu.addEventListener('click', closeMobileMenuFunc);
}

// Fermer le menu en cliquant sur l'overlay
if (mobileMenuOverlay) {
    mobileMenuOverlay.addEventListener('click', (e) => {
        if (e.target === mobileMenuOverlay) {
            closeMobileMenuFunc();
        }
    });
}

// Gestion du sous-menu Services sur mobile
if (servicesMobileBtn && servicesMobileSubmenu) {
    servicesMobileBtn.addEventListener('click', () => {
        const isOpen = !servicesMobileSubmenu.classList.contains('hidden');
        
        if (isOpen) {
            servicesMobileSubmenu.classList.add('hidden');
            servicesMobileBtn.querySelector('svg').classList.remove('rotate-180');
        } else {
            servicesMobileSubmenu.classList.remove('hidden');
            servicesMobileBtn.querySelector('svg').classList.add('rotate-180');
        }
    });
}

// Fermer le menu en cliquant sur un lien
const mobileLinks = document.querySelectorAll('#mobile-menu a');
mobileLinks.forEach(link => {
    link.addEventListener('click', () => {
        closeMobileMenuFunc();
    });
});

// JavaScript pour le fonctionnement des accordéons
const accordions = document.querySelectorAll('.accordion');
accordions.forEach((accordion) => {
    accordion.addEventListener('click', function () {
        const panel = this.nextElementSibling;
        // Afficher ou masquer le panneau
        panel.classList.toggle('hidden');
        
        // Ajouter une classe pour l'animation
        if (panel.classList.contains('hidden')) {
            panel.style.maxHeight = '0px';
        } else {
            panel.style.maxHeight = panel.scrollHeight + 'px';
        }
    });
});

// Smooth scroll pour les ancres
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Animation au scroll
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate-fade-in');
        }
    });
}, observerOptions);

// Observer les éléments à animer
document.querySelectorAll('.service, .bg-gray-800, .bg-blue-900').forEach(el => {
    observer.observe(el);
});

// Validation du formulaire de réservation
const reservationForm = document.querySelector('form[action="process_reservation.php"]');
if (reservationForm) {
    reservationForm.addEventListener('submit', function(e) {
        const requiredFields = this.querySelectorAll('[required]');
        let isValid = true;
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                field.classList.add('border-red-500');
                isValid = false;
            } else {
                field.classList.remove('border-red-500');
            }
        });
        
        if (!isValid) {
            e.preventDefault();
            alert('Veuillez remplir tous les champs obligatoires.');
        }
    });
}

// Amélioration de l'accessibilité
document.addEventListener('keydown', function(e) {
    // Fermer le menu mobile avec la touche Escape
    if (e.key === 'Escape' && mobileMenu && !mobileMenu.classList.contains('hidden')) {
        mobileMenu.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
});

// Lazy loading des images
if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove('lazy');
                imageObserver.unobserve(img);
            }
        });
    });

    document.querySelectorAll('img[data-src]').forEach(img => {
        imageObserver.observe(img);
    });
}
