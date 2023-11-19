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

        <label for="batiment">batiment:</label>
        <input type="text" id="batiment" name="batiment" required>

        <label for="etage">Etage:</label>
        <input type="text" id="etage" name="etage" required>

        <button type="submit" name="AjouterCapteur">Ajouter Capteur</button>
    </form>