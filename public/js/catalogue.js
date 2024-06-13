// Déclaration des variables globales
let allArticles = [];
const articlesPerPage = 5;
let currentPage = 1;

// Filtres
const filters = document.querySelectorAll(".filtre");
const closeButtons = document.querySelectorAll(".type img");

filters.forEach((filter) => {
    filter.addEventListener("click", function () {
        this.classList.toggle("active");
        const img = this.querySelector("img");
        img.classList.toggle("rotate");

        filters.forEach((f) => {
            if (f !== this) {
                f.classList.remove("active");
                const imgOther = f.querySelector("img");
                imgOther.classList.remove("rotate");
                f.nextElementSibling.style.display = "none";
            }
        });

        const choix = this.nextElementSibling;
        choix.style.display =
            choix.style.display === "flex" ? "none" : "flex";
    });
});

// Fermer type
closeButtons.forEach((closeButton) => {
    closeButton.addEventListener("click", function () {
        this.parentElement.style.display = "none";
    });
});

// Afficher les articles selon la page sélectionnée
function showPage(pageNum, articles) {
    const start = (pageNum - 1) * articlesPerPage;
    const end = pageNum * articlesPerPage;
    const paginatedArticles = articles.slice(start, end);

    displayArticles(paginatedArticles);
    updatePagination(pageNum, articles.length);
}

// Mise à jour de la pagination
function updatePagination(activePage, totalArticles) {
    const totalPages = Math.ceil(totalArticles / articlesPerPage);
    const paginationContainer = document.querySelector(".droite");
    paginationContainer.innerHTML = '';

    const prevButton = document.createElement('img');
    prevButton.src = './assets/img/fleche_back_catalogue.svg';
    prevButton.alt = 'Previous';
    prevButton.classList.add('pagination-nav');
    prevButton.setAttribute('data-page', 'prev');
    paginationContainer.appendChild(prevButton);

    for (let i = 1; i <= totalPages; i++) {
        const pageNum = document.createElement('p');
        pageNum.setAttribute('data-page', i);
        pageNum.classList.add(i === activePage ? 'active' : 'passive');
        pageNum.textContent = i;
        paginationContainer.appendChild(pageNum);
    }

    const nextButton = document.createElement('img');
    nextButton.src = './assets/img/fleche_forward_catalogue.svg';
    nextButton.alt = 'Next';
    nextButton.classList.add('pagination-nav');
    nextButton.setAttribute('data-page', 'next');
    paginationContainer.appendChild(nextButton);

    paginationContainer.querySelectorAll('p[data-page]').forEach((page) => {
        page.addEventListener('click', () => {
            currentPage = parseInt(page.getAttribute('data-page'), 10);
            applyFiltersAndDisplay();
        });
    });

    document.querySelectorAll('.pagination-nav').forEach((button) => {
        button.addEventListener('click', () => {
            if (button.getAttribute('data-page') === 'prev' && currentPage > 1) {
                currentPage--;
            } else if (button.getAttribute('data-page') === 'next' && currentPage < totalPages) {
                currentPage++;
            }
            applyFiltersAndDisplay();
        });
    });

    const resultsRangeStart = (activePage - 1) * articlesPerPage + 1;
    const resultsRangeEnd = Math.min(activePage * articlesPerPage, totalArticles);
    document.querySelector(".gauche h6").textContent = `Résultats ${resultsRangeStart} - ${resultsRangeEnd} / `;
    document.querySelector(".totale_resultat").textContent = totalArticles;
}

// Fonction pour récupérer tous les articles
function fetchArticles() {
    fetch('/api/articles')
        .then(response => response.json())
        .then(data => {
            allArticles = data;
            applyFiltersAndDisplay();
            updateSearchSummary();
        })
        .catch(error => console.error('Erreur lors de la récupération des articles:', error));
}

// Fonction pour afficher les articles
function displayArticles(articles) {
    const resultsContainer = document.querySelector('.all_articles');

    // Efface les articles précédents
    resultsContainer.innerHTML = '';
    
    // Parcours tous les articles et les ajoute à la page
    articles.forEach(article => {
        const articleHTML = `
        <div class="article" data-article="${article.article + '-' + article.id}">   
            <div class="gauche_article">
                <a href="${article.article === 'book' ? '/litterature-' : '/cinema-'}${article.id}">
                    <img class="img_article" src="./assets/img/${article.article === 'book' ? 'livres/' : 'dvd/'}${article.picture}" alt="${article.title}">
                </a>
                <a href="${article.article === 'book' ? '/litterature-' : '/cinema-'}${article.id}">
                    <div class="plus_infos">
                        <img src="./assets/img/Info.svg" alt="TeloCulture">
                        <h5>Plus d'informations</h5>
                    </div>
                </a>
            </div>
            <div class="infos">
                <h6 class="type">- ${article.type.charAt(0).toUpperCase() + article.type.slice(1)}</h6>
                <h2><a href="${article.article === 'book' ? '/litterature-' : '/cinema-'}${article.id}">${article.title}</a></h2>
                <h3>${article.article === 'book' ? article.author : article.director}</h3>
                <p>${article.article === 'book' ? article.editor + ' - '  + article.edition_year : article.year}</p>
                <p>${article.summary}</p>
            </div>
        </div>
        `;
        resultsContainer.insertAdjacentHTML('beforeend', articleHTML);
    });
}

// Appliquer les filtres et afficher les articles
function applyFiltersAndDisplay() {
    let filteredArticles = [...allArticles];

    // Appliquer le filtre par année
    filteredArticles = fastFilter(filteredArticles);

    // Appliquer le filtre par type (livre ou film)
    filteredArticles = applyTypeFilter(filteredArticles);

    // Appliquer le filtre par style
    filteredArticles = applyStyleFilter(filteredArticles);

    // Appliquer les filtres de livres
    filteredArticles = applyLivreFilters(filteredArticles);

    // Appliquer les filtres de films
    filteredArticles = applyFilmFilters(filteredArticles);

    // Afficher les articles filtrés
    showPage(currentPage, filteredArticles);
}

function fastFilter(articles) {
    const sortOption = document.querySelector('input[name="filtres-rapides"]:checked');
    if (sortOption) {
        const sortOrder = sortOption.value;
        if (sortOrder === 'asc' || sortOrder === 'desc') {
            articles.sort((a, b) => {
                const yearA = a.article === 'book' ? a.edition_year : a.year;
                const yearB = b.article === 'book' ? b.edition_year : b.year;
                if (sortOrder === 'asc') {
                    return yearA - yearB;
                } else {
                    return yearB - yearA;
                }
            });
        } else if (sortOrder === 'loan') {
            articles.sort((a, b) => b.loan_number - a.loan_number);
        }
    }
    return articles;
}

function applyTypeFilter(articles) {
    const livreChecked = document.querySelector('input[name="livre"]').checked;
    const filmChecked = document.querySelector('input[name="film"]').checked;

    if (!livreChecked && !filmChecked) {
        return articles;
    }

    return articles.filter(article => {
        return (livreChecked && article.article === 'book') || (filmChecked && article.article === 'film');
    });
}

function applyStyleFilter(articles) {
    const styleFilters = document.querySelectorAll('input[name="filtres-style"]:checked');
    if (styleFilters.length === 0) {
        return articles;
    }
    const selectedStyles = Array.from(styleFilters).map(filter => filter.value);
    return articles.filter(article => selectedStyles.includes(article.style));
}

function updateSearchSummary() {
    const searchContainer = document.querySelector('.ma_recherche');

    const livreChecked = document.querySelector('input[name="livre"]').checked;
    const filmChecked = document.querySelector('input[name="film"]').checked;
    let selectedType;
    if (livreChecked && filmChecked) { selectedType = 'TOUS LES DOCUMENTS'; } 
    else if (livreChecked) { selectedType = 'LIVRES'; }
    else if (filmChecked) { selectedType = 'FILMS'; } 
    else { selectedType = 'TOUS LES DOCUMENTS'; }

    let selectedSort = '';
    const checkedRadio = document.querySelector('input[name="filtres-rapides"]:checked');
    if (checkedRadio && checkedRadio.previousElementSibling) {
        selectedSort = checkedRadio.previousElementSibling.textContent.trim().toUpperCase();
    }

    const selectedStyles = [...document.querySelectorAll('input[name="filtres-style"]:checked')]
        .map(input => `
            <div class="type" data-id="${input.id}">
                <p>${input.previousElementSibling.textContent.toUpperCase()}</p>
                <img src="./assets/img/croix.svg" alt="Teloculture">
            </div>
        `)
        .join('');

    // Récupération des catégories de livres sélectionnées
    const selectedLivres = [...document.querySelectorAll('input[name="filtres-livres"]:checked')]
        .map(input => `
            <div class="type" data-id="${input.id}">
                <p>${input.previousElementSibling.textContent.toUpperCase()}</p>
                <img src="./assets/img/croix.svg" alt="Teloculture">
            </div>
        `)
        .join('');

    // Récupération des catégories de films sélectionnées
    const selectedFilms = [...document.querySelectorAll('input[name="filtres-films"]:checked')]
        .map(input => `
            <div class="type" data-id="${input.id}">
                <p>${input.previousElementSibling.textContent.toUpperCase()}</p>
                <img src="./assets/img/croix.svg" alt="Teloculture">
            </div>
        `)
        .join('');

    const searchSummary = `
        <p>Ma recherche :</p>
        <div class="type">
            <p>${selectedType}</p>
        </div>
        <div class="type">
            <p>${selectedSort}</p>
        </div>
        ${selectedStyles}
        ${selectedLivres}
        ${selectedFilms}
    `;

    searchContainer.innerHTML = searchSummary;

    searchContainer.querySelectorAll('.type[data-id] img').forEach(img => {
        img.addEventListener('click', function(event) {
            event.stopPropagation();
            const inputId = this.parentElement.getAttribute('data-id');
            const input = document.getElementById(inputId);
            if (input) {
                input.checked = false;
                applyFiltersAndDisplay();
                updateSearchSummary();
            }
        });
    });
}

// Sélection des éléments DOM pour les filtres
const livreFilters = document.querySelectorAll('input[name="filtres-livres"]');
const filmFilters = document.querySelectorAll('input[name="filtres-films"]');
const typeLivreFilter = document.querySelector('input[name="livre"]');
const typeFilmFilter = document.querySelector('input[name="film"]');

// Ajout des écouteurs d'événements pour les filtres de livres
livreFilters.forEach(filter => {
    filter.addEventListener('change', function () {
        // Désactive le filtre de type de film si un filtre de livre est activé
        typeFilmFilter.checked = false;
        typeLivreFilter.checked = true;

        // Désactive tous les filtres films
        filmFilters.forEach(f => {
            f.checked = false;
        });
    });
});

// Ajout des écouteurs d'événements pour les filtres de films
filmFilters.forEach(filter => {
    filter.addEventListener('change', function () {
        // Désactive le filtre de type de livre si un filtre de film est activé
        typeLivreFilter.checked = false;
        typeFilmFilter.checked = true;

        // Désactive tous les filtres livres
        livreFilters.forEach(f => {
            f.checked = false;
        });
    });
});

// Fonction pour appliquer les filtres de livres
function applyLivreFilters(articles) {
    const checkedLivreFilters = Array.from(livreFilters).filter(filter => filter.checked).map(filter => filter.value);
    if (checkedLivreFilters.length === 0) {
        return articles;
    }
    return articles.filter(article => {
        return checkedLivreFilters.includes(article.type);
    });
}

// Fonction pour appliquer les filtres de films
function applyFilmFilters(articles) {
    const checkedFilmFilters = Array.from(filmFilters).filter(filter => filter.checked).map(filter => filter.value);
    if (checkedFilmFilters.length === 0) {
        return articles;
    }
    return articles.filter(article => {
        return checkedFilmFilters.includes(article.type);
    });
}

// Fonction pour récupérer le paramètre GET dans l'URL
function getUrlParameter(name) {
    name = name.replace(/[[]/, '\\[').replace(/[\]]/, '\\]');
    const regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    const results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}

// Fonction pour appliquer le filtre selon le paramètre GET
function applyInitialFilter() {
    const filterParam = getUrlParameter('filter');

    document.querySelector(`input[value="${filterParam}"]`).checked = true;

    // Appliquer les filtres et afficher les articles
    applyFiltersAndDisplay();
    updateSearchSummary();
}

// Appel de la fonction pour appliquer le filtre initial au chargement de la page
applyInitialFilter();


document.querySelectorAll('.filtres').forEach(input => {
    input.addEventListener('change', function() {
        applyFiltersAndDisplay();
        updateSearchSummary();
    });
});

fetchArticles();
