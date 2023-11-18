var map; // Global variable to store the Leaflet map object

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

    // If the "Analyse des données" form is displayed, initialize the map
    if (formId === 'analyseDonnees' && formContainer.style.display === 'block') {
        initializeMap();
    }
}

function initializeMap() {
    // Check if the map is already initialized
    if (!map) {
        // Create a Leaflet map and set its initial view
        map = L.map('map').setView([48.8566, 2.3522], 12); // Coordinates for Paris

        // Add a tile layer (you can choose a different provider if needed)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Add markers for five buildings in Paris
        var buildings = [
            { name: 'Batiment1', coordinates: [48.8606, 2.3376], sensors: 10, constructionDate: '2020-01-01', buildingType: 'Résidence' },
            { name: 'Batiment 2', coordinates: [48.8647, 2.3490], sensors: 8, constructionDate: '2019-05-15', buildingType: 'Commercial' },
            { name: 'Batiment 3', coordinates: [48.8534, 2.3488], sensors: 12, constructionDate: '2022-03-20', buildingType: 'Industriel' },
            { name: 'Batiment 4', coordinates: [48.8600, 2.3434], sensors: 15, constructionDate: '2018-11-10', buildingType: 'Résidence' },
            { name: 'Batiment 5', coordinates: [48.8572, 2.3517], sensors: 7, constructionDate: '2021-09-05', buildingType: 'Commercial' }
        ];

        buildings.forEach(function(building) {
            var popupContent = `
                <div class="popup-container">
                    <h3>${building.name}</h3>
                    <p><strong>Type de bâtiment:</strong> ${building.buildingType}</p>
                    <p><strong>Date de construction:</strong> ${building.constructionDate}</p>
                    <p><strong>Nombre de capteurs:</strong> ${building.sensors}</p>
                </div>
            `;
            L.marker(building.coordinates).addTo(map).bindPopup(popupContent, { minWidth: 200 });
        });
    }
}
function confirmDeleteBuilding(buildingName) {
var confirmDelete = window.confirm("Voulez-vous vraiment supprimer ce bâtiment ?");
if (confirmDelete) {
    // Si l'utilisateur clique sur OK, appelez la fonction de suppression du bâtiment
    deleteBuilding(buildingName);
}
// Sinon, ne faites rien (annulation de la suppression)
}

function showAllBuildings() {
    // Get the container where the table will be displayed
    var tableContainer = document.getElementById('table-container');

    // If the container does not exist, create it
    if (!tableContainer) {
        tableContainer = document.createElement('div');
        tableContainer.id = 'table-container';
        document.body.appendChild(tableContainer);
    }

    // Generate the table HTML
    var tableHTML = '<h2>Liste de tous les bâtiments</h2><table border="1"><tr><th>Nom</th><th>Coordonnées GPS</th><th>Superficie</th><th>Date de construction</th><th>Type de bâtiment</th><th>Action</th></tr>';

    // Sample data for buildings (replace this with your actual data)
    var buildingsData = [
        { name: 'Batiment1', coordinates: '48.8606, 2.3376', superficie: 200, dateConstruction: '2020-01-01', typeBatiment: 'Résidence' },
        { name: 'Batiment2', coordinates: '48.8647, 2.3490', superficie: 150, dateConstruction: '2019-05-15', typeBatiment: 'Commercial' },
        // Add more buildings as needed
    ];

    // Loop through the buildings data and add rows to the table
    // Loop through the buildings data and add rows to the table
    // Loop through the buildings data and add rows to the table
    buildingsData.forEach(function (building) {
        tableHTML += '<tr>';
        tableHTML += `<td>${building.name}</td>`;
        tableHTML += `<td>${building.coordinates}</td>`;
        tableHTML += `<td>${building.superficie}</td>`;
        tableHTML += `<td>${building.dateConstruction}</td>`;
        tableHTML += `<td>${building.typeBatiment}</td>`;



        // Nouvelle colonne "Action" avec des icônes de suppression et de modification
        tableHTML += '<td class="action-icons">';
        tableHTML += `<span class="delete-icon" onclick="confirmDeleteBuilding('${building.name}')">❌</span>`;
        tableHTML += `<span class="edit-icon" onclick="editBuilding('${building.name}')">&#x270E;</span>`;
        tableHTML += '</td>';


        tableHTML += '</tr>';
    });

    // Close the table HTML
    tableHTML += '</table>';

    // Set the innerHTML of the table container
    tableContainer.innerHTML = tableHTML;

    // Show the table container
    tableContainer.style.display = 'block';
}

function hideTable() {
    var tableContainer = document.getElementById('table-container');
    if (tableContainer) {
        tableContainer.style.display = 'none';
    }
}

function toggleForm(formId) {
    // Appel à la fonction pour cacher le tableau des bâtiments
    hideTable();

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

    // If the "Analyse des données" form is displayed, initialize the map
    if (formId === 'analyseDonnees' && formContainer.style.display === 'block') {
        initializeMap();
    }
}

// Reste du script...

//footer
//ajuster la marge inférieure du corps
document.addEventListener('DOMContentLoaded', function () {
    var body = document.body;
    var footer = document.querySelector('footer');
    body.style.marginBottom = footer.offsetHeight + 'px';
});
