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
        "petit_vehicule_monstre" => ["niveau_1" => 15.00, "niveau_2" => 25.00, "niveau_3" => 50.00],
        "gros_vehicule_monstre" => ["niveau_1" => 50.00, "niveau_2" => 75.00, "niveau_3" => 150.00]
    ];

    // Vérification si le niveau existe dans les tarifs
    if (!isset($tarifs['infanterie'][$niveau])) {
        $niveau = 'niveau_1'; // Défaut en cas d'erreur
    }

    // Calcul du total estimé
    $total = 
        ($tarifs['infanterie'][$niveau] * $infanterie) +
        ($tarifs['cavalerie_lourde'][$niveau] * $cavalerie) +
        ($tarifs['heros_a_pied'][$niveau] * $heros) +
        ($tarifs['petit_vehicule_monstre'][$niveau] * $petitMonstre) +
        ($tarifs['gros_vehicule_monstre'][$niveau] * $grosMonstre);

    // Message à envoyer
    $message = "Devis de " . $prenom . " " . $nom . ":\n\n";
    $message .= "Adresse: " . $adresse . ", " . $codePostal . " " . $ville . "\n";
    $message .= "Téléphone: " . $telephone . "\n";
    $message .= "Email: " . $email . "\n\n";
    $message .= "Niveau de Peinture: " . $niveau . "\n";
    $message .= "Quantités demandées :\n";
    $message .= "Infanterie : " . $infanterie . "\n";
    $message .= "Cavalerie lourde : " . $cavalerie . "\n";
    $message .= "Héros à pied : " . $heros . "\n";
    $message .= "Petit véhicule monstre : " . $petitMonstre . "\n";
    $message .= "Gros véhicule monstre : " . $grosMonstre . "\n\n";
    $message .= "Total estimé : " . number_format($total, 2, '.', ' ') . " €\n";

    // Vous pouvez envoyer cet email ou l'afficher
    // Par exemple : mail($email, 'Devis de peinture', $message);

    // Affichage du total
    echo "<p>Total estimé : " . number_format($total, 2, '.', ' ') . " €</p>";
}
?>
