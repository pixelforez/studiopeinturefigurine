<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $message = $_POST['message'];

    // Destinataire de l'email
    $to = "studiopeinturefigurine@gmail.com";

    // Sujet de l'email
    $subject = "Message de $prenom $nom";

    // Contenu de l'email
    $messageContent = "Nom: $nom\n";
    $messageContent .= "Prénom: $prenom\n";
    $messageContent .= "Adresse: $adresse\n";
    $messageContent .= "Email: $email\n";
    $messageContent .= "Téléphone: $telephone\n\n";
    $messageContent .= "Message:\n$message";

    // En-têtes de l'email
    $headers = "From: $email";

    // Envoi de l'email
    if (mail($to, $subject, $messageContent, $headers)) {
        echo "Votre message a été envoyé avec succès.";
    } else {
        echo "Erreur lors de l'envoi du message.";
    }
}
?>
