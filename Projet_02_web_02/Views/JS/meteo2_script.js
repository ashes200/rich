class menu2 {
    constructor() {}
  
    obtenirMeteo(id) {
      // let lat = 45.508888;
      // let lon = -73.561668;
      // let appid = b47bb63f1eeae00f939d01ecc8cbadbf;
      // api.openweathermap.org/data/2.5/forecast/daily?lat={45.508888}&lon={-73.561668}&cnt={10}&appid={b47bb63f1eeae00f939d01ecc8cbadbf}
      // api.openweathermap.org/data/2.5/forecast/daily?lat=45.508888&lon=-73.561668&cnt=10&appid=b47bb63f1eeae00f939d01ecc8cbadbf&units=metric&mode=json
      let url = "https://api.openweathermap.org/data/2.5/weather?lat=45.508888&lon=-73.561668&appid=b47bb63f1eeae00f939d01ecc8cbadbf&units=metric&mode=json";
      fetch(url)
        .then((reponse) => reponse.json())
        .then((data) => {
          this.afficheMeteo(data, id)
        })
        .catch((error) => {
          //alert("Error : " + error);
        });
    }
  
    afficheMeteo(data, id) {
      let parser = new DOMParser();
      let jsonDoc = JSON.stringify(data);
  
      // crée les éléments HTML où afficher la météo
      let meteo = document.getElementById(id);
  
      let div = document.createElement("div");
      let div2 = document.createElement("div");
  
      let villeDate = document.createElement("p"); // affiche : Montreal aaaa-mm-dd
      villeDate.className = "menuItem";
      let temperature = document.createElement("p"); // affiche : température en degré Celsius
      temperature.className = "menuItem";
  
      let img = document.createElement("img"); // affiche l'image de l'icône représentant la situation météo
  
      // récupère le nom de la ville : Montreal
      let city = data.name;
  
      // récupère la température
      let temp = data.main.temp;
  
      // récupère l'image
      let imageId = data.weather[0].icon;
  
      let imageUrl = "https://openweathermap.org/img/wn/" + imageId + "@2x.png";
      //let imageUrl = "https://openweathermap.org/img/w/" + imageId + ".png";
  
      function fc() {
        // initie les différents éléments HTML
        // ajoute l'élément HTML à la page HTML
        villeDate.innerHTML = city; // affiche la ville et la date : Montreal aaaa-mm-dd
        villeDate.style.fontWeight = 'bold';
        div.appendChild(villeDate); // ajoute l'élément HTML à la page HTML
        temperature.innerHTML = Math.round(temp) + "\u00b0C"; // affiche la température en degré Celsius
        temperature.style.fontWeight = 'bold';
        div.appendChild(temperature); // ajoute l'élément HTML à la page HTML
        meteo.appendChild(div);
        img.src = imageUrl; // affiche l'image de l'icône
        div2.appendChild(img); // ajoute l'élément HTML à la page HTML
        meteo.appendChild(div2);
      }
      fc();
    }
  }
  
  let leMenu2 = new menu2();
  leMenu2.obtenirMeteo("meteo");
  leMenu2.obtenirMeteo("meteo2");