<?php
    include_once  __DIR__."/../Models/Catalogue_model.php";
    include_once __DIR__."/../Models/Produit_model.php";

    include_once __DIR__."/../Models/Error_model.php";

    $produit = Produit::getInstance() ;
    $page = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./Style/style.css">
    <link rel="stylesheet" href="./Style/style_accueil.css">
    <title>Document</title>
</head>
<body>
    <?php
        include __DIR__."/Composants/Header.php";
    ?>
    <section>
      <div class="personne">
          <div class="image"><img src="../Ressources/Image/Rich_Ricasso.png" alt="Rich Ricaseau"></div>
          <div class="text">
              <h3>Rich Ricasso: Maestro Funk du Style Élégant</h3>
              <p>
                  Plongez dans l'univers captivant de Rich Ricasso, un artiste styliste émérite fusionnant avec brio
                  la magie du funk dans ses créations vestimentaires uniques. Ses designs audacieux incarnent
                  l'esprit effervescent des années 90, mariant élégance rétro et modernité excentrique.
                  Rich Ricasso, le virtuose du tissu, sculpte des pièces intemporelles, une symphonie visuelle 
                  évoquant l'énergie contagieuse de l'ère funk. Chaque couture raconte une histoire, chaque couleur 
                  danse au rythme de la créativité débridée de Ricasso. 
                  Plaisir assuré pour les amateurs de style et les nostalgiques des années funky.
              </p>
          </div>
      </div>

      <div class="carousel"></div>
    </section>

    <!-- gestion du mode d'affichage -->
    <?php 
        if($mode == '2'){
            ?>
                <script>
                    document.getElementById('blackMode').checked = true;
                </script>
                <style>
                    body {
                        background: linear-gradient(rgba(0, 0, 0, 0.933) 0%, rgba(1,205,254,1) 50%, rgba(0, 0, 0, 1) 100%);
                    }
                    .accueil {
                        /* From https://css.glass */
                        background: rgb(25, 65, 75);
                        border-radius: 16px;
                        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                        backdrop-filter: blur(6.1px);
                        -webkit-backdrop-filter: blur(6.1px);
                        border: 1px solid rgba(1, 205, 254, 0.23);
                    }
                    nav > ul > li:hover > a {
                        /* From https://css.glass */
                        background: rgb(30, 77, 89);
                        border-radius: 16px;
                        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                        backdrop-filter: blur(6.1px);
                        -webkit-backdrop-filter: blur(6.1px);
                        border: 1px solid rgba(1, 205, 254, 0.23);
                    }
                    nav > ul > li:hover > .sous_catalogue > li {
                        /* From https://css.glass */
                        background: rgb(45, 73, 80);
                    }
                    .cravates:hover, .chemises:hover {
                        /* From https://css.glass */
                        background: rgb(58, 77, 82);
                        border-radius: 16px;
                        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                        backdrop-filter: blur(6.1px);
                        -webkit-backdrop-filter: blur(6.1px);
                        border: 1px solid rgba(252, 254, 255, 0.23);
                    }
                </style>
            <?php
        }else{
            ?>
                <script>
                    document.getElementById('whiteMode').checked = true;
                </script>
                <style>
                    body {
                        background: linear-gradient(rgba(255,255,255,0.9332983193277311) 0%, rgba(1,205,254,1) 50%, rgba(255,255,255,1) 100%);
                    }
                    .accueil {
                        /* From https://css.glass */
                        background: rgba(86, 221, 255);
                        border-radius: 16px;
                        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                        backdrop-filter: blur(6.1px);
                        -webkit-backdrop-filter: blur(6.1px);
                        border: 1px solid rgba(1, 205, 254, 0.23);
                    }
                </style>
            <?php
        }
    ?>

    <!-- gestion du caroussel -->
    <?php
        include __DIR__."/Composants/Footer.php";
        
        $produit->chargerProduitParId(9);
        $url1 = $produit->afficherImage();

        $produit->chargerProduitParId(4);
        $url2 = $produit->afficherImage();

        $produit->chargerProduitParId(6);
        $url3 = $produit->afficherImage();

        $produit->chargerProduitParId(1);
        $url4 = $produit->afficherImage();

        $produit->chargerProduitParId(5);
        $url5 = $produit->afficherImage();

        $carouselData = [
            [
                'id' => '1',
                'id_produit' => '9',
                'src' => $url1,
            ],
            [
                'id' => '2',
                'id_produit' => '4',
                'src' => $url2,
            ],
            [
                'id' => '3',
                'id_produit' => '6',
                'src' => $url3,
            ],
            [
                'id' => '4',
                'id_produit' => '1',
                'src' => $url4,
            ],
            [
                'id' => '5',
                'id_produit' => '5',
                'src' => $url5,
            ],
        ];
      
        echo '<script>';
        echo 'var carouselData = ' . json_encode($carouselData) . ';';
        echo '</script>';
    ?>
    <script>
        'use strict';

        class Carousel {
        constructor(el) {
            this.el = el;

            this.carouselOptions = ['previous', 'add', 'play', 'next'];
            this.carouselData = carouselData
            this.carouselInView = [1, 2, 3, 4, 5];
            this.carouselContainer;
            this.carouselPlayState;
        }

        mounted() {
            this.setupCarousel();
        }

        // Build carousel html
        setupCarousel() {
            const container =  document.createElement('div');
            const controls = document.createElement('div');

            // Add container for carousel items and controls
            this.el.append(container, controls);
            container.className = 'carousel-container';
            controls.className = 'carousel-controls';

            // Take dataset array and append items to container
            this.carouselData.forEach((item, index) => {
            const carouselItem = document.createElement('a'); // Replace img with div

            container.append(carouselItem);
            // Utilisez item.id_produit pour obtenir l'id_produit
            const produitUrl = `/Project_Web_2/Projet_02_web_02/Views/produit.php?id_produit=${item.id_produit}&page=0`;

            // Mettez à jour le lien href avec l'URL du produit
            carouselItem.href = produitUrl;

            // Set the background image of the div
            carouselItem.style.backgroundImage = `url('${item.src}')`; // Replace carouselItem.src = item.src;

            // Add item attributes
            carouselItem.className = `carousel-item carousel-item-${index + 1}`;
            carouselItem.style.backgroundSize = 'cover'; // Set background size as needed
            carouselItem.style.backgroundRepeat = 'no-repeat'; // Set background repeat as needed
            carouselItem.setAttribute('loading', 'lazy');
            // Used to keep track of carousel items, infinite items possible in carousel however min 5 items required
            carouselItem.setAttribute('data-index', `${index + 1}`);
            });

            this.carouselOptions.forEach((option) => {
            const btn = document.createElement('button');
            const axSpan = document.createElement('span');

            // Add accessibilty spans to button
            axSpan.innerText = option;
            axSpan.className = 'ax-hidden';
            btn.append(axSpan);

            // Add button attributes
            btn.className = `carousel-control carousel-control-${option}`;
            btn.setAttribute('data-name', option);

            // Add carousel control options
            controls.append(btn);
            });

            // After rendering carousel to our DOM, setup carousel controls' event listeners
            this.setControls([...controls.children]);

            // Set container property
            this.carouselContainer = container;
        }

        setControls(controls) {
            controls.forEach(control => {
            control.onclick = (event) => {
                event.preventDefault();

                // Manage control actions, update our carousel data first then with a callback update our DOM
                this.controlManager(control.dataset.name);
            };
            });
        }

        controlManager(control) {
            if (control === 'previous') return this.previous();
            if (control === 'next') return this.next();
            if (control === 'add') return this.add();
            if (control === 'play') return this.play();

            return;
        }

        previous() {
            // Update order of items in data array to be shown in carousel
            this.carouselData.unshift(this.carouselData.pop());

            // Push the first item to the end of the array so that the previous item is front and center
            this.carouselInView.push(this.carouselInView.shift());

            // Update the css class for each carousel item in view
            this.carouselInView.forEach((item, index) => {
            this.carouselContainer.children[index].className = `carousel-item carousel-item-${item}`;
            });

            // Using the first 5 items in data array update content of carousel items in view
            this.carouselData.slice(0, 5).forEach((data, index) => {
            document.querySelector(`.carousel-item-${index + 1}`).src = data.src;
            });
        }

        next() {
            // Update order of items in data array to be shown in carousel
            this.carouselData.push(this.carouselData.shift());

            // Take the last item and add it to the beginning of the array so that the next item is front and center
            this.carouselInView.unshift(this.carouselInView.pop());

            // Update the css class for each carousel item in view
            this.carouselInView.forEach((item, index) => {
            this.carouselContainer.children[index].className = `carousel-item carousel-item-${item}`;
            });

            // Using the first 5 items in data array update content of carousel items in view
            this.carouselData.slice(0, 5).forEach((data, index) => {
            document.querySelector(`.carousel-item-${index + 1}`).src = data.src;
            });
        }

        add() {
            const newItem = {
            'id': '',
            'src': '',
            };
            const lastItem = this.carouselData.length;
            const lastIndex = this.carouselData.findIndex(item => item.id == lastItem);
            
            // Assign properties for new carousel item
            Object.assign(newItem, {
            id: `${lastItem + 1}`,
            src: `http://fakeimg.pl/300/?text=${lastItem + 1}`
            });

            // Then add it to the "last" item in our carouselData
            this.carouselData.splice(lastIndex + 1, 0, newItem);

            // Shift carousel to display new item
            this.next();
        }

        play() {
            const playBtn = document.querySelector('.carousel-control-play');
            const startPlaying = () => this.next();

            if (playBtn.classList.contains('playing')) {
            // Remove class to return to play button state/appearance
            playBtn.classList.remove('playing');

            // Remove setInterval
            clearInterval(this.carouselPlayState); 
            this.carouselPlayState = null; 
            } else {
            // Add class to change to pause button state/appearance
            playBtn.classList.add('playing');

            // First run initial next method
            this.next();

            // Use play state prop to store interval ID and run next method on a 1.5 second interval
            this.carouselPlayState = setInterval(startPlaying, 1500);
            };
        }

        }

        // Refers to the carousel root element you want to target, use specific class selectors if using multiple carousels
        const el = document.querySelector('.carousel');
        // Create a new carousel object
        const exampleCarousel = new Carousel(el);
        // Setup carousel and methods
        exampleCarousel.mounted();

    </script>
    <script>
        // La chaîne que vous avez fournie
        const dataString = `
        Array
        (
            [0] => Array
                (
                    [id] => 1
                    [nom] => Cravate grise
                    [categorie] => Cravate
                    [description] => 
        Une cravate grise élégante, subtile et polyvalente, idéale pour compléter un look professionnel ou sophistiqué.
                    [prix] => 250
                    [image] => ../Ressources/Image/cravate1.png
                    [taille] => 40
                )

            [1] => Array
                (
                    [id] => 2
                    [nom] => Cravate galactique
                    [categorie] => Cravate
                    [description] => 
        Cravate galactique aux teintes cosmiques, mêlant nuances de bleu profond, violet et éclats argentés. Un accessoire interstellaire, captivant et futuriste.
                    [prix] => 325
                    [image] => ../Ressources/Image/cravate2.png
                    [taille] => 40
                )

            // ... (les autres éléments)
        )
        `;

        // Fonction pour parser la chaîne en tableau
        function parseArrayString(arrayString) {
        // Supprimez les retours à la ligne et les caractères indésirables
        const cleanString = arrayString
            .replace(/Array\s*\(|\)\s*;/g, '')  // Supprime les mots-clés Array et ;
            .replace(/(\[.*?\])/g, '"$1"')      // Encadre les clés entre guillemets
            .replace(/=>/g, ':');                // Remplace => par :

        // Convertissez la chaîne en objet JSON
        const jsonArrayString = `{${cleanString}}`;
        const jsonArray = JSON.parse(jsonArrayString);

        // Retournez le tableau
        return Object.values(jsonArray);
        }

        // Utilisez la fonction pour obtenir le tableau
        const parsedArray = parseArrayString(dataString);

        // Affichez le résultat
        console.log(parsedArray);

    </script>
</body>
</html>