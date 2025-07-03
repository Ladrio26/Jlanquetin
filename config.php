<?php
// Configuration du site
$site_config = [
    'title' => 'Jolan LANQUETIN - Écrivain Public à Dijon',
    'description' => 'Écrivain public à Dijon : aide à la déclaration d\'impôts, création d\'entreprises, rédaction de CV et lettres de motivation. Services à domicile et en distanciel.',
    'keywords' => 'écrivain public, Dijon, déclaration impôts, création entreprise, CV, lettre motivation, aide administrative',
    'author' => 'Jolan LANQUETIN',
    'url' => 'https://jlanquetin.goodloss.fr',
    'email' => 'lanquetin.jolan@gmail.com',
    'phone' => '',
    'siren' => '941 723 108',
    'address' => '34 BOULEVARD DE LA MARNE BATIMENT A, 21000 DIJON France',
    'zone' => 'Dijon et sa périphérie (rayon de 20km)',
    
    // Horaires
    'horaires' => [
        'lundi_vendredi' => '9h00 - 18h00',
        'samedi' => '9h00 - 12h00',
        'dimanche' => 'Sur demande'
    ],
    
    // Services avec descriptions
    'services' => [
        'administratif' => [
            'declaration_impots' => 'Déclaration d\'impôts',
            'creation_entreprise' => 'Création d\'entreprise',
            'administratif_general' => 'Administratif général'
        ],
        'internet' => [
            'aide_internet' => 'Aide Internet générale',
            'creation_site' => 'Création de site web',
            'genealogie' => 'Généalogie'
        ],
        'redaction' => [
            'cv_lettre' => 'CV & Lettre de motivation',
            'correction_textes' => 'Correction de textes',
            'soutien_scolaire' => 'Soutien scolaire'
        ]
    ],
    
    // Tarifs
    'tarifs' => [
        'declaration_impots' => '20 à 35 € par déclaration',
        'gestion_entreprises' => '30 à 50 € de l\'heure',
        'administratif_general' => '30 à 50 € de l\'heure',
        'creation_site' => 'Devis à voir selon les attentes',
        'aide_internet' => '20 € de l\'heure',
        'lettres_personnelles' => '10 € par page de 1 500 signes',
        'lettre_motivation' => '40 €',
        'cv' => '35 €',
        'cv_lettre_combo' => '70 €',
        'correction_textes' => '2,5 € par page de 1 500 signes',
        'soutien_scolaire' => '20 € de l\'heure',
        'genealogie' => 'Devis à voir selon les attentes'
    ],
    
    // Réseaux sociaux (à ajouter si nécessaire)
    'social' => [
        'linkedin' => '',
        'facebook' => '',
        'twitter' => ''
    ],
    
    // Informations légales
    'legal' => [
        'forme_juridique' => 'Entrepreneur individuel',
        'responsable_publication' => 'Jolan LANQUETIN',
        'hebergeur' => 'Goodloss.fr'
    ]
];

// Fonction pour obtenir une configuration
function get_config($key) {
    global $site_config;
    $keys = explode('.', $key);
    $value = $site_config;
    
    foreach ($keys as $k) {
        if (isset($value[$k])) {
            $value = $value[$k];
        } else {
            return null;
        }
    }
    
    return $value;
}

// Fonction pour générer les métadonnées Open Graph
function generate_og_meta($page_title = '', $page_description = '', $page_image = '') {
    global $site_config;
    
    $title = $page_title ? $page_title . ' - ' . $site_config['title'] : $site_config['title'];
    $description = $page_description ?: $site_config['description'];
    $image = $page_image ?: $site_config['url'] . '/images/pcJolan.png';
    
    return [
        'og:type' => 'website',
        'og:url' => $site_config['url'],
        'og:title' => $title,
        'og:description' => $description,
        'og:image' => $image,
        'twitter:card' => 'summary_large_image',
        'twitter:url' => $site_config['url'],
        'twitter:title' => $title,
        'twitter:description' => $description,
        'twitter:image' => $image
    ];
}

// Fonction pour valider et nettoyer les données
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Fonction pour valider l'email
function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Fonction pour générer un token CSRF
function generate_csrf_token() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// Fonction pour vérifier le token CSRF
function verify_csrf_token($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Configuration des erreurs
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error.log');

// Configuration de la session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Configuration du fuseau horaire
date_default_timezone_set('Europe/Paris');

// Configuration des en-têtes de sécurité
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
header('Referrer-Policy: strict-origin-when-cross-origin');
?> 