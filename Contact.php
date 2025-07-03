<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contactez Jolan Lanquetin, écrivain public à Dijon, pour toute demande d'information, devis ou rendez-vous.">
    <title>Contact - Jolan LANQUETIN</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-gray-100 font-sans">

<!-- Inclusion du Header -->
<?php include('header.php'); ?>

<!-- Section Hero -->
<section class="bg-gradient-to-br from-blue-900 via-gray-900 to-blue-800 py-12 sm:py-16 lg:py-20">
    <div class="container mx-auto px-4 sm:px-6 lg:px-12">
        <div class="text-center mb-10 lg:mb-16">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-4">Contact</h1>
            <p class="text-lg sm:text-xl text-gray-300">Une question, un devis, un rendez-vous&nbsp;? Je vous réponds rapidement&nbsp;!</p>
        </div>
    </div>
</section>

<!-- Formulaire de contact et infos -->
<section class="py-12 sm:py-16 lg:py-20 bg-gray-800">
    <div class="container mx-auto px-4 sm:px-6 lg:px-12 grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
        <!-- Formulaire -->
        <div class="bg-gray-900 rounded-lg p-8 shadow-lg">
            <h2 class="text-2xl sm:text-3xl font-semibold text-blue-400 mb-6">Envoyez-moi un message</h2>
            <form action="send_mail.php" method="POST" class="space-y-6">
                <div>
                    <label for="nom" class="block text-gray-300 mb-2">Nom</label>
                    <input type="text" id="nom" name="nom" required class="w-full px-4 py-2 rounded bg-gray-800 text-gray-100 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div>
                    <label for="email" class="block text-gray-300 mb-2">Email</label>
                    <input type="email" id="email" name="email" required class="w-full px-4 py-2 rounded bg-gray-800 text-gray-100 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div>
                    <label for="message" class="block text-gray-300 mb-2">Message</label>
                    <textarea id="message" name="message" rows="5" required class="w-full px-4 py-2 rounded bg-gray-800 text-gray-100 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
                </div>
                <button type="submit" class="w-full py-3 px-6 rounded bg-blue-600 hover:bg-blue-700 text-white font-semibold text-lg transition-all duration-200 shadow-md">Envoyer</button>
            </form>
        </div>
        <!-- Infos de contact -->
        <div class="space-y-8">
            <div class="bg-gray-900 rounded-lg p-8 shadow-lg">
                <h2 class="text-2xl sm:text-3xl font-semibold text-blue-400 mb-4">Coordonnées</h2>
                <ul class="text-gray-300 text-base sm:text-lg space-y-2">
                    <li><span class="font-semibold text-blue-400">📍 Adresse :</span> 34 Boulevard de la Marne, 21000 Dijon</li>
                    <li><span class="font-semibold text-blue-400">📧 Email :</span> <a href="mailto:lanquetin.jolan@gmail.com" class="underline hover:text-blue-300">lanquetin.jolan@gmail.com</a></li>
                
            </div>
            <div class="bg-gray-900 rounded-lg p-8 shadow-lg">
                <h2 class="text-2xl sm:text-3xl font-semibold text-blue-400 mb-4">Horaires</h2>
                <ul class="text-gray-300 text-base sm:text-lg space-y-2">
                    <li>Lundi - Vendredi : 9h - 19h</li>
                    <li>Samedi : 9h - 12h</li>
                    <li>Dimanche : fermé</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Inclusion du Footer -->
<?php include('footer.php'); ?>

<script src="js/scripts.js"></script>

</body>

</html>
