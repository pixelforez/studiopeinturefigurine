 // Fonction AJAX pour charger le contenu des pages
        function loadPage(page) {
            // Enlever l'ancien contenu et charger la nouvelle page
            $("#contenu-principal").fadeOut(20, function() {
                // Charger la nouvelle page dans le div #contenu-principal
                $("#contenu-principal").load(page + " #contenu-principal", function() {
                    // Rendre le contenu visible après qu'il soit chargé
                    $("#contenu-principal").fadeIn(20);
                });
            });
        }

 // Obtenir le bouton
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
        return total;
    }

    // Gestion de l'envoi du formulaire
    document.getElementById("contactForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Empêche le comportement par défaut

        const nom = document.getElementById("nom").value;
        const prenom = document.getElementById("prenom").value;
        const email = document.getElementById("email").value;
        const telephone = document.getElementById("telephone").value;
        const total = updateTotal(); // Récupère le total calculé

        // Construire l'URL mailto
        const subject = `Demande de devis de ${prenom} ${nom}`;
        const body = `Bonjour, Voici ma demande de devis : - Nom : ${nom} - Prénom : ${prenom} - Email : ${email} - Téléphone : ${telephone} Total estimé : ${total.toFixed(2)} €. Je reste à votre disposition. Cordialement.`;
        const mailtoURL = `mailto:studiopeinturefigurine@gmail.com?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;

        window.location.href = mailtoURL; // Redirection
    });

    // Événements d'entrée pour la mise à jour du total
    document.querySelectorAll("#contactForm input, #contactForm select").forEach(element => {
        element.addEventListener("input", updateTotal);
    });
