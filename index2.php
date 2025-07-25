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
    <!-- Event snippet for Envoi de formulaire pour prospects conversion page -->
    <script>
        gtag('event', 'conversion', {
            'send_to': 'AW-16938109963/eoqyCIGtvKwaEIuY3Iw_',
            'value': 1.0,
            'currency': 'EUR'
        });
    </script>
</head>
<body>

<header>
    <div>
        <h1>Jolan LANQUETIN</h1>
        <p>Écrivain Public - Simplification des démarches administratives et rédaction de documents</p>
        <!-- Bouton en dehors du <nav> -->
        <button class="hamburger" aria-label="Ouvrir le menu">
            &#9776; <span class="hamburger-text">Menu</span>
        </button>
        <div class="menu-overlay"></div>

        <nav>
            <ul class="nav-list">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="Moi.php">Qui suis-je ?</a></li>
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
                <li><a href="Mentions-Legales.php">Mentions légales</a></li>
            </ul>
        </nav>

    </div>
</header>

<section id="content">
    <div class="container">
        <!-- Section Services -->
        <div id="services" class="service">
            <h2>Mes Services</h2>
            <h3 class="small-title">Administratif</h3>
            <ul>
                <button class="accordion">Déclarations d'impôts</button>
                <div class="panel">
                    <p>Je m'occupe du remplissage de vos déclarations fiscales, tant pour les particuliers que pour les entreprises, ou selon votre choix, je vous accompagne dans les démarches.</p>
                </div>
                <button class="accordion">Gestion des entreprises</button>
                <div class="panel">
                    <p>Que vous souhaitiez créer, modifier ou cesser votre entreprise, je me charge des démarches pour vous.</p>
                </div>
                <button class="accordion">Administratif général</button>
                <div class="panel">
                    <p>Vous devez remplir un dossier administratif, et vous n'êtes pas à l'aise avec ce type de formulaire ? Je m'en charge à votre place.</p>
                </div>
            </ul>
            <h3 class="small-title">Internet</h3>
            <ul>
                <button class="accordion">Aide Internet générale</button>
                <div class="panel">
                    <p>Vous avez des démarches sur Internet à effectuer, mais vous êtes perdu ? Je m'en charge!</p>
                </div>
                <button class="accordion">Site Web</button>
                <div class="panel">
                    <p>Vous souhaitez créer votre site internet, ou modifier un site déjà existant, contactez moi.</p>
                </div>
            </ul>
            <h3 class="small-title">Rédactions & Corrections</h3>
            <ul>
                <button class="accordion">Rédaction de CV & Lettres de motivation</button>
                <div class="panel">
                    <p>Je vous rédige un CV et des lettres de motivation percutants qui vous démarqueront auprès des recruteurs.</p>
                </div>
                <button class="accordion">Correction de textes</button>
                <div class="panel">
                    <p>Je propose un service de correction orthographe, grammaire, syntaxe... de vos textes professionnels ou personnels.</p>
                </div>
                <button class="accordion">Soutien scolaire</button>
                <div class="panel">
                    <p>Je propose du soutien scolaire jusqu'au Baccalauréat en Mathématiques et Francais.</p>
                </div>
            </ul>
        </div>

        <!-- Formulaire de contact -->
        <div id="contact" class="contact-form">
            <h2>Contactez-moi</h2>
            <form action="send_message.php" method="post">
                <label for="name">Votre nom</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Votre email</label>
                <input type="email" id="email" name="email" required>

                <label for="subject">Sujet</label>
                <select id="subject" name="subject" required>
                    <option value="Demande de renseignements">Demande de renseignements</option>
                    <option value="Déclaration d'impôts">Déclaration d'impôts</option>
                    <option value="Gestion des entreprises">Gestion des entreprises</option>
                    <option value="Administratif Général">Administratif Général</option>
                    <option value="Aide Internet">Aide Internet</option>
                    <option value="Rédactions de CV & Lettres de motivations">Rédaction de CV & Lettres de motivations</option>
                    <option value="Corrections / Relecture de textes">Corrections / Relecture de textes</option>
                    <option value="Site Web">Site Web</option>
                    <option value="Soutien Scolaire">Soutien Scolaire</option>
                    <option value="Autre">Autre</option>
                </select>

                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5" required></textarea>

                <button type="submit">Envoyer</button>
            </form>
        </div>
    </div>
</section>

<footer>
    <div>
        <p>&copy; 2025 Jolan LANQUETIN - Tous droits réservés.</p>
    </div>
</footer>

<script src="js/deroulants.js"></script>
<script src="js/menu.js"></script>

</body>
</html>
