<?php
// Afficher les erreurs de connexion (uniquement en développement)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Paramètres de connexion à la base de données
$host = 'localhost';  // Remplace par l'adresse de ton serveur MySQL
$dbname = 'ladrio';   // Nom de ta base de données
$username = 'ladrio'; // Nom d'utilisateur
$password = 'cerise'; // Mot de passe de l'utilisateur

// DSN (Data Source Name) pour MySQL avec l'encodage UTF-8
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

// Options PDO pour gérer les erreurs
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Afficher les erreurs SQL
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Récupérer les données sous forme de tableau associatif
];

// Connexion à la base de données avec PDO
try {
    // Création de la connexion PDO
    $pdo = new PDO($dsn, $username, $password, $options);
    echo "Connexion réussie à la base de données.";
} catch (PDOException $e) {
    // Si la connexion échoue, afficher l'erreur
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
