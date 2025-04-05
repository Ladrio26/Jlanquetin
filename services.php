<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Écrivain public à Dijon : aide à la déclaration d'impôts, création d'entreprises, rédaction de CV et lettres de motivation.">
    <title>Jolan LANQUETIN - Écrivain Public - Services</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-gray-100 font-sans">

<!-- Inclusion du Header -->
<?php include('header.php'); ?>

<!-- Section principale - Services -->
<section id="content" class="container mx-auto py-16 px-6 md:px-12">
    <div class="grid grid-cols-1 gap-16">

        <!-- Services Administratifs -->
        <div class="service grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h2 class="text-3xl font-semibold text-blue-500">Services Administratifs</h2>
                <h3 class="small-title text-xl text-blue-400 font-semibold mt-6">Déclarations d'impôts</h3>
                <p class="mt-4 text-lg text-gray-300">Je vous accompagne dans la préparation et la déclaration de vos impôts, en vous simplifiant les démarches. Je peux même remplir votre déclaration à votre place avec votre procuration. Fort de mon expérience aux finances publiques, je m'assure que tout soit correctement rempli et optimisé pour vos avantages fiscaux.</p>
                <h3 class="small-title text-xl text-blue-400 font-semibold mt-6">Gestion des entreprises</h3>
                <p class="mt-4 text-lg text-gray-300">Je vous aide dans la gestion administrative des entreprises, que ce soit pour la création, la cession ou la modification de votre société. De la rédaction des statuts à l'enregistrement des démarches légales, je vous guide pour que vos formalités soient simples et conformes aux exigences.</p>
                <h3 class="small-title text-xl text-blue-400 font-semibold mt-6">Administratif général</h3>
                <p class="mt-4 text-lg text-gray-300">Je vous propose un accompagnement dans toutes vos démarches administratives, qu’il s’agisse de gestion de documents, rédaction de courriers ou constitution de dossiers. Mon objectif est de vous libérer des contraintes administratives pour que vous puissiez vous concentrer sur l’essentiel.</p>
            </div>
            <div class="flex justify-center">
                <img src="images/Administratif.png" alt="Services Administratifs" class="administratif rounded-lg shadow-lg">
            </div>
        </div>

        <!-- Services Internet -->
        <div class="service grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="small-title text-xl text-blue-400 font-semibold mt-6">Aide internet générale</h3>
                <p class="mt-4 text-lg text-gray-300">Je vous accompagne dans vos démarches en ligne, que ce soit pour remplir des formulaires, gérer vos comptes ou sécuriser vos informations. Mon objectif est de vous rendre plus autonome sur Internet.</p>
                <h3 class="small-title text-xl text-blue-400 font-semibold mt-6">Site Web</h3>
                <p class="mt-4 text-lg text-gray-300">Je vous aide à créer ou à mettre à jour votre site web, qu'il s'agisse d'un site vitrine ou d'une boutique en ligne. Vous obtenez un site moderne, fonctionnel et adapté à vos besoins professionnels.</p>
            </div>
            <div class="flex justify-center">
                <img src="images/PCportable.jpg" alt="Aide Internet" class="PCportable rounded-lg shadow-lg">
            </div>
        </div>

        <!-- Services Rédactions & Corrections -->
        <div class="service grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="small-title text-xl text-blue-400 font-semibold mt-6">Rédaction de CV & Lettres de motivation</h3>
                <p class="mt-4 text-lg text-gray-300">Je vous aide à créer ou mettre à jour votre CV et lettre de motivation pour qu'ils soient percutants et attirent l'attention des recruteurs. Vous bénéficiez d'une présentation soignée et de conseils pour valoriser vos compétences et expériences professionnelles.</p>
                <h3 class="small-title text-xl text-blue-400 font-semibold mt-6">Correction de textes</h3>
                <p class="mt-4 text-lg text-gray-300">Je corrige vos textes en orthographe, grammaire, syntaxe et fluidité pour les rendre parfaits. Que ce soit pour des documents professionnels ou personnels, vous obtenez un texte irréprochable et bien rédigé.</p>
                <h3 class="small-title text-xl text-blue-400 font-semibold mt-6">Soutien scolaire</h3>
                <p class="mt-4 text-lg text-gray-300">J'accompagne les élèves préparant le Bac en mathématiques et français, ou de niveau inférieur. Mon soutien se concentre sur les révisions, les exercices pratiques et l'amélioration des compétences pour réussir les épreuves.</p>
            </div>
            <div class="flex justify-center">
                <img src="images/redaction.jpg" alt="Rédaction & Corrections" class="redaction rounded-lg shadow-lg">
            </div>
        </div>

    </div>
</section>

<!-- Inclusion du Footer -->
<?php include('footer.php'); ?>

<script src="js/scripts.js"></script>

</body>

</html>
