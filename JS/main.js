// Mise à jour dynamique des chiffres d'impact
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("toilettes-count").textContent = "50+";
    document.getElementById("composteurs-count").textContent = "500+";
    document.getElementById("foyers-count").textContent = "1000+";
});

// Sélection aléatoire d'un produit en vedette
const produits = [
    {
        image: "../images/toilette_modele1.jpg",
        description: "Une toilette sèche écologique, sans eau, idéale pour les zones rurales."
    },
    {
        image: "../images/toilette_modele2.jpg",
        description: "Un modèle biodégradable transformant les déchets en compost naturel."
    },
    {
        image: "../images/toilette_modele3.jpg",
        description: "Un sanitaire mobile, pratique pour les événements et les chantiers."
    }
];

const produitAleatoire = produits[Math.floor(Math.random() * produits.length)];
document.getElementById("produit-image").src = produitAleatoire.image;
document.getElementById("produit-description").textContent = produitAleatoire.description;

