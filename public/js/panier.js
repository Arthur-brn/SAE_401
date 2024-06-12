function fetchPanierItems() {
    const userId = sessionStorage.getItem('userId'); // Récupérer le userID depuis sessionStorage

    // Vérifier si un userID est disponible
    if(userId) {
        // Utiliser le userID dans la requête vers l'API
        fetch(`/api/panier?userId=${userId}`)
            .then(response => {
                if (!response.ok) {
                    if (response.status === 404) {
                        let panierVide = document.querySelector(".panier-vide");
                        let buttonReserver = document.getElementById("btn-reserver");
                        let panierContainer = document.querySelector('.panier-container');
                        panierVide.style.display = 'block';
                        buttonReserver.style.display = 'none';
                        panierContainer.innerHTML = ''; 
                        return;
                    } else {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                }
                return response.json();
            })
            .then(data => {
                if (data && data.length > 0) { // Vérifie si des données sont récupérées
                    console.log(data);
                    const panierContainer = document.querySelector('.panier-container');
                    panierContainer.innerHTML = ''; 

                    data.forEach(item => {
                        const card = document.createElement('div');
                        card.classList.add('panier-item');
                        let content = '';

                        if (item.loanable_type === 'App\\Models\\Book') {
                            content = `
                                <div class="img_book">
                                    <img src="./assets/img/livres/${item.loanable.picture}" alt="Couverture du livre">
                                </div>
                                <div class="desc_book">
                                    <span>${item.loanable.type}</span>
                                    <div>
                                        <p class="book_name">${item.loanable.title}</p>
                                        <p class="author_name">${item.loanable.author.name}</p>
                                    </div>
                                    <p>${item.loanable.summary}</p>
                                </div>
                            `;
                        } else if (item.loanable_type === 'App\\Models\\Film') {
                            content = `
                                <div class="img_book">
                                    <img src="./assets/img/dvd/${item.loanable.picture}" alt="Image du film">
                                </div>
                                <div class="desc_book">
                                    <span>${item.loanable.type}</span>
                                    <div>
                                        <p class="book_name">${item.loanable.title}</p>
                                        <p class="author_name">${item.loanable.director.name}</p>
                                    </div>
                                    <p>${item.loanable.summary}</p>
                                </div>
                            `;
                        }

                        card.innerHTML = content;
                        panierContainer.appendChild(card);
                    });
                } else {
                    console.log('Aucun prêt trouvé pour cet utilisateur.');
                }
            })
            .catch(error => console.error('Erreur lors de la récupération des éléments du panier:', error));
    } else {
        console.log('userID non trouvé.');
    }
}

document.addEventListener('DOMContentLoaded', () => {
    fetchPanierItems();

    const btnReserver = document.getElementById('btn-reserver');
    btnReserver.addEventListener('click', () => {
        fetch('/api/panier/reserver', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                userId: sessionStorage.getItem('userId')
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log(data.message);
            fetchPanierItems();
        })
        .catch(error => console.error('Erreur lors de la réservation des éléments du panier:', error));
    });
});