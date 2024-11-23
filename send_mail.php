<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupération des données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    // Vérification des champs
    if ($name && $email && $message) {
        // Configuration de l'email
        $to = "kylianapert25@gmail.com";
        $subject = "Message de $name via le formulaire de contact";
        $headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain; charset=utf-8";

        // Envoi de l'email
        if (mail($to, $subject, $message, $headers)) {
            echo "Votre message a été envoyé avec succès.";
        } else {
            echo "Une erreur est survenue lors de l'envoi du message.";
        }
    } else {
        echo "Veuillez remplir tous les champs correctement.";
    }
}
?>