<?php
include 'connect.php';

if (isset($_GET['nom_batiment'])) {
    $nom_batiment = $_GET['nom_batiment'];

    // Supprime le bâtiment de la table Batiment
    $deleteBuildingQuery = "DELETE FROM Batiment WHERE nom_batiment = '$nom_batiment'";
    $result = $idcon->query($deleteBuildingQuery);

    if ($result) {
        echo json_encode(array('success' => 'Bâtiment supprimé avec succès'));
    } else {
        echo json_encode(array('error' => 'Erreur lors de la suppression du bâtiment'));
    }
} else {
    echo json_encode(array('error' => 'Paramètre manquant : nom_batiment'));
}

// Fermer la connexion à la base de données
$idcon->close();
?>
