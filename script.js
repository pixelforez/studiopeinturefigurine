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
document.getElementById("contactForm").addEventListener("input", updateTotal());
