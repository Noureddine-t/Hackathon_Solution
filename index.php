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
 <!-- Include Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>
<body>
<header>
    <h1>IOT-C</h1>
</header>

<div class="button-container">

    <button class="button" onclick="toggleForm('ajoutBatiment')">Ajout de bâtiment</button>
    <button class="button" onclick="toggleForm('ajoutCapteur')">Ajout de capteur</button>
    <button class="button" onclick="toggleForm('analyseDonnees')">Analyse des données</button>
    <button class="button" onclick="showAllBuildings()">Voir tous les bâtiments</button>
</div>

<div id="ajoutBatiment-form" class="form-container">
    <h2>Formulaire d'ajout de bâtiment</h2>
    <form id="consultation-form" class="feed-form" method="POST" >
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

        <button type="submit" name="AjouterBatiment">Ajouter Bâtiment</button>
    </form>
</div>

<div id="ajoutCapteur-form" class="form-container">
    <h2>Formulaire d'ajout de capteur</h2>
    <form id="consultation-form" class="feed-form" method="POST" >
        <label for="idCapteur">ID du capteur:</label>
        <input type="text" id="idCapteur" name="idCapteur" required>

        <label for="typeEnergie">Type d'énergie captée:</label>
        <select id="typeEnergie" name="typeEnergie">
            <option value="Eau">Eau</option>
            <option value="Gaz">Gaz</option>
            <option value="Eléctricité">Eléctricité</option>
        </select>

        <label for="dateInstallation">Date d'installation:</label>
        <input type="date" id="dateInstallation" name="dateInstallation" required>

        <label for="prix">Prix:</label>
        <input type="number" step="0.01" id="prix" name="prix" step="0.01" required>

        <label for="fabriquant">Fabriquant:</label>
        <input type="text" id="fabriquant" name="fabriquant" required>

        <label for="marque">marque:</label>
        <input type="text" id="marque" name="marque" required>

        <label for="protocoleCommunication">Protocole de communication:</label>
        <input type="text" id="protocoleCommunication" name="protocoleCommunication" required>

        <label for="categorieCapteur">Catégorie de module:</label>
        <select id="categorieCapteur" name="categorieCapteur">
            <option value="actionneur">Actionneur</option>
            <option value="passerelle">Passerelle</option>
            <option value="passerelle">Capteur</option>
        </select>
        <label for="typeDeDonnee">Type de données:</label>
        <select id="typeDeDonnee" name="typeDeDonnee">
            <option value="Alerte">Alerte</option>
            <option value="Consigne">Consigne</option>
            <option value="Alerte">Compteur</option>
            <option value="plageHoraire">Plage horaire de fonctionnement</option>
            <option value="Température">Température</option>
        </select>

        <label for="etage">Etage:</label>
        <input type="text" id="etage" name="etage" required>

        <button type="submit" name="AjouterCapteur">Ajouter Capteur</button>
    </form>
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


    $insertSQL = "INSERT INTO `batiment`(`nom`, `coordonnees_GPS`, `superficie`, `date_construction`, `type_batiment`) 
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

    $insertSQL = "INSERT INTO `module`(`id_capteur`, `date_installation`, `fabricant`, `marque`, `etage`,`type_energie`, `type_donnee`,`categorie`, `protocol_communication`, `prix`) 
         VALUES ('$id_capteur' , '$date_installation' , '$fabricant' , '$marque' , '$etage', '$typeEnergie' , '$type_donnee' , '$categorie' , '$protocol_communication', '$prix')";


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

