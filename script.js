// Obtenir le bouton
let mybutton = document.getElementById("scrollToTopBtn");

// Afficher le bouton quand l'utilisateur a défilé de 20px vers le bas
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
