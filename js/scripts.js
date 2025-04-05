// JavaScript pour afficher/masquer le menu hamburger
const hamburgerMenu = document.getElementById('hamburger-menu');
const mobileMenu = document.getElementById('mobile-menu');
const closeMenu = document.getElementById('close-menu');

// Afficher/masquer le menu mobile
hamburgerMenu.addEventListener('click', () => {
    mobileMenu.classList.remove('hidden');
});

// Fermer le menu mobile
closeMenu.addEventListener('click', () => {
    mobileMenu.classList.add('hidden');
});

// JavaScript pour le fonctionnement des accordéons
const accordions = document.querySelectorAll('.accordion');
accordions.forEach((accordion) => {
    accordion.addEventListener('click', function () {
        const panel = this.nextElementSibling;
        // Afficher ou masquer le panneau
        panel.classList.toggle('hidden');
    });
});
