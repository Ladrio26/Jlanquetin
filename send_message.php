<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    $subject = htmlspecialchars($_POST['subject']);

    // Code pour envoyer l'email
    $to = "lanquetin.jolan@gmail.com";  // ton adresse mail
    $email_subject = "Sujet : $subject";
    $body = "Nom: $name\nEmail: $email\nMessage:\n$message";
    $headers = "From: $email";

    if (mail($to, $email_subject, $body, $headers)) {
        // Redirection vers la page de confirmation
        header("Location: contactOK.php");
        exit(); // S'assurer que le script s'arrête après la redirection
    } else {
        // Redirection vers la page d'erreur
        header("Location: contactError.php");
        exit(); // S'assurer que le script s'arrête après la redirection
    }
}
?>