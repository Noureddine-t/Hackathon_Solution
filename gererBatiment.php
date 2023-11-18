<?php

include 'connect.php' ; 

// Perform a query to fetch buildings data
$query = "SELECT * FROM Batiment";
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