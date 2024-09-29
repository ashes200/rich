<?php
    include_once  __DIR__."/../Models/Catalogue_Model.php";
    include_once  __DIR__."/../Models/Produit_Model.php";

    $catalogue = Catalogue::getInstance() ;
    $produit = Produit::getInstance();
    $page = 2;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./Style/style.css">
    <link rel="stylesheet" href="./Style/style_catalogue_chemise.css">
    <link rel="stylesheet" href="./Style/style_souscatalogue.css">
    <title>Document</title>
</head>
<body>
    <?php
        include   __DIR__."/Composants/Header.php"
    ?>
    <section>
        <h3>Catalogue chemise</h3>
        <div class="carousel"></div>
        
        <?php
            include   __DIR__."/Composants/Recommendation_composant.php";
        ?>
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
                        background: linear-gradient(rgba(0, 0, 0, 0.933) 0%, rgba(255,251,150,1) 50%, rgba(0, 0, 0, 1) 100%);
                    }
                    .catalogue {
                        /* From https://css.glass */
                        background: rgba(78, 75, 0, 0.27);
                        border-radius: 16px;
                        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                        backdrop-filter: blur(6.1px);
                        -webkit-backdrop-filter: blur(6.1px);
                        border: 1px solid rgba(1, 205, 254, 0.23);
                    }
                    .chemises {
                        /* From https://css.glass */
                        background: rgba(251, 248, 168, 0.27);
                        border-radius: 16px;
                        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                        backdrop-filter: blur(6.1px);
                        -webkit-backdrop-filter: blur(6.1px);
                        border: 1px solid rgba(252, 254, 255, 0.23);
                        color: black;
                    }
                    nav > ul > li:hover > a {
                        /* From https://css.glass */
                        background: rgba(73, 71, 1, 0.27);
                        border-radius: 16px;
                        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                        backdrop-filter: blur(6.1px);
                        -webkit-backdrop-filter: blur(6.1px);
                        border: 1px solid rgba(1, 205, 254, 0.23);
                        color: black;
                    }
                    nav > ul > li:hover > .sous_catalogue > li {
                        /* From https://css.glass */
                        background: rgba(88, 86, 36, 0.27);
                    }
                    footer, select  {
                        /* From https://css.glass */
                        background: rgba(82, 80, 48, 0.27);
                    }
                    .cravates:hover, .chemises:hover {
                        /* From https://css.glass */
                        background: rgba(81, 80, 55, 0.27);
                        border-radius: 16px;
                        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                        backdrop-filter: blur(6.1px);
                        -webkit-backdrop-filter: blur(6.1px);
                        border: 1px solid rgba(252, 254, 255, 0.23);
                        color: black;
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
                        background: linear-gradient(rgba(255,255,255,0.9332983193277311) 0%, rgba(255,251,150,1) 50%, rgba(255,255,255,1) 100%);
                    }
                    .catalogue {
                        /* From https://css.glass */
                        background: rgba(255, 247, 4, 0.27);
                        border-radius: 16px;
                        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                        backdrop-filter: blur(6.1px);
                        -webkit-backdrop-filter: blur(6.1px);
                        border: 1px solid rgba(1, 205, 254, 0.23);
                        
                    }
                    .chemises {
                        /* From https://css.glass */
                        background: rgba(85, 84, 58, 0.27);
                        border-radius: 16px;
                        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                        backdrop-filter: blur(6.1px);
                        -webkit-backdrop-filter: blur(6.1px);
                        border: 1px solid rgba(252, 254, 255, 0.23);
                        color: black;
                    }
                </style>
            <?php
        }
    ?>

    <!-- gestion du caroussel -->
    
    <?php
        include   __DIR__."/Composants/Footer.php";

        $catalogue->chargerProduits("Chemise");
        //print_r($catalogue);
        $carouselData = [] ;
        $i = 1;
        foreach ($catalogue->getProduits() as $key) {
            $tab = ['id'=> $i, 'id_produit' => $key['id'], 'src' => $key['image'], 'nom' => $key['nom'], 'prix'=> $key['prix'], 'description'=> $key['description'] ] ;
            array_push($carouselData, $tab);
            $i++;
        }
      
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
            this.carouselData = carouselData;
            this.carouselInView = [1, 2, 3, 4, 5];
            this.carouselContainer;
            this.carouselPlayState;
        }

        mounted() {
            this.setupCarousel();
        }

        // Build carousel html
        setupCarousel() {
            const container = document.createElement('div');
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
            const produitUrl = `/Project_Web_2/Projet_02_web_02/Views/produit.php?id_produit=${item.id_produit}&page=2`;

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

            // Add two <p> elements and one <h3> element to the div
            const p1 = document.createElement('p');
            const prix = `${item.prix}$`;
            p1.textContent = prix;
            p1.className = 'prix';
            
            const p2 = document.createElement('p');
            const description = `${item.description}`;
            let sousChaine = description.substring(0, 40) + " ...";
            p2.textContent = sousChaine;
            p2.className = 'description';

            const h3 = document.createElement('h3');
            const nom= `${item.nom}`;
            h3.textContent = nom;
            h3.className = 'titre';

            carouselItem.appendChild(p1);
            carouselItem.appendChild(h3);
            carouselItem.appendChild(p2);
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
</body>
</html>