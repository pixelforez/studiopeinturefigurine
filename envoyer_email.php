<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
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
    $total = $_POST['total'];

    // Destinataire et sujet
    $to = "studiopeinturefigurine@gmail.com";
    $subject = "Devis de Peinture - Formulaire";

    // Contenu du message
    $message = "
        <h3>Devis de Peinture</h3>
        <p><strong>Nom :</strong> $nom</p>
        <p><strong>Prénom :</strong> $prenom</p>
        <p><strong>Adresse :</strong> $adresse, $codePostal $ville</p>
        <p><strong>Téléphone :</strong> $telephone</p>
        <p><strong>E-mail :</strong> $email</p>
        <p><strong>Niveau de Peinture :</strong> $niveau</p>
        <p><strong>Infanteries :</strong> $infanterie</p>
        <p><strong>Cavaleries :</strong> $cavalerie</p>
        <p><strong>Héros à Pied :</strong> $heros</p>
        <p><strong>Petits Véhicules/Monstres :</strong> $petitMonstre</p>
        <p><strong>Gros Véhicules/Monstres :</strong> $grosMonstre</p>
        <p><strong>Total Estimé :</strong> $total €</p>
    ";

    // En
