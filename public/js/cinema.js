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

    // Fonction pour récupérer les informations sur le film le plus emprunté
    function fetchMostLoanedFilm() {
        fetch('/api/films-most-loaned')
            .then(response => response.json())
            .then(data => {
                // Mettre à jour les éléments HTML avec les données du film le plus emprunté
                const topPageSection = document.getElementById('top-page');
                const titleElement = topPageSection.querySelector('h2');
                const paragraphElement = topPageSection.querySelector('p');
                const detailPageLink = topPageSection.querySelector('a');
                const imgElement = topPageSection.querySelector('.img img');
            
                titleElement.textContent = data.title;
                paragraphElement.textContent = data.summary;
                detailPageLink.href = "/litterature-" + data.id;
                imgElement.src = data.picture;
                imgElement.alt = data.title;
            })
            .catch(error => console.error('Error fetching most loaned film:', error));
    }

    function fetchFilms(url, listElementId) {
        fetch(url)
            .then(response => response.text())
            .then(text => {
                console.log('Raw response:', text);
                return JSON.parse(text);  // Manually parse JSON
            })
            .then(data => {
                const listElement = document.getElementById(listElementId);
                listElement.innerHTML = '';
                data.forEach(film => {
                    const listItem = document.createElement('li');
                    listItem.className = 'splide__slide';
                    listItem.innerHTML = `
                        <a href="/litterature-${film.id}">
                            <img src="${film.picture}" alt="${film.title}">
                            <div class="infos">
                                <h5>${film.title}</h5>
                                <h6>${film.director.name}</h6>
                            </div>
                        </a>
                    `;
                    listElement.appendChild(listItem);
                });
                new Splide(`#${listElementId.split('-')[0]}`, getSplideOptions()).mount();
            })
            .catch(error => console.error('Error fetching films:', error));
    }

    fetchMostLoanedFilm();
    fetchFilms('/api/films-latest', 'nouveautes-list');
    fetchFilms('/api/films-most-loaned-films', 'coups_de_coeur-list');
    
    window.addEventListener("resize", function () {
        nouveautesSplide.options = getSplideOptions();
        coupsDeCoeurSplide.options = getSplideOptions();
    });
});


