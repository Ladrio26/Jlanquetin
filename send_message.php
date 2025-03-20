<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    $subject = htmlspecialchars($_POST['subject']);

    // Code pour envoyer l'email
    $to = "lanquetin.jolan@gmail.com";  // mon adresse mail
    $email_subject = "Sujet : $subject";
    $body = "Nom: $name\nEmail: $email\nMessage:\n$message";
    $headers = "From: $email";

    if (mail($to, $email_subject, $body, $headers)) {
        echo "<div class='confirmation'>
                <p>Merci, votre message a été envoyé !</p>
                <a href='index.php'><button>Retour à la page d'accueil</button></a>
              </div>";
    } else {
        echo "<div class='confirmation'>
                <p>Désolé, une erreur est survenue.</p>
                <a href='index.php'><button>Retour à la page d'accueil</button></a>
              </div>";
    }
}
?>
