// Script pour rendre les encarts déroulants
$(document).ready(function() {
    var accordions = $(".accordion");

    accordions.on("click", function() {
        // Fermer tous les autres panels et enlever la classe "open" des autres flèches
        $(".panel").not($(this).next()).slideUp(); // Ferme les autres panels
        $(".accordion").not(this).removeClass("open"); // Retire la classe "open" des autres flèches

        // Si le panel cliqué est déjà ouvert, le fermer
        $(this).next().slideToggle();

        // Ajouter une classe pour la flèche
        $(this).toggleClass("open");
    });
});