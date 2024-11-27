// Fonction pour charger le contenu via AJAX
function loadPage(page) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', page, true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            document.getElementById('main-content').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}
