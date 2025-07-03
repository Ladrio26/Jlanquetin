<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Réservation en ligne - Écrivain public à Dijon : prenez rendez-vous pour vos démarches administratives, déclaration d'impôts, création d'entreprises.">
    <meta name="keywords" content="réservation, rendez-vous, écrivain public, Dijon, déclaration impôts, création entreprise">
    <meta name="author" content="Jolan LANQUETIN">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://jlanquetin.goodloss.fr/reservation">
    <meta property="og:title" content="Réservation - Jolan LANQUETIN Écrivain Public à Dijon">
    <meta property="og:description" content="Prenez rendez-vous en ligne pour vos démarches administratives.">
    <meta property="og:image" content="https://jlanquetin.goodloss.fr/images/pcJolan.png">

    <title>Réservation - Jolan LANQUETIN Écrivain Public à Dijon | Prise de Rendez-vous</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="canonical" href="https://jlanquetin.goodloss.fr/reservation">
</head>

<body class="bg-gray-900 text-gray-100 font-sans">

<!-- Inclusion du Header -->
<?php include('header.php'); ?>

<!-- Section principale - Réservation -->
<section id="content" class="container mx-auto py-16 px-6 md:px-12">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold text-white mb-4">Prenez Rendez-vous</h1>
            <p class="text-xl text-gray-300">Réservez votre créneau pour un accompagnement personnalisé</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Formulaire de réservation -->
            <div class="bg-gray-800 rounded-lg p-8">
                <h2 class="text-2xl font-semibold text-blue-500 mb-6">Formulaire de réservation</h2>
                
                <form action="process_reservation.php" method="post" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="firstname" class="block text-sm text-gray-200 mb-2">Prénom *</label>
                            <input type="text" id="firstname" name="firstname" required 
                                   class="w-full p-3 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:border-blue-500">
                        </div>
                        <div>
                            <label for="lastname" class="block text-sm text-gray-200 mb-2">Nom *</label>
                            <input type="text" id="lastname" name="lastname" required 
                                   class="w-full p-3 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:border-blue-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="email" class="block text-sm text-gray-200 mb-2">Email *</label>
                            <input type="email" id="email" name="email" required 
                                   class="w-full p-3 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:border-blue-500">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm text-gray-200 mb-2">Téléphone *</label>
                            <input type="tel" id="phone" name="phone" required 
                                   class="w-full p-3 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:border-blue-500">
                        </div>
                    </div>

                    <div>
                        <label for="service" class="block text-sm text-gray-200 mb-2">Service demandé *</label>
                        <select id="service" name="service" required 
                                class="w-full p-3 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:border-blue-500">
                            <option value="">Sélectionnez un service</option>
                            <optgroup label="Services Administratifs">
                                <option value="declaration_impots">Déclaration d'impôts</option>
                                <option value="creation_entreprise">Création d'entreprise</option>
                                <option value="administratif_general">Administratif général</option>
                            </optgroup>
                            <optgroup label="Services Internet & Web">
                                <option value="aide_internet">Aide Internet générale</option>
                                <option value="creation_site">Création de site web</option>
                                <option value="genealogie">Généalogie</option>
                            </optgroup>
                            <optgroup label="Services de Rédaction">
                                <option value="cv_lettre">CV & Lettre de motivation</option>
                                <option value="correction_textes">Correction de textes</option>
                                <option value="soutien_scolaire">Soutien scolaire</option>
                            </optgroup>
                        </select>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="date" class="block text-sm text-gray-200 mb-2">Date souhaitée *</label>
                            <input type="date" id="date" name="date" required 
                                   class="w-full p-3 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:border-blue-500">
                        </div>
                        <div>
                            <label for="time" class="block text-sm text-gray-200 mb-2">Horaire préféré *</label>
                            <select id="time" name="time" required 
                                    class="w-full p-3 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:border-blue-500">
                                <option value="">Sélectionnez un horaire</option>
                                <option value="09:00">09:00</option>
                                <option value="10:00">10:00</option>
                                <option value="11:00">11:00</option>
                                <option value="14:00">14:00</option>
                                <option value="15:00">15:00</option>
                                <option value="16:00">16:00</option>
                                <option value="17:00">17:00</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="mode" class="block text-sm text-gray-200 mb-2">Mode de consultation *</label>
                        <select id="mode" name="mode" required 
                                class="w-full p-3 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:border-blue-500">
                            <option value="">Sélectionnez un mode</option>
                            <option value="domicile">À domicile</option>
                            <option value="distanciel">En distanciel (visioconférence)</option>
                            <option value="bureau">À mon bureau</option>
                        </select>
                    </div>

                    <div>
                        <label for="message" class="block text-sm text-gray-200 mb-2">Détails de votre demande</label>
                        <textarea id="message" name="message" rows="4" 
                                  class="w-full p-3 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:border-blue-500"
                                  placeholder="Décrivez brièvement votre projet ou vos besoins..."></textarea>
                    </div>

                    <div class="flex items-start space-x-3">
                        <input type="checkbox" id="consent" name="consent" required 
                               class="mt-1 w-4 h-4 text-blue-600 bg-gray-700 border-gray-600 rounded focus:ring-blue-500">
                        <label for="consent" class="text-sm text-gray-300">
                            J'accepte que mes données soient traitées pour la prise de rendez-vous et je confirme avoir lu la 
                            <a href="Mentions-Legales" class="text-blue-400 hover:text-blue-300">politique de confidentialité</a> *
                        </label>
                    </div>

                    <button type="submit" 
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-lg font-semibold transition-colors duration-300">
                        Confirmer ma réservation
                    </button>
                </form>
            </div>

            <!-- Informations pratiques -->
            <div class="space-y-8">
                <div class="bg-gray-800 rounded-lg p-8">
                    <h3 class="text-2xl font-semibold text-blue-500 mb-6">Informations pratiques</h3>
                    
                    <div class="space-y-6">
                        <div>
                            <h4 class="text-lg font-semibold text-white mb-3">📅 Horaires de disponibilité</h4>
                            <ul class="text-gray-300 space-y-2">
                                <li>• Lundi - Vendredi : 9h00 - 18h00</li>
                                <li>• Samedi : 9h00 - 12h00</li>
                                <li>• Dimanche : Sur demande</li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="text-lg font-semibold text-white mb-3">⏱️ Durée des consultations</h4>
                            <ul class="text-gray-300 space-y-2">
                                <li>• Déclaration d'impôts : 1-2 heures</li>
                                <li>• Création d'entreprise : 2-3 heures</li>
                                <li>• CV & Lettre de motivation : 1 heure</li>
                                <li>• Soutien scolaire : 1 heure</li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="text-lg font-semibold text-white mb-3">📍 Zones d'intervention</h4>
                            <p class="text-gray-300">Dijon et sa périphérie (rayon de 20km). Services en distanciel disponibles pour toute la France.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-blue-900 rounded-lg p-8">
                    <h3 class="text-2xl font-semibold text-white mb-4">💡 Conseils pour votre rendez-vous</h3>
                    <ul class="text-gray-200 space-y-3">
                        <li>• Préparez vos documents à l'avance</li>
                        <li>• Notez vos questions spécifiques</li>
                        <li>• Pour les consultations à domicile, prévoyez un espace calme</li>
                        <li>• Pour les consultations en distanciel, testez votre connexion</li>
                    </ul>
                </div>

                <div class="bg-gray-800 rounded-lg p-8">
                    <h3 class="text-2xl font-semibold text-blue-500 mb-4">📞 Contact rapide</h3>
                    <div class="space-y-4">
                        <p class="text-gray-300">
                            <strong>Email :</strong> 
                            <a href="mailto:lanquetin.jolan@gmail.com" class="text-blue-400 hover:text-blue-300">lanquetin.jolan@gmail.com</a>
                        </p>
                        <p class="text-gray-300">
                            <strong>Réponse garantie sous 24h</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Inclusion du Footer -->
<?php include('footer.php'); ?>

<script src="js/scripts.js"></script>

<script>
// Script pour limiter les dates à l'avenir
document.addEventListener('DOMContentLoaded', function() {
    const dateInput = document.getElementById('date');
    const today = new Date().toISOString().split('T')[0];
    dateInput.min = today;
    
    // Désactiver les weekends (optionnel)
    dateInput.addEventListener('change', function() {
        const selectedDate = new Date(this.value);
        const dayOfWeek = selectedDate.getDay();
        
        if (dayOfWeek === 0) { // Dimanche
            alert('Les rendez-vous ne sont pas disponibles le dimanche. Veuillez choisir une autre date.');
            this.value = '';
        }
    });
});
</script>

</body>

</html> 