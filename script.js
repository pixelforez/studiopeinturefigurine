// Obtenir le bouton
let mybutton = document.getElementById("scrollToTopBtn");

// Afficher le bouton quand l'utilisateur a défilé de 10px vers le bas
window.onscroll = function() {
    if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 10) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
};

// Fonction pour faire défiler la page jusqu'en haut
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
}
//script fleche
        let mybutton = document.getElementById("scrollToTopBtn");

        // Afficher le bouton quand l'utilisateur a défilé de 20px vers le bas
        window.onscroll = function() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        };

        // Fonction pour faire défiler la page jusqu'en haut
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }
    
        // Fonction AJAX pour charger le contenu des pages
        function loadPage(page) {
            // Enlever l'ancien contenu et charger la nouvelle page
            $("#contenu-principal").fadeOut(200, function() {
                // Charger la nouvelle page dans le div #contenu-principal
                $("#contenu-principal").load(page + " #contenu-principal", function() {
                    // Rendre le contenu visible après qu'il soit chargé
                    $("#contenu-principal").fadeIn(200);
                });
            });
        }

        $(document).ready(function() {
            // Charger la page d'accueil par défaut
            loadPage("index.html");
        });

// Tarifs en JavaScript
const tarifs = {
    "infanterie": { "niveau_1": 8.00, "niveau_2": 13.00, "niveau_3": 25.00 },
    "cavalerie_lourde": { "niveau_1": 11.00, "niveau_2": 18.00, "niveau_3": 35.00 },
    "heros_a_pied": { "niveau_1": 12.00, "niveau_2": 20.00, "niveau_3": 40.00 },
    "petit_vehicule_monstre": { "niveau_1": 15.00, "niveau_2": 25.00, "niveau_3": 50.00 },
    "gros_vehicule_monstre": { "niveau_1": 50.00, "niveau_2": 75.00, "niveau_3": 150.00 }
};

// Fonction de mise à jour du total
function updateTotal() {
    const niveau = document.getElementById("niveau").value;
    const infanterie = parseInt(document.getElementById("infanterie").value) || 0;
    const cavalerie = parseInt(document.getElementById("cavalerie").value) || 0;
    const heros = parseInt(document.getElementById("heros").value) || 0;
    const petitMonstre = parseInt(document.getElementById("petitMonstre").value) || 0;
    const grosMonstre = parseInt(document.getElementById("grosMonstre").value) || 0;

    const total = 
        (tarifs.infanterie[niveau] * infanterie) +
        (tarifs.cavalerie_lourde[niveau] * cavalerie) +
        (tarifs.heros_a_pied[niveau] * heros) +
        (tarifs.petit_vehicule_monstre[niveau] * petitMonstre) +
        (tarifs.gros_vehicule_monstre[niveau] * grosMonstre);

    document.getElementById("total").textContent = total.toFixed(2);
}

// Écoute des événements pour mettre à jour dynamiquement
document.getElementById("devisForm").addEventListener("input", updateTotal);
