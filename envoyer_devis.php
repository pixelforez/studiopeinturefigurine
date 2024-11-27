<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $codePostal = $_POST['codePostal'];
    $ville = $_POST['ville'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $niveau = $_POST['niveau'];
    $infanterie = $_POST['infanterie'];
    $cavalerie = $_POST['cavalerie'];
    $heros = $_POST['heros'];
    $petitMonstre = $_POST['petitMonstre'];
    $grosMonstre = $_POST['grosMonstre'];

    // Tarifs pour calculer le total
    $tarifs = [
        "infanterie" => ["niveau_1" => 8.00, "niveau_2" => 13.00, "niveau_3" => 25.00],
        "cavalerie_lourde" => ["niveau_1" => 11.00, "niveau_2" => 18.00, "niveau_3" => 35.00],
        "heros_a_pied" => ["niveau_1" => 12.00, "niveau_2" => 20.00, "niveau_3" => 40.00],
        "petit_vehicule_monstre" => ["niveau_1" => 15.00, "niveau_2" => 25.00, "niveau_3" => 50.00],
        "gros_vehicule_monstre" => ["niveau_1" => 50.00, "niveau_2" => 75.00, "niveau_3" => 150.00]
    ];

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
    $message .= "Niveau de Peinture:
