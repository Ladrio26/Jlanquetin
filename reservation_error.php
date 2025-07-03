<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Erreur de réservation - Écrivain public à Dijon">
    <title>Erreur de réservation - Jolan LANQUETIN Écrivain Public</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-gray-100 font-sans">

<!-- Inclusion du Header -->
<?php include('header.php'); ?>

<!-- Section d'erreur -->
<section class="container mx-auto py-20 px-6 md:px-12">
    <div class="max-w-2xl mx-auto text-center">
        <div class="bg-red-900 border border-red-500 rounded-lg p-12 mb-8">
            <div class="text-6xl mb-6">❌</div>
            <h1 class="text-4xl font-bold text-white mb-4">Erreur de réservation</h1>
            <p class="text-xl text-gray-200 mb-6">
                Une erreur s'est produite lors de l'envoi de votre réservation.
            </p>
            <p class="text-lg text-gray-300">
                Ne vous inquiétez pas, vous pouvez me contacter directement.
            </p>
        </div>

        <div class="bg-gray-800 rounded-lg p-8 mb-8">
            <h2 class="text-2xl font-semibold text-blue-500 mb-6">Solutions alternatives</h2>
            <div class="space-y-6 text-left">
                <div class="flex items-start space-x-3">
                    <div class="text-blue-400 text-xl">📞</div>
                    <div>
                        <h3 class="text-white font-semibold">Appelez-moi directement</h3>
                        <p class="text-gray-300">lanquetin.jolan@gmail.com - Je réponds rapidement à vos emails.</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <div class="text-blue-400 text-xl">📧</div>
                    <div>
                        <h3 class="text-white font-semibold">Envoyez-moi un email</h3>
                        <p class="text-gray-300">lanquetin.jolan@gmail.com - Réponse garantie sous 24h.</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <div class="text-blue-400 text-xl">🔄</div>
                    <div>
                        <h3 class="text-white font-semibold">Réessayez plus tard</h3>
                        <p class="text-gray-300">Le problème peut être temporaire, réessayez dans quelques minutes.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-blue-900 rounded-lg p-8 mb-8">
            <h2 class="text-2xl font-semibold text-white mb-6">Informations de contact</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-left">
                <div>
                    <h3 class="text-blue-400 font-semibold mb-2">📞 Téléphone</h3>
                    <p class="text-gray-200">lanquetin.jolan@gmail.com</p>
                    <p class="text-gray-300 text-sm">Lun-Ven : 9h-18h</p>
                    <p class="text-gray-300 text-sm">Sam : 9h-12h</p>
                </div>
                <div>
                    <h3 class="text-blue-400 font-semibold mb-2">📧 Email</h3>
                    <p class="text-gray-200">lanquetin.jolan@gmail.com</p>
                    <p class="text-gray-300 text-sm">Réponse sous 24h</p>
                </div>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="reservation" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-lg font-semibold transition-colors duration-300">
                Réessayer la réservation
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