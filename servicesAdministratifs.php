<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Écrivain public à Dijon : aide à la déclaration d'impôts, création d'entreprises, rédaction de CV et lettres de motivation.">
    <title>Jolan LANQUETIN - Écrivain Public</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/styles2.css">
    <link rel="stylesheet" href="css/stylesNav.css">
    <link rel="stylesheet" href="css/stylesDeroulant.css">
    <link rel="stylesheet" href="css/stylesImages.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery pour simplifier le script -->
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16938109963"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-16938109963');
    </script>
</head>
<body>

<header>
    <div>
        <h1>Jolan LANQUETIN</h1>
        <p>Écrivain Public - Simplification des démarches administratives et rédaction de documents</p>
        <button class="hamburger" aria-label="Ouvrir le menu">
            &#9776; <span class="hamburger-text">Menu</span>
        </button>
        <div class="menu-overlay"></div>

        <nav>
            <ul class="nav-list">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="qui-suis-je.php">Qui suis-je ?</a></li>
                <li class="dropdown">
                    <div class="dropdown-toggle">
                        <a>Mes services</a>
                    </div>
                    <ul class="submenu">
                        <li><a href="servicesAdministratifs.php">Administratif</a></li>
                        <li><a href="servicesInternet.php">Internet</a></li>
                        <li><a href="servicesRedactionsCorrections.php">Rédactions & Corrections</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <div class="dropdown-toggle">
                        <a>Tarifs</a>
                    </div>
                    <ul class="submenu">
                        <li><a href="tarifsAdministratifs.php">Administratif</a></li>
                        <li><a href="tarifsInternet.php">Internet</a></li>
                        <li><a href="tarifsRedactionsCorrections.php">Rédactions & Corrections</a></li>
                    </ul>
                </li>
                <li><a href="mentions-legales.php">Mentions légales</a></li>
            </ul>
        </nav>
    </div>
</header>

<section id="content">
    <div class="container">

        <div id="services" class="service">
            <h2>Mes Services</h2>
            <h3>Déclarations d'impôts</h3>
                <p>Je vous accompagne dans la préparation et la déclaration de vos impôts, en vous simplifiant les démarches. Je peux même remplir votre déclaration à votre place avec votre procuration. Fort de mon expérience aux finances publiques, je m'assure que tout soit correctement rempli et optimisé pour vos avantages fiscaux.</p>
            <h3>Gestion des entreprises</h3>
                <p>Je vous aide dans la gestion administrative des entreprises, que ce soit pour la création, la cession ou la modification de votre société. De la rédaction des statuts à l'enregistrement des démarches légales, je vous guide pour que vos formalités soient simples et conformes aux exigences.</p>
            <h3>Administratif général</h3>
                <p>Je vous propose un accompagnement dans toutes vos démarches administratives, qu’il s’agisse de gestion de documents, rédaction de courriers ou constitution de dossiers. Mon objectif est de vous libérer des contraintes administratives pour que vous puissiez vous concentrer sur l’essentiel.
        </div>

        <img src="images/Administratif.png" alt="Web" class="administratif">

    </div>
</section>

<footer>
    <div>
        <p>&copy; 2025 Jolan LANQUETIN - Tous droits réservés.</p>
    </div>
</footer>

<script src="js/menu.js"></script>

</body>
</html>