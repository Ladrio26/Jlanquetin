<?php
// Vérification de la méthode POST
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: reservation.php");
    exit();
}

// Récupération et nettoyage des données
$firstname = htmlspecialchars($_POST['firstname']);
$lastname = htmlspecialchars($_POST['lastname']);
$email = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phone']);
$service = htmlspecialchars($_POST['service']);
$date = htmlspecialchars($_POST['date']);
$time = htmlspecialchars($_POST['time']);
$mode = htmlspecialchars($_POST['mode']);
$message = htmlspecialchars($_POST['message']);
$consent = isset($_POST['consent']) ? true : false;

// Validation des données
$errors = [];

if (empty($firstname) || empty($lastname) || empty($email) || empty($phone) || empty($service) || empty($date) || empty($time) || empty($mode)) {
    $errors[] = "Tous les champs obligatoires doivent être remplis.";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "L'adresse email n'est pas valide.";
}

if (!$consent) {
    $errors[] = "Vous devez accepter la politique de confidentialité.";
}

// Validation de la date (doit être dans le futur)
$selectedDate = new DateTime($date);
$today = new DateTime();
if ($selectedDate <= $today) {
    $errors[] = "La date sélectionnée doit être dans le futur.";
}

// Si il y a des erreurs, rediriger avec les erreurs
if (!empty($errors)) {
    $errorString = implode("|", $errors);
    header("Location: reservation.php?error=" . urlencode($errorString));
    exit();
}

// Mapping des services pour l'affichage
$serviceNames = [
    'declaration_impots' => 'Déclaration d\'impôts',
    'creation_entreprise' => 'Création d\'entreprise',
    'administratif_general' => 'Administratif général',
    'aide_internet' => 'Aide Internet générale',
    'creation_site' => 'Création de site web',
    'genealogie' => 'Généalogie',
    'cv_lettre' => 'CV & Lettre de motivation',
    'correction_textes' => 'Correction de textes',
    'soutien_scolaire' => 'Soutien scolaire'
];

$modeNames = [
    'domicile' => 'À domicile',
    'distanciel' => 'En distanciel (visioconférence)',
    'bureau' => 'À mon bureau'
];

// Préparation de l'email pour Jolan
$to = "lanquetin.jolan@gmail.com";
$subject = "Nouvelle réservation - " . $serviceNames[$service];

$emailBody = "
Nouvelle réservation reçue :

Nom : $firstname $lastname
Email : $email
Téléphone : $phone
Service : " . $serviceNames[$service] . "
Date : $date
Horaire : $time
Mode : " . $modeNames[$mode] . "

Détails de la demande :
$message

---
Cette réservation a été effectuée via le formulaire en ligne.
";

$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Envoi de l'email à Jolan
$emailSent = mail($to, $subject, $emailBody, $headers);

// Préparation de l'email de confirmation pour le client
$clientSubject = "Confirmation de votre réservation - Jolan LANQUETIN";

$clientEmailBody = "
Bonjour $firstname,

Nous avons bien reçu votre demande de réservation pour le service suivant :

Service : " . $serviceNames[$service] . "
Date : $date
Horaire : $time
Mode : " . $modeNames[$mode] . "

Nous vous confirmerons ce rendez-vous dans les plus brefs délais.

En attendant, voici quelques informations utiles :

📧 Contact : lanquetin.jolan@gmail.com
📧 Email : lanquetin.jolan@gmail.com

Pour les consultations à domicile :
- Préparez vos documents à l'avance
- Prévoyez un espace calme pour notre échange

Pour les consultations en distanciel :
- Testez votre connexion internet
- Installez l'application de visioconférence si nécessaire

Cordialement,
Jolan LANQUETIN
Écrivain Public à Dijon

---
Ce message a été envoyé automatiquement suite à votre réservation en ligne.
";

$clientHeaders = "From: lanquetin.jolan@gmail.com\r\n";
$clientHeaders .= "Reply-To: lanquetin.jolan@gmail.com\r\n";
$clientHeaders .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Envoi de l'email de confirmation au client
$clientEmailSent = mail($email, $clientSubject, $clientEmailBody, $clientHeaders);

// Redirection vers la page de confirmation ou d'erreur
if ($emailSent && $clientEmailSent) {
    header("Location: reservation_confirmation.php");
} else {
    header("Location: reservation_error.php");
}
exit();
?> 