<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification et récupération des données du formulaire
    $nom = isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : '';
    $prenom = isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : '';
    $adresse = isset($_POST['adresse']) ? htmlspecialchars($_POST['adresse']) : '';
    $codePostal = isset($_POST['codePostal']) ? htmlspecialchars($_POST['codePostal']) : '';
    $ville = isset($_POST['ville']) ? htmlspecialchars($_POST['ville']) : '';
    $telephone = isset($_POST['telephone']) ? htmlspecialchars($_POST['telephone']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $niveau = isset($_POST['niveau']) ? $_POST['niveau'] : 'niveau_1'; // valeur par défaut
    $infanterie = isset($_POST['infanterie']) ? (int)$_POST['infanterie'] : 0;
    $cavalerie = isset($_POST['cavalerie']) ? (int)$_POST['cavalerie'] : 0;
    $heros = isset($_POST['heros']) ? (int)$_POST['heros'] : 0;
    $petitMonstre = isset($_POST['petitMonstre']) ? (int)$_POST['petitMonstre'] : 0;
    $grosMonstre = isset($_POST['grosMonstre']) ? (int)$_POST['grosMonstre'] : 0;

    // Tarifs pour calculer le total
    $tarifs = [
        "infanterie" => ["niveau_1" => 8.00, "niveau_2" => 13.00, "niveau_3" => 25.00],
        "cavalerie_lourde" => ["niveau_1" => 11.00, "niveau_2" => 18.00, "niveau_3" => 35.00],
        "heros_a_pied" => ["niveau_1" => 12.00, "niveau_2" => 20.00, "niveau_3" => 40.00],
        "petit_vehicule" => ["niveau_1" => 14.00, "niveau_2" => 22.00, "niveau_3" => 45.00],
        "gros_vehicule" => ["niveau_1" => 18.00, "niveau_2" => 30.00, "niveau_3" => 55.00],
        "gros_monstre" => ["niveau_1" => 25.00, "niveau_2" => 45.00, "niveau_3" => 70.00],
    ];

    $total = 0;

    // Calcul des coûts
    $total += $infanterie * $tarifs["infanterie"][$niveau];
    $total += $cavalerie * $tarifs["cavalerie_lourde"][$niveau];
    $total += $heros * $tarifs["heros_a_pied"][$niveau];
    $total += $petitMonstre * $tarifs["petit_vehicule"][$niveau];
    $total += $grosMonstre * $tarifs["gros_monstre"][$niveau];

    // Envoi du mail
    $to = "studiopeinturefigurine@gmail.com";  // Votre adresse e-mail
    $subject = "Demande de Devis pour Peinture de Figurines";
    $message = "
    Nom: $nom $prenom
    Adresse: $adresse, $codePostal $ville
    Téléphone: $telephone
    Email: $email
    Niveau de peinture: $niveau
    Total estimé: $total €

    Détails de la demande :
    - Infanterie: $infanterie
    - Cavalerie: $cavalerie
    - Héros: $heros
    - Petit Monstre: $petitMonstre
    - Gros Monstre: $grosMonstre
    ";

    $headers = "From: $email";

    if (mail($to, $subject, $message, $headers)) {
        echo "Votre demande a été envoyée. Nous vous contacterons sous peu.";
    } else {
        echo "Une erreur est survenue lors de l'envoi de votre demande. Veuillez réessayer.";
    }
}
?>
