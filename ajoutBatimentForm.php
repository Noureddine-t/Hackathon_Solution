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