/****************************************************
FLIP CARDS
****************************************************/

document.addEventListener('DOMContentLoaded', function () {
  const cardContainers = document.querySelectorAll('.card-container');
  let isDragging = false;
  let draggedItem = null;
  let offsetX = 0;
  let offsetY = 0;
  let zIndexCounter = 1; // Compteur global pour z-index, commence à 1
  const delay = 300; // Délai en millisecondes pour la fermeture des cartes

  // Initialisation du z-index de toutes les cartes pour qu'elles démarrent toutes avec une valeur valide
  cardContainers.forEach((cardContainer, index) => {
    cardContainer.style.zIndex = index + 1; // Chaque carte démarre avec un z-index unique
  });

  // Fonction pour sauvegarder la position dans le localStorage
  function savePosition(cardContainer) {
    const cardId = cardContainer.getAttribute('data-id');
    const position = {
      left: cardContainer.style.left,
      top: cardContainer.style.top,
      zIndex: cardContainer.style.zIndex
    };
    localStorage.setItem(cardId, JSON.stringify(position));
  }

  // Fonction pour restaurer la position des cartes depuis le localStorage
  function restorePosition(cardContainer) {
    const cardId = cardContainer.getAttribute('data-id');
    const savedPosition = localStorage.getItem(cardId);
    if (savedPosition) {
      const position = JSON.parse(savedPosition);
      cardContainer.style.left = position.left;
      cardContainer.style.top = position.top;
      cardContainer.style.zIndex = position.zIndex; // Restaurer le z-index
    }
  }

  // Fonction pour fermer toutes les cartes (enlever la classe 'flipped' avec délai)
  function closeAllCards() {
    cardContainers.forEach(card => {
      if (card.classList.contains('flipped')) {
        setTimeout(() => {
          card.classList.remove('flipped');
        }, delay); // Appliquer un délai avant de fermer la carte
      }
    });
  }

  // Appliquer la position stockée pour chaque carte au chargement
  cardContainers.forEach(cardContainer => {
    restorePosition(cardContainer);

    // Gestion du flip des cartes
    cardContainer.addEventListener('click', function (e) {
      if (e.target.tagName === 'BUTTON') {
        const action = e.target.getAttribute('data-action');
        if (action === 'flip-to-back') {
          closeAllCards(); // Fermer toutes les autres cartes avec délai
          setTimeout(() => {
            cardContainer.classList.add('flipped'); // Retourner la carte actuelle après la fermeture des autres
          }, delay);
        } else if (action === 'flip-to-front') {
          cardContainer.classList.remove('flipped'); // Fermer la carte actuelle
        }
      }
    });

    // Mouse down - démarrer le drag
    cardContainer.addEventListener('mousedown', function (e) {
      isDragging = true;
      draggedItem = cardContainer;
      offsetX = e.clientX - cardContainer.offsetLeft;
      offsetY = e.clientY - cardContainer.offsetTop;

      // Placer la carte au premier plan en augmentant le z-index global
      zIndexCounter++;
      draggedItem.style.zIndex = zIndexCounter;

      draggedItem.style.cursor = 'grabbing';
      console.log(`Card ${draggedItem.getAttribute('data-id')} is now on top with zIndex ${zIndexCounter}`);
    });

    // Mouse up - arrêter le drag
    document.addEventListener('mouseup', function () {
      if (isDragging && draggedItem) {
        savePosition(draggedItem);  // Sauvegarder la position et le z-index
        draggedItem.style.cursor = 'grab';
        draggedItem = null;
      }
      isDragging = false;
    });

    // Mouse move - déplacer l'élément
    document.addEventListener('mousemove', function (e) {
      if (isDragging && draggedItem) {
        const x = e.clientX - offsetX;
        const y = e.clientY - offsetY;
        draggedItem.style.left = `${x}px`;
        draggedItem.style.top = `${y}px`;
      }
    });
  });
});



/* Filtre */



document.addEventListener('DOMContentLoaded', function () {
  let selectedCategories = []; // Stocker les catégories sélectionnées

  // Gestion des filtres ouverts/fermés
  document.querySelectorAll('.filter-trigger').forEach(trigger => {
      trigger.addEventListener('click', function () {
          const isActive = this.classList.contains('is-active');

          // Fermer toutes les autres listes
          document.querySelectorAll('.filter-trigger').forEach(otherTrigger => {
              otherTrigger.classList.remove('is-active');
              const filterList = otherTrigger.nextElementSibling;
              if (filterList && filterList.classList.contains('filter-list')) {
                  filterList.style.display = 'none'; // Fermer la liste si elle existe
              }
          });

          // Ouvrir/fermer la liste cliquée
          const currentFilterList = this.nextElementSibling;
          if (!isActive && currentFilterList && currentFilterList.classList.contains('filter-list')) {
              this.classList.add('is-active');
              currentFilterList.style.display = 'flex'; // Ouvrir la liste cliquée
          }
      });
  });

  // Fonction pour gérer l'état des catégories sélectionnées
  function toggleCategory(category) {
      // Si "all" est dans les catégories sélectionnées, on le retire
      if (selectedCategories.includes('all')) {
          selectedCategories = [];
      }

      const index = selectedCategories.indexOf(category);

      if (index > -1) {
          // Si la catégorie est déjà sélectionnée, on la retire
          selectedCategories.splice(index, 1);
      } else {
          // Sinon, on l'ajoute
          selectedCategories.push(category);
      }
  }

  // Fonction pour afficher les cartes correspondant aux catégories sélectionnées
  function filterCards() {
      console.log("Selected categories:", selectedCategories); // Debugging

      document.querySelectorAll('.card-container').forEach(card => {
          const categoriesAttr = card.getAttribute('data-categories');
          if (categoriesAttr) {
              const categories = categoriesAttr.split(',');

              // Si "all" est sélectionné ou aucune catégorie n'est activée, afficher toutes les cartes
              if (selectedCategories.includes('all') || selectedCategories.length === 0) {
                  card.style.display = 'block';
                  return;
              }

              // Vérifier si la carte correspond à au moins une des catégories sélectionnées
              const matchesCategory = selectedCategories.some(category => categories.includes(category));

              if (matchesCategory) {
                  card.style.display = 'block'; // Afficher la carte si elle correspond à au moins une catégorie
              } else {
                  card.style.display = 'none'; // Cacher la carte sinon
              }
          } else {
              card.style.display = 'none'; // Cacher la carte si elle n'a pas de catégories
          }
      });
  }

  // Gestion du clic sur les boutons de filtre dans les listes
  document.querySelectorAll('.filter-list button').forEach(button => {
      button.addEventListener('click', function () {
          this.classList.toggle('active'); // Basculer l'état "actif" du bouton
          const category = this.getAttribute('data-filter');
          toggleCategory(category); // Mettre à jour l'état des catégories
          filterCards(); // Appliquer les filtres
      });
  });

  // Gestion du bouton "Tous"
  document.querySelector('.filter-all button').addEventListener('click', function () {
      // Réinitialiser tous les filtres
      selectedCategories = ['all'];
      document.querySelectorAll('.filter-list button').forEach(button => button.classList.remove('active'));

      // Fermer toutes les listes de filtres
      document.querySelectorAll('.filter-list').forEach(filterList => {
          filterList.style.display = 'none';
      });

      // Retirer la classe is-active de tous les déclencheurs
      document.querySelectorAll('.filter-trigger').forEach(trigger => {
          trigger.classList.remove('is-active');
      });

      filterCards(); // Afficher toutes les cartes
  });

  // Initialiser en affichant toutes les cartes
  filterCards();
});


  
/* Open iframes */

document.addEventListener('DOMContentLoaded', function () {
  // Écouter les événements de clic sur les boutons "More info"
  document.querySelectorAll('.open-details').forEach(button => {
    button.addEventListener('click', function () {
      const targetId = this.getAttribute('data-target');
      const targetDiv = document.getElementById(targetId);

      // Ouvrir la div correspondante
      if (targetDiv) {
        targetDiv.classList.add('active');
      }
    });
  });

  // Écouter les événements de clic sur les boutons "Close"
  document.querySelectorAll('.close-details').forEach(button => {
    button.addEventListener('click', function () {
      const targetId = this.getAttribute('data-target');
      const targetDiv = document.getElementById(targetId);

      // Fermer la div correspondante
      if (targetDiv) {
        targetDiv.classList.remove('active');
      }
    });
  });
});


/****************************************************
DETECT iOS BROWSER
****************************************************/

/* var isSafari = !!navigator.userAgent.match(/Version\/[\d\.]+.*Safari/);
var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;

if (isSafari && iOS) {
    $('').toggleClass('');
} else if(isSafari) {
   $('').toggleClass('');
} */

/****************************************************
FUNCTIONS
****************************************************/

jQuery(document).ready(function($) {

/* Custom Cursor  */

const verticalLine = document.getElementById('verticalLine');
const horizontalLine = document.getElementById('horizontalLine');
const verticalDiv = document.getElementById('verticalDiv');
const horizontalDiv = document.getElementById('horizontalDiv');

document.addEventListener('mousemove', function(event) {
  const x = event.clientX;
  const y = event.clientY;

  verticalLine.style.left = x + 'px';
  verticalDiv.style.left = (x +10) + 'px';
  verticalDiv.textContent = `[X: ${x}]`;

  horizontalLine.style.top = y + 'px';
  horizontalDiv.style.top = (y + 10) + 'px';
  horizontalDiv.textContent = `[Y: ${y}]`;
});
   

}); /* end of as page load scripts */
