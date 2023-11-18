<!DOCTYPE html>

<html lang="en">
<head>
    <?php include 'connect.php' ; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IOT-C</title>
    <!-- Include Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
       <style>
            <?php include 'style.css'; ?>
       </style>
</head>
<body>
<header>
    <h1>IOT-C</h1>
</header>

<div class="button-container">
    <button class="button" onclick="toggleForm('ajoutBatiment')">Ajout de bâtiment</button>
    <button class="button" onclick="toggleForm('ajoutCapteur')">Ajout de capteur</button>
    <button class="button" onclick="toggleForm('analyseDonnees')">Analyse des données</button>
</div>

<div id="ajoutBatiment-form" class="form-container">
    <h2>Formulaire d'ajout de bâtiment</h2>
    <form id="consultation-form" class="feed-form" method="POST">
        <label for="nomBatiment">Nom du bâtiment:</label>
        <input type="text" id="nomBatiment" name="nomBatiment" required>

        <label for="adresseBatiment">Adresse (Coordonnées GPS):</label>
        <input type="text" id="adresseBatiment" name="adresseBatiment" required>

        <label for="superficie">Superficie (m²):</label>
        <input type="number" id="superficie" name="superficie" required>

        <label for="typeBatiment">Type de bâtiment:</label>
        <select id="typeBatiment" name="typeBatiment">
            <option value="residence">Résidence</option>
            <option value="commercial">Commercial</option>
            <option value="industriel">Industriel</option>
        </select>

        <label for="dateConstruction">Date de construction:</label>
        <input type="date" id="dateConstruction" name="dateConstruction" required>

        <button type="submit" name="Ajouter">Ajouter Bâtiment</button>
    </form>
</div>

<div id="ajoutCapteur-form" class="form-container">
    <h2>Formulaire d'ajout de capteur</h2>
    <form>
        <label for="idCapteur">ID du capteur:</label>
        <input type="text" id="idCapteur" name="idCapteur" required>

        <label for="typeEnergie">Type d'énergie captée:</label>
        <input type="text" id="typeEnergie" name="typeEnergie" required>

        <label for="dateIsolation">Date d'isolation:</label>
        <input type="date" id="dateIsolation" name="dateIsolation" required>

        <label for="protocoleCommunication">Protocole de communication:</label>
        <input type="text" id="protocoleCommunication" name="protocoleCommunication" required>

        
<label for="categorieCapteur">Catégorie de module:</label>
        <select id="categorieCapteur" name="categorieCapteur">
            <option value="actionneur">Actionneur</option>
            <option value="passerelle">Passerelle</option>
            <option value="passerelle">Capteur</option>
        </select>

        <label for="localisationBatiment">Localisation dans le bâtiment:</label>
        <input type="text" id="localisationBatiment" name="localisationBatiment" required>

        <button type="submit">Ajouter Capteur</button>
    </form>
</div>


<div id="analyseDonnees-form" class="form-container">
    <!-- Formulaire d'analyse de données peut être ajouté ici -->
    <!-- Personnalisez le formulaire en fonction de vos besoins -->
</div>

<footer>
    <p>&copy; 2023 IOT-C. Tous droits réservés.</p>
</footer>

<script>
    function toggleForm(formId) {
        // Get the form container that was clicked
        var formContainer = document.getElementById(formId + '-form');

        // Hide all other form containers
        var allFormContainers = document.querySelectorAll('.form-container');
        allFormContainers.forEach(function (container) {
            if (container !== formContainer) {
                container.style.display = 'none';
            }
        });

        // Toggle the display of the clicked form container
        formContainer.style.display = (formContainer.style.display === 'none' || formContainer.style.display === '') ? 'block' : 'none';
    }
</script>

<?php
if (isset($_POST['Ajouter'])) {
    $NomBat = $_POST['nomBatiment'];
    $Coordonnees = $_POST['adresseBatiment'];
    $Superficie = $_POST['superficie'];
    $Date = $_POST['dateConstruction'];
    $Type = $_POST['typeBatiment'];


    $insertSQL = "INSERT INTO `batiment`(`nom`, `coordonnees_GPS`, `superficie`, `date_construction`, `type_batiment`) 
               VALUES ('$NomBat' , '$Coordonnees' , '$Superficie' , '$Date' , '$Type' )";

    $result = $idcon->query($insertSQL);

    if ($result) {
        echo "<script type=\"text/javascript\"> alert('Livre enregistré '); 
    window.location.href = \"http://localhost/IoT_c/index.php\";
           </script>";
    } else {
        echo "<script type=\"text/javascript\"> alert('Erreur : " . $idcon->error . "')</script>";
    }

    // Fermer la connexion
    $idcon->close();
}
?>

</body>
</html>


