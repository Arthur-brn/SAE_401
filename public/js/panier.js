// Fonction pour récupérer les éléments du panier depuis le backend
function fetchPanierItems() {
    // Remplacer l'URL par l'endpoint réel pour récupérer les éléments du panier
    fetch('/api/panier')
        .then(response => response.json())
        .then(data => {
            // Affichage des éléments du panier sur l'interface utilisateur
            const panierContainer = document.querySelector('.panier-container');
            panierContainer.innerHTML = ''; // Effacer le contenu précédent

            data.forEach(item => {
                const card = document.createElement('div');
                card.classList.add('panier-item');

                // Construction de la carte de l'article
                const content = `
                    <div class="img_book">
                        <img src="${item.picture}" alt="Couverture du livre">
                    </div>
                    <div class="desc_book">
                        <span>${item.type}</span>
                        <div>
                            <p class="book_name">${item.title}</p>
                            <p class="author_name">${item.author}</p>
                        </div>
                        <p>${item.summary}</p>
                    </div>
                `;

                card.innerHTML = content;
                panierContainer.appendChild(card);
            });
        })
        .catch(error => console.error('Erreur lors de la récupération des éléments du panier:', error));
}

// Événement au chargement de la page
document.addEventListener('DOMContentLoaded', () => {
    fetchPanierItems(); // Récupérer et afficher les éléments du panier au chargement de la page

    // Gestion de l'événement de clic sur le bouton de réservation
    const btnReserver = document.getElementById('btn-reserver');
    btnReserver.addEventListener('click', () => {
        // Logique pour effectuer la réservation (à implémenter)
        console.log('Réservation en cours...');
    });
});
