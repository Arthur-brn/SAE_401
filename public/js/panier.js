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
                let buttonReserver = document.getElementById("btn-reserver");
                if (data && data.length > 0) { // Vérifie si des données sont récupérées
                    console.log(data.length);
                    const panierContainer = document.querySelector('.panier-container');
                    panierContainer.innerHTML = ''; 

                    data.forEach(item => {
                        const card = document.createElement('div');
                        card.classList.add('panier-item');
                        let content = '';
                        let detailUrl = '';

                        if (item.loanable_type === 'App\\Models\\Book') {
                            detailUrl = `/litterature-${item.loanable.id}`;
                            content = `
                                    <div>
                                        <div class="img_book">
                                            <img src="./assets/img/livres/${item.loanable.picture}" alt="Couverture du livre">
                                        </div>
                                        <div class="desc_book">
                                            <span>-${item.loanable.type}</span>
                                            <div>
                                                <p class="book_name">${item.loanable.title}</p>
                                                <p class="author_name">${item.loanable.author.name}</p>
                                            </div>
                                            <p>${item.loanable.summary}</p>
                                        </div>
                                    </div>
                                    <a href="${detailUrl}"> <!--redirection vers détail document-->
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0,0,256,256" style="fill:#000000;">
                                                <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                    <g transform="scale(5.12,5.12)">
                                                        <path d="M25,2c-12.6907,0 -23,10.3093 -23,23c0,12.69071 10.3093,23 23,23c12.69071,0 23,-10.30929 23,-23c0,-12.6907 -10.30929,-23 -23,-23zM25,4c11.60982,0 21,9.39018 21,21c0,11.60982 -9.39018,21 -21,21c-11.60982,0 -21,-9.39018 -21,-21c0,-11.60982 9.39018,-21 21,-21zM25,11c-1.65685,0 -3,1.34315 -3,3c0,1.65685 1.34315,3 3,3c1.65685,0 3,-1.34315 3,-3c0,-1.65685 -1.34315,-3 -3,-3zM21,21v2h1h1v13h-1h-1v2h1h1h4h1h1v-2h-1h-1v-15h-1h-4z"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                            Plus d'informations
                                        </button>
                                    </a>
                                    <div>
                                        <div class="circleYes"></div>
                                        <p>Exemplaire disponible dans le réseau</p>
                                    </div>
                                    <hr>                     
                            `;
                        } else if (item.loanable_type === 'App\\Models\\Film') {
                            detailUrl = `/cinema-${item.loanable.id}`;
                            content = `
                                <div>
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
                                </div>
                                <a href="${detailUrl}"> <!--redirection vers détail document-->
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0,0,256,256" style="fill:#000000;">
                                            <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                <g transform="scale(5.12,5.12)">
                                                    <path d="M25,2c-12.6907,0 -23,10.3093 -23,23c0,12.69071 10.3093,23 23,23c12.69071,0 23,-10.30929 23,-23c0,-12.6907 -10.30929,-23 -23,-23zM25,4c11.60982,0 21,9.39018 21,21c0,11.60982 -9.39018,21 -21,21c-11.60982,0 -21,-9.39018 -21,-21c0,-11.60982 9.39018,-21 21,-21zM25,11c-1.65685,0 -3,1.34315 -3,3c0,1.65685 1.34315,3 3,3c1.65685,0 3,-1.34315 3,-3c0,-1.65685 -1.34315,-3 -3,-3zM21,21v2h1h1v13h-1h-1v2h1h1h4h1h1v-2h-1h-1v-15h-1h-4z"></path>
                                                </g>
                                            </g>
                                        </svg>
                                        Plus d'informations
                                    </button>
                                </a>
                                <div>
                                    <div class="circleYes"></div>
                                    <p>Exemplaire disponible dans le réseau</p>
                                </div> 
                                <hr>
                            `;
                        }

                        card.innerHTML = content;
                        panierContainer.appendChild(card);
                    });
                } else {
                    console.log('Aucun prêt trouvé pour cet utilisateur.');
                    buttonReserver.style.display = 'none';
                }
            })
            .catch(error => console.error('Erreur lors de la récupération des éléments du panier:', error));
    } else {
        let buttonReserver = document.getElementById("btn-reserver");
        buttonReserver.style.display = 'none';
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