// Exemple de données JSON pour les projets
var projets = [
    {
        "id": 1,
        "nom": "Toilettes sèches à Dakar",
        "type": "Toilettes sèches",
        "region": "Dakar",
        "latitude": 14.6928,
        "longitude": -17.4467,
        "description": "Un projet de toilettes sèches pour la communauté."
    },
    {
        "id": 2,
        "nom": "Compostage à Saint-Louis",
        "type": "Compostage",
        "region": "Saint-Louis",
        "latitude": 16.0014,
        "longitude": -15.0054,
        "description": "Compostage des déchets organiques pour l'agriculture."
    },
    {
        "id": 3,
        "nom": "Fournisseur de litière à Thiès",
        "type": "Fournisseur de litière",
        "region": "Thiès",
        "latitude": 14.7853,
        "longitude": -16.9505,
        "description": "Fournisseur local de litière pour toilettes sèches."
    }
];

// Coordonnées des régions
var regionsCoordonnees = {
    "Dakar": [14.6928, -17.4467], // Exemple de coordonnées pour Dakar
    "Saint-Louis": [16.0014, -15.0054], // Exemple pour Saint-Louis
    "Thiès": [14.7853, -16.9505] // Exemple pour Thiès
};

fetch('http://localhost:5000/api/lieux')
  .then(response => response.json())
  .then(data => {
    data.forEach(lieu => {
      const marker = L.marker([lieu.latitude, lieu.longitude]).addTo(map)
        .bindPopup(`<b>${lieu.nom}</b><br>Projet: ${lieu.projet_nom}`);
    });
  })
  .catch(error => console.error('Erreur:', error));


  document.getElementById('ajoutProjetForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const projet = {
      nom: document.getElementById('nomProjet').value,
      description: document.getElementById('descProjet').value,
      categorie: document.getElementById('categorieProjet').value,
      date_realisation: document.getElementById('dateProjet').value
    };
  
    fetch('http://localhost:5000/api/projets', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(projet)
    })
    .then(response => response.json())
    .then(data => alert('Projet ajouté avec succès !'))
    .catch(error => console.error('Erreur:', error));
  });
  
var map = L.map('map').setView([14.6928, -17.4467], 7); // Centré sur le Sénégal

// Ajouter une couche de fond
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// Ajouter les marqueurs initialement
addMarkers(projets);

// Fonction pour ajouter les marqueurs à la carte
function addMarkers(projets) {
    projets.forEach(function(projet) {
        var marker = L.marker([projet.latitude, projet.longitude]).addTo(map);
        marker.bindPopup(`
            <b>${projet.nom}</b><br>
            <i>${projet.type}</i><br>
            Région: ${projet.region}<br>
            ${projet.description}
        `);
    });
}

// Fonction pour filtrer les projets et déplacer la carte
function filterData() {
    var region = document.getElementById('region').value;
    var type = document.getElementById('type').value;

    // Effacer les marqueurs actuels
    map.eachLayer(function(layer) {
        if (layer instanceof L.Marker) {
            map.removeLayer(layer);
        }
    });

    // Filtrer les projets en fonction des critères
    var projetsFiltres = projets.filter(function(projet) {
        return (!region || projet.region === region) && (!type || projet.type === type);
    });

    // Ajouter les marqueurs filtrés
    addMarkers(projetsFiltres);

    // Si une région est sélectionnée, déplacer la carte vers la région
    if (region && regionsCoordonnees[region]) {
        map.setView(regionsCoordonnees[region], 10); // 10 est le niveau de zoom
    }
}



