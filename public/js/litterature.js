document.addEventListener("DOMContentLoaded", function () {
    function getSplideOptions() {
        return window.innerWidth > 480
            ? {
                  perPage: 5,
                  perMove: 1,
                  rewind: true,
                  gap: "1rem",
                  autoplay: false,
              }
            : {
                  perPage: 1,
                  perMove: 1,
                  rewind: true,
                  gap: "1rem",
                  autoplay: false,
              };
    }

    var nouveautesSplide = new Splide(
        "#nouveautes",
        getSplideOptions()
    ).mount();
    var coupsDeCoeurSplide = new Splide(
        "#coups_de_coeur",
        getSplideOptions()
    ).mount();

    // Fonction pour récupérer les informations sur le livre le plus emprunté
    function fetchMostLoanedBook() {
        fetch('/api/books-most-loaned')
            .then(response => response.json())
            .then(data => {
                // Mettre à jour les éléments HTML avec les données du livre le plus emprunté
                const topPageSection = document.getElementById('top-page');
                const titleElement = topPageSection.querySelector('h2');
                const paragraphElement = topPageSection.querySelector('p');
                const detailPageLink = topPageSection.querySelector('a');
                const imgElement = topPageSection.querySelector('.img img');
            
                titleElement.textContent = data.title;
                paragraphElement.textContent = data.summary;
                detailPageLink.href = "/litterature-" + data.id;
                imgElement.src = "./assets/img/livres/" + data.picture;
                imgElement.alt = data.title;
            })
            .catch(error => console.error('Error fetching most loaned book:', error));
    }

    function fetchBooks(url, listElementId) {
        fetch(url)
            .then(response => response.text())
            .then(text => {
                console.log('Raw response:', text);
                return JSON.parse(text);  // Manually parse JSON
            })
            .then(data => {
                const listElement = document.getElementById(listElementId);
                listElement.innerHTML = '';
                data.forEach(book => {
                    const listItem = document.createElement('li');
                    listItem.className = 'splide__slide';
                    listItem.innerHTML = `
                        <a href="/litterature-${book.id}">
                            <img src="./assets/img/livres/${book.picture}" alt="${book.title}">
                            <div class="infos">
                                <h5>${book.title}</h5>
                                <h6>${book.author.name}</h6>
                            </div>
                        </a>
                    `;
                    listElement.appendChild(listItem);
                });
                new Splide(`#${listElementId.split('-')[0]}`, getSplideOptions()).mount();
            })
            .catch(error => console.error('Error fetching books:', error));
    }

    fetchMostLoanedBook();
    fetchBooks('/api/books-latest', 'nouveautes-list');
    fetchBooks('/api/books-most-loaned-books', 'coups_de_coeur-list');
    
    window.addEventListener("resize", function () {
        nouveautesSplide.options = getSplideOptions();
        coupsDeCoeurSplide.options = getSplideOptions();
    });
});


