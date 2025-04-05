<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Écrivain public à Dijon : aide à la déclaration d'impôts, création d'entreprises, rédaction de CV et lettres de motivation.">
    <title>Jolan LANQUETIN - Écrivain Public - Erreur</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-gray-100 font-sans">

<!-- Inclusion du Header -->
<?php include('header.php'); ?>

<!-- Section de l'erreur -->
<section id="content" class="container mx-auto py-16 px-6 md:px-12">
    <div class="bg-red-800 p-8 rounded-lg shadow-lg">
        <h2 class="text-3xl font-semibold text-white mb-4">Une erreur est survenue</h2>

        <?php
        // Récupération du message d'erreur via l'URL
        if (isset($_GET['error'])) {
            echo '<p class="text-lg text-red-300">Erreur : ' . htmlspecialchars($_GET['error']) . '</p>';
        } else {
            echo '<p class="text-lg text-red-300">Une erreur inconnue est survenue.</p>';
        }
        ?>

        <div class="mt-6">
            <a href="index.php" class="text-blue-500 hover:text-blue-300 text-lg">Retour au formulaire de contact</a>
        </div>
    </div>
</section>

<!-- Inclusion du Footer -->
<?php include('footer.php'); ?>

<script src="js/scripts.js"></script>

</body>

</html>
