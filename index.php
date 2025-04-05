<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Écrivain public à Dijon : aide à la déclaration d'impôts, création d'entreprises, rédaction de CV et lettres de motivation.">
    <title>Jolan LANQUETIN - Écrivain Public</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-gray-100 font-sans">

<!-- Inclusion du Header -->
<?php include('header.php'); ?>

<!-- Main Section -->
<section class="container mx-auto py-16 px-6 md:px-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-16">

        <!-- Services -->
        <div class="space-y-8">
            <h2 class="text-3xl font-semibold text-blue-500">Mes Services</h2>

            <!-- Service Administratif -->
            <div>
                <h3 class="text-xl text-blue-400 font-semibold">Administratif</h3>
                <div class="space-y-4 mt-4">
                    <button class="accordion text-white bg-gray-700 hover:bg-gray-800 rounded-lg px-4 py-2 w-full text-left">
                        Déclarations d'impôts
                    </button>
                    <div class="panel bg-gray-800 text-gray-200 rounded-lg shadow-md p-4 hidden">
                        <p>Je m'occupe du remplissage de vos déclarations fiscales, tant pour les particuliers que pour les entreprises, ou selon votre choix, je vous accompagne dans les démarches.</p>
                    </div>

                    <button class="accordion text-white bg-gray-700 hover:bg-gray-800 rounded-lg px-4 py-2 w-full text-left">
                        Gestion des entreprises
                    </button>
                    <div class="panel bg-gray-800 text-gray-200 rounded-lg shadow-md p-4 hidden">
                        <p>Que vous souhaitiez créer, modifier ou cesser votre entreprise, je me charge des démarches pour vous.</p>
                    </div>

                    <button class="accordion text-white bg-gray-700 hover:bg-gray-800 rounded-lg px-4 py-2 w-full text-left">
                        Administratif général
                    </button>
                    <div class="panel bg-gray-800 text-gray-200 rounded-lg shadow-md p-4 hidden">
                        <p>Vous devez remplir un dossier administratif, et vous n'êtes pas à l'aise avec ce type de formulaire ? Je m'en charge à votre place.</p>
                    </div>
                </div>
            </div>

            <!-- Service Internet -->
            <div>
                <h3 class="text-xl text-blue-400 font-semibold">Internet</h3>
                <div class="space-y-4 mt-4">
                    <button class="accordion text-white bg-gray-700 hover:bg-gray-800 rounded-lg px-4 py-2 w-full text-left">
                        Aide Internet générale
                    </button>
                    <div class="panel bg-gray-800 text-gray-200 rounded-lg shadow-md p-4 hidden">
                        <p>Vous avez des démarches sur Internet à effectuer, mais vous êtes perdu ? Je m'en charge!</p>
                    </div>

                    <button class="accordion text-white bg-gray-700 hover:bg-gray-800 rounded-lg px-4 py-2 w-full text-left">
                        Site Web
                    </button>
                    <div class="panel bg-gray-800 text-gray-200 rounded-lg shadow-md p-4 hidden">
                        <p>Vous souhaitez créer votre site internet, ou modifier un site déjà existant, contactez moi.</p>
                    </div>
                </div>
            </div>

            <!-- Service Rédactions & Corrections -->
            <div>
                <h3 class="text-xl text-blue-400 font-semibold">Rédactions & Corrections</h3>
                <div class="space-y-4 mt-4">
                    <button class="accordion text-white bg-gray-700 hover:bg-gray-800 rounded-lg px-4 py-2 w-full text-left">
                        Rédaction de CV & Lettres de motivation
                    </button>
                    <div class="panel bg-gray-800 text-gray-200 rounded-lg shadow-md p-4 hidden">
                        <p>Je rédige un CV et des lettres de motivation percutants pour vous démarquer auprès des recruteurs.</p>
                    </div>

                    <button class="accordion text-white bg-gray-700 hover:bg-gray-800 rounded-lg px-4 py-2 w-full text-left">
                        Correction de textes
                    </button>
                    <div class="panel bg-gray-800 text-gray-200 rounded-lg shadow-md p-4 hidden">
                        <p>Correction de vos textes professionnels ou personnels en termes de grammaire, orthographe, et syntaxe.</p>
                    </div>

                    <button class="accordion text-white bg-gray-700 hover:bg-gray-800 rounded-lg px-4 py-2 w-full text-left">
                        Soutien scolaire
                    </button>
                    <div class="panel bg-gray-800 text-gray-200 rounded-lg shadow-md p-4 hidden">
                        <p>Je propose du soutien scolaire en Mathématiques et Français jusqu'au Baccalauréat.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <?php include('contact_form.php'); ?>

    </div>
</section>

<!-- Inclusion du Footer -->
<?php include('footer.php'); ?>

<script src="js/scripts.js"></script>

</body>

</html>
