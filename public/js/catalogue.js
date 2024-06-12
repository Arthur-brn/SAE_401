document.addEventListener("DOMContentLoaded", function () {
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

    // Changement page

    const articles = document.querySelectorAll(".article");
    const pages = document.querySelectorAll(".droite p[data-page]");
    const totalPage = parseInt(
        document.querySelector(".totale_page").getAttribute("data-page"),
        10
    );
    const articlesPerPage = 5;
    let currentPage = 1;

    function showPage(pageNum) {
        const start = (pageNum - 1) * articlesPerPage;
        const end = pageNum * articlesPerPage;

        articles.forEach((article, index) => {
            if (index >= start && index < end) {
                article.classList.remove("hidden");
            } else {
                article.classList.add("hidden");
            }
        });

        updatePagination(pageNum);
    }

    function updatePagination(activePage) {
        pages.forEach((page) => {
            const pageNum = parseInt(page.getAttribute("data-page"), 10);

            if (pageNum === activePage) {
                page.classList.remove("passive");
                page.classList.add("active");
            } else if (
                pageNum === activePage - 1 ||
                pageNum === activePage + 1
            ) {
                page.classList.remove("active");
                page.classList.add("passive");
                page.classList.remove("hidden");
            } else {
                page.classList.remove("active");
                page.classList.add("passive");
                page.classList.add("hidden");
            }
        });

        document.querySelector(".reduit").classList.remove("hidden");
        document.querySelector(".totale_page").classList.remove("hidden");
    }

    pages.forEach((page) => {
        page.addEventListener("click", () => {
            const pageNum = parseInt(page.getAttribute("data-page"), 10);
            currentPage = pageNum;
            showPage(currentPage);
        });
    });

    showPage(currentPage);
});

document.addEventListener("DOMContentLoaded", function () {
    // Fonction pour récupérer tous les articles
    function fetchArticles() {
        fetch('/api/articles')
            .then(response => response.json())
            .then(data => {
                allArticles = data;
                applyFiltersAndDisplay();
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
            <div class="article" data-article="${article.id}">
                <div class="gauche_article">
                    <img class="img_article" src="./assets/img/${article.article === 'book' ? 'livres/' : 'dvd/'}${article.picture}" alt="${article.title}">
                    <div class="plus_infos">
                        <img src="./assets/img/Info.svg" alt="TeloCulture">
                        <h5>Plus d'informations</h5>
                    </div>
                </div>
                <div class="infos">
                    <h6 class="type">- ${article.type.charAt(0).toUpperCase() + article.type.slice(1)}</h6>
                    <h2>${article.title}</h2>
                    <h3>${article.article === 'book' ? article.author : article.director}</h3>
                    <p>${article.article === 'book' ? article.editor + ' - '  + article.edition_year : article.year}</p>
                    <p>${article.summary}</p>
                </div>
            </div>
            `;
            resultsContainer.insertAdjacentHTML('beforeend', articleHTML);
        });
    }

    // Appel de la fonction pour récupérer tous les articles au chargement de la page
    fetchArticles();

    // Appliquer les filtres et afficher les articles
    function applyFiltersAndDisplay() {
        let filteredArticles = [...allArticles];

        // Appliquer le filtre par année
        filteredArticles = fastFilter(filteredArticles);

        // Appliquer le filtre par type (livre ou film)
        filteredArticles = applyTypeFilter(filteredArticles);

        // Appliquer le filtre par style
        filteredArticles = applyStyleFilter(filteredArticles);

        // Afficher les articles filtrés
        displayArticles(filteredArticles);
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
        console.log(articles); 
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

    document.querySelectorAll('.filtres').forEach(input => {
        input.addEventListener('change', function() {
            applyFiltersAndDisplay();
        });
    });
});
