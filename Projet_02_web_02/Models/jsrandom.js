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

let array = [
    {id : 1, nom: 'Cravate grise', description : "Une cravate grise élégante, subtile et polyvalente, idéale pour compléter un look professionnel ou sophistiqué.",
        prix : 250, image : '../Ressources/Image/cravate1.png', taille : 40},
    {id : 2, nom: 'Cravate galactique', description : "Cravate galactique aux teintes cosmiques, mêlant nuances de bleu profond, violet et éclats argentés. Un accessoire interstellaire, captivant et futuriste.",
    prix : 325, image : '../Ressources/Image/cravate2.png', taille : 40}
]

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
