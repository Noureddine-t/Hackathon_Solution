<?php

include 'connect.php';

// Perform a query to fetch buildings data with the number of sensors and total price
$query = "SELECT Batiment.*, COUNT(Module.id_capteur) AS nombre_capteur, SUM(Module.prix) AS prix_capteurs
          FROM Batiment
          LEFT JOIN Module ON Batiment.nom_batiment = Module.nom_batiment
          GROUP BY Batiment.nom_batiment";

$result = $idcon->query($query);

// Check if the query was successful
if ($result) {
    // Fetch data from the result set
    $buildingsData = array();
    while ($row = $result->fetch_assoc()) {
        $buildingsData[] = $row;
    }

    // Return data as JSON
    echo json_encode($buildingsData);
} else {
    // Handle query error
    echo json_encode(array('error' => 'Query error'));
}

// Close the database connection
$idcon->close();
?>