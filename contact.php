<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Écrivain public à Dijon : aide à la déclaration d'impôts, création d'entreprises, rédaction de CV et lettres de motivation.">
    <title>Jolan LANQUETIN - Écrivain Public - Contact</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-gray-100 font-sans">

<!-- Inclusion du Header -->
<?php include('header.php'); ?>

<!-- Section principale - Coordonnées et Formulaire de Contact -->
<section id="content" class="container mx-auto py-16 px-6 md:px-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

        <!-- Coordonnées à gauche -->
        <div class="bg-gray-800 p-8 rounded-lg shadow-lg">
            <h2 class="text-3xl font-semibold text-blue-500 mb-6">Mes Coordonnées</h2>
            <p class="text-lg text-gray-300">Pour me contacter, vous pouvez utiliser le formulaire ou les moyens suivants :</p>
            <div class="mt-6 space-y-4">
                <p class="text-lg text-gray-300"><strong>Email :</strong> <a href="mailto:lanquetin.jolan@gmail.com" class="text-blue-500 hover:text-blue-300">lanquetin.jolan@gmail.com</a></p>
                <p class="text-lg text-gray-300"><strong>Téléphone :</strong> 07 83 65 02 73</p>
            </div>
        </div>

        <!-- Inclusion du Formulaire de contact -->
        <?php include('contact_form.php'); ?>

    </div>
</section>

<!-- Inclusion du Footer -->
<?php include('footer.php'); ?>

<script src="js/scripts.js"></script>

</body>

</html>
