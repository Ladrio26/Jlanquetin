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
</head>
<body>

<header>
    <div>
        <h1>Jolan LANQUETIN</h1>
        <p>Écrivain Public - Simplification des démarches administratives et rédaction de documents</p>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="qui-suis-je.php">Qui suis-je ?</a></li>
                <li class="dropdown">
                    <a>Mes services</a>
                    <ul class="submenu">
                        <li><a href="servicesAdministratifs.php">Administratif</a></li>
                        <li><a href="internet.php">Internet</a></li>
                        <li><a href="redactions-corrections.php">Rédactions & Corrections</a></li>
                    </ul>
                </li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>

<h2>Une erreur est survenue</h2>

<?php
// Récupération du message d'erreur via l'URL
if (isset($_GET['error'])) {
    echo '<p style="color:red;">Erreur : ' . htmlspecialchars($_GET['error']) . '</p>';
} else {
    echo '<p>Une erreur inconnue est survenue.</p>';
}
?>

<footer>
    <div>
        <p>&copy; 2025 Jolan LANQUETIN - Tous droits réservés.</p>
    </div>
</footer>

</body>
</html>
