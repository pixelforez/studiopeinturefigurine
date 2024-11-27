<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];

    $infanterie = $_POST['infanterie'];
    $personnage = $_POST['personnage'];
    $monstre = $_POST['monstre'];
    $vehicule = $_POST['vehicule'];

    $niveau_preparation = $_POST['niveau_preparation'];
    $niveau_peinture = $_POST['niveau_peinture'];
    $niveau_soclage = $_POST['niveau_soclage'];

    // Tarifs de base
    $tarif_base_painting = 10;  // Tarif de base pour la peinture (exemple)
    $tarif_base_preparation = 5;  // Tarif pour préparation (exemple)
    $tarif_base_soclage = 3;  // Tarif pour soclage (exemple)

    // Calcul du devis
    $total_painting = ($infanterie + $personnage + $monstre + $vehicule) * $tarif_base_painting * ($niveau_peinture + 1);
    $total_preparation = ($infanterie + $personnage + $monstre + $vehicule) * $tarif_base_preparation * ($niveau_preparation + 1);
    $total_soclage = ($infanterie + $personnage + $monstre + $vehicule) * $tarif_base_soclage * ($niveau_soclage + 1);

    // Total général
    $total = $total_painting + $total_preparation + $total_soclage;

    // Création du message
    $message = "Nom: $nom $prenom\n";
    $message .= "Email: $email\n";
    $message .= "Téléphone: $telephone\n";
    $message .= "Adresse: $adresse\n\n";
    $message .= "Devis estimé :\n";
    $message .= "Infanterie: $infanterie\n";
    $message .= "Personnages: $personnage\n";
    $message .= "Monstres: $monstre\n";
    $message .= "Véhicules: $vehicule\n\n";
    $message .= "Total peinture: $total_painting €\n";
    $message .= "Total préparation: $total_preparation €\n";
    $message .= "Total soclage: $total_soclage €\n";
    $message .= "Total estimé : $total €\n";

    // Envoi de l'email
    $to = "studiopeinturefigurine@gmail.com";
    $subject = "Demande de devis - Studio Peinture Figurine";
    $headers = "From: $email";

    if (mail($to, $subject, $message, $headers)) {
        echo "Votre demande de devis a été envoyée avec succès. Vous recevrez une réponse sous peu.";
    } else {
        echo "Une erreur est survenue lors de l'envoi de votre demande.";
    }
}
?>
