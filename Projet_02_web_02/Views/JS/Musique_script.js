// Récupérez l'élément audio
var audio = document.getElementById("myAudio");

// Vérifiez si la lecture audio est en cours dans le localStorage
var isAudioPlaying = localStorage.getItem("isAudioPlaying");

// Si l'audio était en cours de lecture, restaurez la lecture
if (isAudioPlaying === "true") {
audio.play();
}

// Gérez le bouton de lecture/pause
document.getElementById("toggleAudioButton").addEventListener("click", function() {
if (audio.paused) {
    audio.play();
    localStorage.setItem("isAudioPlaying", "true");
} else {
    audio.pause();
    localStorage.setItem("isAudioPlaying", "false");
}
});

function choixMusique(id) {
    let selectElement = document.querySelector('#musiq');
    let output = selectElement.options[selectElement.selectedIndex].value;
    let nb = parseInt(output);
document.getElementById("ost").pause();
    switch (nb) {
        case 1:
            document.getElementById("srcOst").setAttribute('src','../Ressources/Musique/The Night Begins to Shine.mp3');
            document.getElementById("ost").load();
            document.getElementById("ost").play();
            break;
        case 2:
            document.getElementById("srcOst").setAttribute('src','../Ressources/Musique/Smooth Criminal.mp3');
            document.getElementById("ost").load();
            document.getElementById("ost").play();
            break;
        default:
            document.getElementById("srcOst").setAttribute('src',"../Ressources/Musique/The Night Begins to Shine.mp3");
            document.getElementById(id).load();
            document.getElementById(id).play();
            break;
    }
}