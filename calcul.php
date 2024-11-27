<?php
// Prix par niveau pour chaque type
$prixInfanterie = [8, 13, 25];  // niv1, niv2, niv3
$prixPersonnage = [12, 20, 40];
$prixMonstre = [30, 50, 100];
$prixVehicule = [60, 80, 150];

// Calcul PHP (au cas où on veut valider côté serveur ou lors de l'envoi du formulaire)
$total = 0;
$niveau = 1; // Valeur par défaut
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $niveau = isset($_POST['niveau']) ? (int)$_POST['niveau'] : 1;
    $infanterie = isset($_POST['infanterie']) ? (int)$_POST['infanterie'] : 0;
    $personnage = isset($_POST['personnage']) ? (int)$_POST['personnage'] : 0;
    $monstre = isset($_POST['monstre']) ? (int)$_POST['monstre'] : 0;
    $vehicule = isset($_POST['vehicule']) ? (int)$_POST['vehicule'] : 0;

    // Calcul du total estimé
    $total = (
        $infanterie * $prixInfanterie[$niveau - 1] + 
        $personnage * $prixPersonnage[$niveau - 1] + 
        $monstre * $prixMonstre[$niveau - 1] + 
        $vehicule * $prixVehicule[$niveau - 1]
    );
}

// Inclure le fichier HTML
include('index.html');
?>
