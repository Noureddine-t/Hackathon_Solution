<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'connect.php' ; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>IOT-C</title>
    <!-- Include Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <style>
            <?php include 'style.css'; ?>
    </style>

</head>
<body>
<div id="logo-container">
        <img src="image/UrbanPracticeLogo.png" alt="Logo de l'entreprise" id="logo">
    </div>
<header>

    <h1>IOT-C</h1>
</header>
    
<div class="button-container">

    <button class="button" onclick="toggleForm('ajoutBatiment')">Ajout de bâtiment</button>
    <button class="button" onclick="toggleForm('ajoutCapteur')">Ajout de capteur</button>
    <button class="button" onclick="toggleForm('analyseDonnees')">Analyse des données</button>
    <button class="button" onclick="showAllBuildings()">Voir tous les bâtiments</button>
    <button class="button" onclick=" showModuleEvolutionGraph()">Détails des capteurs</button>

</div>

<div id="ajoutBatiment-form" class="form-container">
    <?php include 'ajoutBatimentForm.php'; ?>
</div>

<div id="ajoutCapteur-form" class="form-container">
    <?php include 'ajoutCapteurForm.php'; ?>
</div>
<div id="table-container" style="display: none;">
    <!-- La table de tous les bâtiments sera insérée ici à l'aide de JavaScript -->
</div>

<div id="analyseDonnees-form" class="form-container">
    <!-- Formulaire d'analyse de données peut être ajouté ici -->
    <!-- Personnalisez le formulaire en fonction de vos besoins -->
    <!-- Leaflet map container -->
    <div id="map" style="height: 600px;"></div>
</div>


<div id="chartContainer" style="height: 400px; width: 100%;"></div>
<div id="chartContainerTotal" style="height: 400px; width: 100%;"></div>
<div id="chartContainerTotalEnergie" style="height: 400px; width: 100%;"></div>



<script>
function showModuleEvolutionGraph() {
    <?php
$sql = "SELECT DATE_FORMAT(date_installation, '%Y-%m-%d') as formatted_date, 
        COUNT(*) as total_modules,
        SUM(COUNT(*)) OVER (ORDER BY DATE_FORMAT(date_installation, '%Y-%m-%d')) AS cumulative_total
        FROM Module
        GROUP BY formatted_date
        ORDER BY formatted_date";

$result = $idcon->query($sql);

$dataPoints = array();
$dataPointsTotal = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dataPoints[] = array("y" => intval($row['total_modules']), "label" => $row['formatted_date']);
        $dataPointsTotal[] = array("y" => intval($row['cumulative_total']), "label" => $row['formatted_date']);
    }
}

// Nouvelles requêtes SQL pour chaque type d'énergie
$sqlEau = "SELECT
                DATE_FORMAT(date_installation, '%Y-%m-%d') as formatted_date, 
                COUNT(*) as total_modules,
                SUM(COUNT(*)) OVER (ORDER BY DATE_FORMAT(date_installation, '%Y-%m-%d')) AS cumulative_total
            FROM Module, (SELECT @cumulative_total := 0) as cumul
            WHERE type_energie = 'eau'
            GROUP BY formatted_date
            ORDER BY formatted_date";

$resultEau = $idcon->query($sqlEau);

$dataPointsEau = array();

if ($resultEau->num_rows > 0) {
    while ($row = $resultEau->fetch_assoc()) {
        $dataPointsEau[] = array("y" => intval($row['cumulative_total']), "label" => $row['formatted_date']);
    }
}

$sqlElectricite = "SELECT
                    DATE_FORMAT(date_installation, '%Y-%m-%d') as formatted_date, 
                    COUNT(*) as total_modules,
                    SUM(COUNT(*)) OVER (ORDER BY DATE_FORMAT(date_installation, '%Y-%m-%d')) AS cumulative_total
                FROM Module, (SELECT @cumulative_total := 0) as cumul
                WHERE type_energie = 'electricité'
                GROUP BY formatted_date
                ORDER BY formatted_date";

$resultElectricite = $idcon->query($sqlElectricite);

$dataPointsElectricite = array();

if ($resultElectricite->num_rows > 0) {
    while ($row = $resultElectricite->fetch_assoc()) {
        $dataPointsElectricite[] = array("y" => intval($row['cumulative_total']), "label" => $row['formatted_date']);
    }
}

$sqlGaz = "SELECT
                DATE_FORMAT(date_installation, '%Y-%m-%d') as formatted_date, 
                COUNT(*) as total_modules,
                SUM(COUNT(*)) OVER (ORDER BY DATE_FORMAT(date_installation, '%Y-%m-%d')) AS cumulative_total
            FROM Module, (SELECT @cumulative_total := 0) as cumul
            WHERE type_energie = 'gaz'
            GROUP BY formatted_date
            ORDER BY formatted_date";

$resultGaz = $idcon->query($sqlGaz);

$dataPointsGaz = array();

if ($resultGaz->num_rows > 0) {
    while ($row = $resultGaz->fetch_assoc()) {
        $dataPointsGaz[] = array("y" => intval($row['cumulative_total']), "label" => $row['formatted_date']);
    }
}
?>

// Utiliser CanvasJS pour afficher les graphiques
var chart = new CanvasJS.Chart("chartContainer", {
    title: {
        text: "Évolution du nombre de capteurs installés pour chaque date"
    },
    axisY: {
        title: "Nombre total de capteur"
    },
    axisX: {
        title: "Date d'installation"
    },
    data: [{
        type: "line",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }]
});

chart.render();

var chartTotal = new CanvasJS.Chart("chartContainerTotal", {
    title: {
        text: "Nombre total de capteurs installés pour chaque date (Somme cumulative)"
    },
    axisY: {
        title: "Nombre total de capteurs"
    },
    axisX: {
        title: "Date d'installation"
    },
    data: [{
        type: "line",
        dataPoints: <?php echo json_encode($dataPointsTotal, JSON_NUMERIC_CHECK); ?>
    }]
});

chartTotal.render();

// Troisième graphe avec les données des types d'énergie
var chartTotalEnergie = new CanvasJS.Chart("chartContainerTotalEnergie", {
    title: {
        text: "Évolution du nombre total de capteurs installés pour chaque date (Somme cumulative par type d'énergie)"
    },
    axisY: {
        title: "Nombre total de capteurs"
    },
    axisX: {
        title: "Date d'installation"
    },
    data: [
        {
            type: "line",
            color: "blue", // Couleur pour l'eau
            name: "Eau",
            showInLegend: true,
            dataPoints: <?php echo json_encode($dataPointsEau, JSON_NUMERIC_CHECK); ?>
        },
        {
            type: "line",
            color: "red", // Couleur pour l'électricité
            name: "Électricité",
            showInLegend: true,
            dataPoints: <?php echo json_encode($dataPointsElectricite, JSON_NUMERIC_CHECK); ?>
        },
        {
            type: "line",
            color: "green", // Couleur pour le gaz
            name: "Gaz",
            showInLegend: true,
            dataPoints: <?php echo json_encode($dataPointsGaz, JSON_NUMERIC_CHECK); ?>
        }
        // Ajoutez les configurations pour les autres types d'énergie
        // ...
    ]
});

chartTotalEnergie.render();

    
}



// ... (votre script existant)
</script>

<footer>
    <p>&copy; 2023 IOT-C. Tous droits réservés.</p>
</footer>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="script.js"></script>
</body>
</html>

<?php
if (isset($_POST['AjouterBatiment'])) {
    $NomBat = $_POST['nomBatiment'];
    $Coordonnees = $_POST['adresseBatiment'];
    $Superficie = $_POST['superficie'];
    $Date = $_POST['dateConstruction'];
    $Type = $_POST['typeBatiment'];


    $insertSQL = "INSERT INTO `batiment`(`nom_batiment`, `coordonnees_GPS`, `superficie`, `date_construction`, `type_batiment`) 
              VALUES ('$NomBat' , '$Coordonnees' , '$Superficie' , '$Date' , '$Type')";


    $result = $idcon->query($insertSQL);

    if ($result) {
        echo "<script type=\"text/javascript\"> alert('batiment enregistré avec succes'); 
    window.location.href = \"http://localhost/IoT_c/index.php\";
           </script>";
    } else {
        echo "<script type=\"text/javascript\"> alert('Erreur : " . $idcon->error . "')</script>";
    }

    // Fermer la connexion
    $idcon->close();
}
?>
<?php
if (isset($_POST['AjouterCapteur'])) {
    $id_capteur = $_POST['idCapteur'];
    $date_installation = $_POST['dateInstallation'];
    $fabricant = $_POST['fabriquant'];
    $marque = $_POST['marque'];
    $etage = $_POST['etage'];
    $typeEnergie = $_POST['typeEnergie'];
    $type_donnee = $_POST['typeDeDonnee'];
    $categorie = $_POST['categorieCapteur'];
    $protocol_communication = $_POST['protocoleCommunication'];
    $prix=$_POST['prix'];
    $batiment=$_POST['batiment'];

    $insertSQL = "INSERT INTO `module`(`id_capteur`, `nom_batiment`,`date_installation`, `fabricant`, `marque`, `etage`,`type_energie`, `type_donnee`,`categorie`, `protocol_communication`, `prix`) 
         VALUES ('$id_capteur','$batiment' , '$date_installation' , '$fabricant' , '$marque' , '$etage', '$typeEnergie' , '$type_donnee' , '$categorie' , '$protocol_communication', '$prix')";


    $result = $idcon->query($insertSQL);

    if ($result) {
        echo "<script type=\"text/javascript\"> alert('capteur enregistré avec succes'); 
    window.location.href = \"http://localhost/IoT_c/index.php\";
           </script>";
    } else {
        echo "<script type=\"text/javascript\"> alert('Erreur : " . $idcon->error . "')</script>";
    }

    // Fermer la connexion
    $idcon->close();
}
?>