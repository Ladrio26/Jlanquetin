<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Page non trouvée - Écrivain public à Dijon">
    <title>Page non trouvée - Jolan LANQUETIN Écrivain Public</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-gray-100 font-sans">

<!-- Inclusion du Header -->
<?php include('header.php'); ?>

<!-- Section 404 -->
<section class="container mx-auto py-20 px-6 md:px-12">
    <div class="max-w-2xl mx-auto text-center">
        <div class="mb-12">
            <div class="text-8xl font-bold text-blue-500 mb-4">404</div>
            <h1 class="text-4xl font-bold text-white mb-4">Page non trouvée</h1>
            <p class="text-xl text-gray-300">
                La page que vous recherchez n'existe pas ou a été déplacée.
            </p>
        </div>

        <div class="bg-gray-800 rounded-lg p-8 mb-8">
            <h2 class="text-2xl font-semibold text-blue-500 mb-6">Que pouvez-vous faire ?</h2>
            <div class="space-y-4 text-left">
                <div class="flex items-start space-x-3">
                    <div class="text-blue-400 text-xl">🔍</div>
                    <div>
                        <h3 class="text-white font-semibold">Vérifiez l'URL</h3>
                        <p class="text-gray-300">Assurez-vous que l'adresse est correctement tapée.</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <div class="text-blue-400 text-xl">🏠</div>
                    <div>
                        <h3 class="text-white font-semibold">Retournez à l'accueil</h3>
                        <p class="text-gray-300">Naviguez depuis la page d'accueil pour trouver ce que vous cherchez.</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <div class="text-blue-400 text-xl">📞</div>
                    <div>
                        <h3 class="text-white font-semibold">Contactez-moi</h3>
                        <p class="text-gray-300">Si vous pensez qu'il s'agit d'une erreur, n'hésitez pas à me contacter.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-blue-900 rounded-lg p-8 mb-8">
            <h2 class="text-2xl font-semibold text-white mb-6">Pages populaires</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <a href="/" class="block p-4 bg-gray-700 rounded-lg hover:bg-gray-600 transition-colors">
                    <h3 class="text-white font-semibold">🏠 Accueil</h3>
                    <p class="text-gray-300 text-sm">Découvrez mes services</p>
                </a>
                <a href="Services" class="block p-4 bg-gray-700 rounded-lg hover:bg-gray-600 transition-colors">
                    <h3 class="text-white font-semibold">📋 Mes Services</h3>
                    <p class="text-gray-300 text-sm">Administratif, web, rédaction</p>
                </a>
                <a href="Tarifs" class="block p-4 bg-gray-700 rounded-lg hover:bg-gray-600 transition-colors">
                    <h3 class="text-white font-semibold">💰 Tarifs</h3>
                    <p class="text-gray-300 text-sm">Grille tarifaire complète</p>
                </a>
                <a href="Contact" class="block p-4 bg-gray-700 rounded-lg hover:bg-gray-600 transition-colors">
                    <h3 class="text-white font-semibold">📞 Contact</h3>
                    <p class="text-gray-300 text-sm">Prenez rendez-vous</p>
                </a>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-lg font-semibold transition-colors duration-300">
                Retour à l'accueil
            </a>
            <a href="Contact" class="border-2 border-blue-400 text-blue-400 hover:bg-blue-400 hover:text-white px-8 py-4 rounded-lg font-semibold transition-colors duration-300">
                Me contacter
            </a>
        </div>
    </div>
</section>

<!-- Inclusion du Footer -->
<?php include('footer.php'); ?>

<script src="js/scripts.js"></script>

</body>

</html> 