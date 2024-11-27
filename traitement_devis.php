<?php
// Initialiser les variables
$total = 0;
$nom = '';
$prenom = '';
$adresse = '';
$email = '';
$telephone = '';

// Si le formulaire est soumis, on effectue le calcul et l'envoi de l'email
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération des données du formulaire
    $nom = isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : '';
    $prenom = isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : '';
    $adresse = isset($_POST['adresse']) ? htmlspecialchars($_POST['adresse']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $telephone = isset($_POST['telephone']) ? htmlspecialchars($_POST['telephone']) : '';
    $niveau = isset($_POST['niveau']) ? (int)$_POST['niveau'] : 1;
    $infanterie = isset($_POST['infanterie']) ? (int)$_POST['infanterie'] : 0;
    $personnage = isset($_POST['personnage']) ? (int)$_POST['personnage'] : 0;
    $monstre = isset($_POST['monstre']) ? (int)$_POST['monstre'] : 0;
    $vehicule = isset($_POST['vehicule']) ? (int)$_POST['vehicule'] : 0;

    // Prix par niveau pour chaque type
    $prixInfanterie = [8, 13, 25]; // niv1, niv2, niv3
    $prixPersonnage = [12, 20, 40];
    $prixMonstre = [30, 50, 100];
    $prixVehicule = [60, 80, 150];

    // Calcul du total
    $total = ($infanterie * $prixInfanterie[$niveau - 1]) +
             ($personnage * $prixPersonnage[$niveau - 1]) +
             ($monstre * $prixMonstre[$niveau - 1]) +
             ($vehicule * $prixVehicule[$niveau - 1]);

    // Envoi de l'email de demande de devis
    $to = "studiopeinturefigurine@gmail.com";
    $subject = "Demande de devis";
    $message = "
    <html>
    <head>
        <title>Demande de devis - Peinture Figurine</title>
    </head>
    <body>
        <p><strong>Nom :</strong> $nom</p>
        <p><strong>Prénom :</strong> $prenom</p>
        <p><strong>Adresse :</strong> $adresse</p>
        <p><strong>Email :</strong> $email</p>
        <p><strong>Téléphone :</strong> $telephone</p>
        <h3>Devis :</h3>
        <p><strong>Niveau de peinture :</strong> $niveau</p>
        <p><strong>Infanterie :</strong> $infanterie</p>
        <p><strong>Personnages :</strong> $personnage</p>
        <p><strong>Monstres :</strong> $monstre</p>
        <p><strong>Véhicules :</strong> $vehicule</p>
        <h3>Total estimé : " . number_format($total, 2, ',', ' ') . " €</h3>
    </body>
    </html>
    ";

    // Pour envoyer un email HTML, l'en-tête Content-type doit être défini
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";

    // Envoi de l'email
    if (mail($to, $subject, $message, $headers)) {
        // Si l'email est envoyé avec succès, rediriger vers une page de confirmation
        header('Location: confirmation.php');
        exit;
    } else {
        // Si une erreur survient, afficher un message d'erreur
        echo "<script>alert('Une erreur est survenue lors de l\'envoi de votre demande.');</script>";
    }
}
?>
