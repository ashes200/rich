//fermeture de l'onglet de connexion en utilisant le reste de l'ecrant
var formulaire_de_connexion = document.getElementById('connexion');
var formulaire_d_inscription = document.getElementById('inscription');
var formulaire_detail = document.getElementById('detail');
window.onclick = function(event) {
    if (event.target == formulaire_de_connexion) {
        formulaire_de_connexion.style.display = "none";
    }
    else if (event.target == formulaire_d_inscription) {
        formulaire_d_inscription.style.display = "none";
    }
    else if (event.target == formulaire_detail) {
        formulaire_detail.style.display = "none";
    }
}