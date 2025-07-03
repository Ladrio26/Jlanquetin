<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Confirmation de réservation - Écrivain public à Dijon">
    <title>Réservation confirmée - Jolan LANQUETIN Écrivain Public</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-gray-100 font-sans">

<!-- Inclusion du Header -->
<?php include('header.php'); ?>

<!-- Section de confirmation -->
<section class="container mx-auto py-20 px-6 md:px-12">
    <div class="max-w-2xl mx-auto text-center">
        <div class="bg-green-900 border border-green-500 rounded-lg p-12 mb-8">
            <div class="text-6xl mb-6">✅</div>
            <h1 class="text-4xl font-bold text-white mb-4">Réservation confirmée !</h1>
            <p class="text-xl text-gray-200 mb-6">
                Votre demande de réservation a été envoyée avec succès.
            </p>
            <p class="text-lg text-gray-300">
                Vous recevrez une confirmation par email dans les plus brefs délais.
            </p>
        </div>

        <div class="bg-gray-800 rounded-lg p-8 mb-8">
            <h2 class="text-2xl font-semibold text-blue-500 mb-6">Prochaines étapes</h2>
            <div class="space-y-4 text-left">
                <div class="flex items-start space-x-3">
                    <div class="text-blue-400 text-xl">1.</div>
                    <div>
                        <h3 class="text-white font-semibold">Confirmation par email</h3>
                        <p class="text-gray-300">Vous recevrez un email de confirmation avec les détails de votre rendez-vous.</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <div class="text-blue-400 text-xl">2.</div>
                    <div>
                        <h3 class="text-white font-semibold">Contact téléphonique</h3>
                        <p class="text-gray-300">Je vous contacterai par téléphone pour confirmer le créneau et répondre à vos questions.</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <div class="text-blue-400 text-xl">3.</div>
                    <div>
                        <h3 class="text-white font-semibold">Préparation du rendez-vous</h3>
                        <p class="text-gray-300">Préparez vos documents et questions pour optimiser notre échange.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-blue-900 rounded-lg p-8 mb-8">
            <h2 class="text-2xl font-semibold text-white mb-6">Informations utiles</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-left">
                <div>
                    <h3 class="text-blue-400 font-semibold mb-2">📞 Contact rapide</h3>
                    <p class="text-gray-200">lanquetin.jolan@gmail.com</p>
                    <p class="text-gray-200">lanquetin.jolan@gmail.com</p>
                </div>
                <div>
                    <h3 class="text-blue-400 font-semibold mb-2">⏰ Réactivité</h3>
                    <p class="text-gray-200">Réponse garantie sous 24h</p>
                    <p class="text-gray-200">Disponible en semaine et weekend</p>
                </div>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-lg font-semibold transition-colors duration-300">
                Retour à l'accueil
            </a>
            <a href="Services" class="border-2 border-blue-400 text-blue-400 hover:bg-blue-400 hover:text-white px-8 py-4 rounded-lg font-semibold transition-colors duration-300">
                Découvrir mes services
            </a>
        </div>
    </div>
</section>

<!-- Inclusion du Footer -->
<?php include('footer.php'); ?>

<script src="js/scripts.js"></script>

</body>

</html> 