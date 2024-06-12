@extends('layout')

@section('content')

<div id="main">
    <section id="filtre">
        <h2>Affiner votre recherche</h2>
        <div class="all_filtres">
            <div class="filtre">
                <h6>Filtres rapides</h6>
                <img src="./assets/img/fleche_bas.svg" alt="Teloculture">
            </div>
            <div class="choix">
                <div class="filtre_rapides">
                    <label for="filtre-plus-recents">Les plus récents</label>
                    <input class="filtres" value="desc" type="radio" name="filtres-rapides" id="filtre-plus-recents">
                </div>
                <div class="filtre_rapides">
                    <label for="filtre-plus-anciens">Les plus anciens</label>
                    <input class="filtres" value="asc" type="radio" name="filtres-rapides" id="filtre-plus-anciens">
                </div>
                <div class="filtre_rapides">
                    <label for="filtre-plus-empruntes">Les plus empruntés</label>
                    <input class="filtres" value="loan" type="radio" name="filtres-rapides" id="filtre-plus-empruntes">
                </div>

            </div>
            <div class="filtre">
                <h6>Types</h6>
                <img src="./assets/img/fleche_bas.svg" alt="Teloculture">
            </div>
            <div class="choix">
                <div class="type">
                    <label for="filtre-livre">Livre</label>
                    <input class="filtres" name="livre" type="checkbox" id="filtre-livre">
                </div>
                <div class="type">
                    <label for="filtre-film">Film</label>
                    <input class="filtres" name="film" type="checkbox" id="filtre-film">
                </div>
            </div>
            <div class="filtre">
                <h6>Styles populaires</h6>
                <img src="./assets/img/fleche_bas.svg" alt="Teloculture">
            </div>
            <div class="choix">
                <div class="genre">
                    <label for="filtre-drame">Drame</label>
                    <input class="filtres" type="checkbox" name="filtres-style" value="drame" id="filtre-drame">
                </div>
                <div class="genre">
                    <label for="filtre-sience-fiction">Science-fiction</label>
                    <input class="filtres" type="checkbox" name="filtres-style" value="sience-fiction" id="filtre-sience-fiction">
                </div>
                <div class="genre">
                    <label for="filtre-thriller">Thriller</label>
                    <input class="filtres" type="checkbox" name="filtres-style" value="thriller" id="filtre-thriller">
                </div>
                <div class="genre">
                    <label for="filtre-fantastique">Fantastique</label>
                    <input class="filtres" type="checkbox" name="filtres-style" value="fantastique" id="filtre-fantastique">
                </div>
                <div class="genre">
                    <label for="filtre-poesie">Poésie</label>
                    <input class="filtres" type="checkbox" name="filtres-style" value="poésie" id="filtre-poesie">
                </div>
                <div class="genre">
                    <label for="filtre-policier">Policier</label>
                    <input class="filtres" type="checkbox" name="filtres-style" value="policier" id="filtre-policier">
                </div>
            </div>
        </div>
    </section>
    <section id="resultat">
        <h1>Résultats de la recherche</h1>
        <div class="ma_recherche">
            <p>Ma recherche :</p>
            <div class="type">
                <p>TOUS LES DOCUMENTS</p>
            </div>
            <div class="type">
                <p>NOUVEAUTES</p>
                <img src="./assets/img/croix.svg" alt="Teloculture">
            </div>
        </div>
        <div class="resultat">
            <div class="gauche">
                <h6>Résultats 1 - 5 / </h6>
                <h6 class="totale_resultat">20</h6>
            </div>
            <div class="droite">
                <img src="./assets/img/fleche_back_catalogue.svg" alt="Teloculture" class="pagination-nav" data-page="prev">
                <p class="active" data-page="1">1</p>
                <p class="passive" data-page="2">2</p>
                <p class="passive" data-page="3">3</p>
                <p class="reduit">...</p>
                <p class="passive totale_page" data-page="10">10</p>
                <img src="./assets/img/fleche_forward_catalogue.svg" alt="Teloculture" class="pagination-nav" data-page="next">
            </div>
        </div>
        <div class="all_articles">

        </div>
    </section>
</div>

<script src="./js/catalogue.js"></script>

@endsection