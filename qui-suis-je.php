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
            <h2>Qui suis-je ?</h2>
            <p>Je m'appelle Jolan Lanquetin, et fort de près de 10 ans d'expérience dans les finances publiques, j'ai acquis une expertise solide dans la gestion des impôts, tant pour les particuliers que pour les entreprises.</p>
            <p>Titulaire d'un bac scientifique avec une spécialité en mathématiques et sciences de l'ingénieur, ainsi qu'une formation en classe préparatoire math sup, j'ai toujours été passionné par les mathématiques et les nouvelles technologies.</p>
            <p>Cette passion m'a conduit à me réorienter vers le développement web, un domaine dans lequel j'ai acquis des compétences techniques solides.</p>
            <p>Mon parcours professionnel me permet aujourd'hui de combiner une expérience approfondie dans l'administratif avec une expertise en développement, afin d’offrir des services adaptés aux besoins de mes clients, avec rigueur et innovation.</p>
        </div>

        <img src="images/pcJolan.png" alt="Web" class="pcJolan">

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
