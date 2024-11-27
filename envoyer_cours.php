<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Destinataire
    $to = "studiopeinturefigurine@gmail.com";
    $subject = "Demande de cours de peinture";

    // Corps du message
    $body = "Nom : $nom\nPrénom : $prenom\nEmail : $email\nMessage : $message";

    // Entêtes
    $headers = "From: $email";

    // Envoi de l'email
    if (mail($to, $subject, $body, $headers)) {
        // Redirection vers la page d'accueil avec message de confirmation
        echo "<script>alert('Votre demande de cours a bien été envoyée. Nous vous contacterons prochainement.'); window.location.href = 'index.html';</script>";
    } else {
        // Si l'envoi échoue
        echo "<script>alert('Une erreur est survenue, veuillez réessayer plus tard.'); window.location.href = 'index.html';</script>";
    }
}
?>
