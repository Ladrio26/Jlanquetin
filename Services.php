<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Services proposés par Jolan Lanquetin, écrivain public à Dijon : administratif, internet, rédaction, correction, soutien scolaire.">
    <title>Services - Jolan LANQUETIN</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-gray-100 font-sans">

<!-- Inclusion du Header -->
<?php include('header.php'); ?>

<!-- Section Hero -->
<section class="bg-gradient-to-br from-blue-900 via-gray-900 to-blue-800 py-12 sm:py-16 lg:py-20">
    <div class="container mx-auto px-4 sm:px-6 lg:px-12">
        <div class="text-center mb-10 lg:mb-16">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-4">Mes Services</h1>
            <p class="text-lg sm:text-xl text-gray-300">Un accompagnement sur-mesure pour tous vos besoins administratifs, numériques et rédactionnels.</p>
        </div>
    </div>
</section>

<!-- Services Cards -->
<section class="py-12 sm:py-16 lg:py-20 bg-gray-800">
    <div class="container mx-auto px-4 sm:px-6 lg:px-12 space-y-16">
        <!-- Administratif -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center" id="administratif">
            <div class="space-y-6">
                <h2 class="text-2xl sm:text-3xl font-semibold text-blue-400 flex items-center mb-4"><span class="mr-2 text-3xl">📋</span> Administratif</h2>
                <div class="bg-gray-900 rounded-lg p-6 shadow-lg space-y-6">
                    <div>
                        <h3 class="text-lg sm:text-xl text-blue-400 font-semibold mb-2">Déclarations d'impôts</h3>
                        <p class="text-gray-300 text-sm sm:text-base">Je vous accompagne dans la préparation et la déclaration de vos impôts, en vous simplifiant les démarches. Je peux même remplir votre déclaration à votre place avec votre procuration. Fort de mon expérience aux finances publiques, je m'assure que tout soit correctement rempli et optimisé pour vos avantages fiscaux.</p>
                    </div>
                    <div>
                        <h3 class="text-lg sm:text-xl text-blue-400 font-semibold mb-2">Gestion des entreprises</h3>
                        <p class="text-gray-300 text-sm sm:text-base">Je vous aide dans la gestion administrative des entreprises, que ce soit pour la création, la cession ou la modification de votre société. De la rédaction des statuts à l'enregistrement des démarches légales, je vous guide pour que vos formalités soient simples et conformes aux exigences.</p>
                    </div>
                    <div>
                        <h3 class="text-lg sm:text-xl text-blue-400 font-semibold mb-2">Administratif général</h3>
                        <p class="text-gray-300 text-sm sm:text-base">Je vous propose un accompagnement dans toutes vos démarches administratives, qu'il s'agisse de gestion de documents, rédaction de courriers ou constitution de dossiers. Mon objectif est de vous libérer des contraintes administratives pour que vous puissiez vous concentrer sur l'essentiel.</p>
                    </div>
                </div>
            </div>
            <div class="flex justify-center lg:justify-end mt-8 lg:mt-0">
                <img src="images/Administratif.png" alt="Services Administratifs" class="rounded-lg shadow-2xl max-w-full h-auto w-full max-w-xs sm:max-w-md lg:max-w-lg">
            </div>
        </div>
        <!-- Internet & Web -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center" id="internet">
            <div class="order-2 lg:order-1 flex justify-center lg:justify-start mt-8 lg:mt-0">
                <img src="images/PCportable.jpg" alt="Aide Internet" class="rounded-lg shadow-2xl max-w-full h-auto w-full max-w-xs sm:max-w-md lg:max-w-lg">
            </div>
            <div class="order-1 lg:order-2 space-y-6">
                <h2 class="text-2xl sm:text-3xl font-semibold text-blue-400 flex items-center mb-4"><span class="mr-2 text-3xl">💻</span> Internet & Web</h2>
                <div class="bg-gray-900 rounded-lg p-6 shadow-lg space-y-6">
                    <div>
                        <h3 class="text-lg sm:text-xl text-blue-400 font-semibold mb-2">Aide internet générale</h3>
                        <p class="text-gray-300 text-sm sm:text-base">Je vous accompagne dans vos démarches en ligne, que ce soit pour remplir des formulaires, gérer vos comptes ou sécuriser vos informations. Mon objectif est de vous rendre plus autonome sur Internet.</p>
                    </div>
                    <div>
                        <h3 class="text-lg sm:text-xl text-blue-400 font-semibold mb-2">Site Web</h3>
                        <p class="text-gray-300 text-sm sm:text-base">Je vous aide à créer ou à mettre à jour votre site web, qu'il s'agisse d'un site vitrine ou d'une boutique en ligne. Vous obtenez un site moderne, fonctionnel et adapté à vos besoins professionnels.</p>
                    </div>
                    <div>
                        <h3 class="text-lg sm:text-xl text-blue-400 font-semibold mb-2">Généalogie</h3>
                        <p class="text-gray-300 text-sm sm:text-base">Je m'occupe des démarches de recherches, ainsi que de la mise en place de votre arbre généalogique.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Rédaction & Corrections -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center" id="redaction">
            <div class="space-y-6">
                <h2 class="text-2xl sm:text-3xl font-semibold text-blue-400 flex items-center mb-4"><span class="mr-2 text-3xl">✍️</span> Rédaction & Corrections</h2>
                <div class="bg-gray-900 rounded-lg p-6 shadow-lg space-y-6">
                    <div>
                        <h3 class="text-lg sm:text-xl text-blue-400 font-semibold mb-2">Rédaction de CV & Lettres de motivation</h3>
                        <p class="text-gray-300 text-sm sm:text-base">Je vous aide à créer ou mettre à jour votre CV et lettre de motivation pour qu'ils soient percutants et attirent l'attention des recruteurs. Vous bénéficiez d'une présentation soignée et de conseils pour valoriser vos compétences et expériences professionnelles.</p>
                    </div>
                    <div>
                        <h3 class="text-lg sm:text-xl text-blue-400 font-semibold mb-2">Correction de textes</h3>
                        <p class="text-gray-300 text-sm sm:text-base">Je corrige vos textes en orthographe, grammaire, syntaxe et fluidité pour les rendre parfaits. Que ce soit pour des documents professionnels ou personnels, vous obtenez un texte irréprochable et bien rédigé.</p>
                    </div>
                    <div>
                        <h3 class="text-lg sm:text-xl text-blue-400 font-semibold mb-2">Soutien scolaire</h3>
                        <p class="text-gray-300 text-sm sm:text-base">J'accompagne les élèves préparant le Bac en mathématiques et français, ou de niveau inférieur. Mon soutien se concentre sur les révisions, les exercices pratiques et l'amélioration des compétences pour réussir les épreuves.</p>
                    </div>
                </div>
            </div>
            <div class="flex justify-center lg:justify-end mt-8 lg:mt-0">
                <img src="images/redaction.jpg" alt="Rédaction & Corrections" class="rounded-lg shadow-2xl max-w-full h-auto w-full max-w-xs sm:max-w-md lg:max-w-lg">
            </div>
        </div>
    </div>
</section>

<!-- Inclusion du Footer -->
<?php include('footer.php'); ?>

<script src="js/scripts.js"></script>

</body>

</html>
