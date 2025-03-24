document.addEventListener('DOMContentLoaded', function () {
    const hamburger = document.querySelector('.hamburger');
    const navList = document.querySelector('.nav-list');
    const overlay = document.querySelector('.menu-overlay');
    const navLinks = document.querySelectorAll('.nav-list a');

    // Fonction de fermeture du menu
    function closeMenu() {
        navList.classList.remove('active');
        overlay.classList.remove('active');
        if (window.innerWidth <= 768) {
            hamburger.style.display = 'flex';
        }
    }

    // Ouvrir le menu
    hamburger.addEventListener('click', function () {
        navList.classList.add('active');
        overlay.classList.add('active');
        hamburger.style.display = 'none';
    });

    // Fermer le menu si on clique sur un lien
    navLinks.forEach(link => {
        link.addEventListener('click', closeMenu);
    });

    // Fermer le menu si on clique sur l’overlay
    overlay.addEventListener('click', closeMenu);

    // Sécurité : fermer le menu si on clique n'importe où en dehors
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeMenu();
        }
    });
});
