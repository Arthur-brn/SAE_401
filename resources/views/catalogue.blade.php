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
                    <input class="filtres" value="desc" type="radio" name="filtres-rapides" id="filtre-plus-recents" checked>
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
                    <input class="filtres" value="livre" name="livre" type="checkbox" id="filtre-livre">
                </div>
                <div class="type">
                    <label for="filtre-film">Film</label>
                    <input class="filtres" value="film" name="film" type="checkbox" id="filtre-film">
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
            <div class="filtre">
                <h6>Catégories livres</h6>
                <img src="./assets/img/fleche_bas.svg" alt="Teloculture">
            </div>
            <div class="choix">
                <div class="genre">
                    <label for="filtre-romans">Romans</label>
                    <input class="filtres" type="checkbox" name="filtres-livres" value="roman" id="filtre-romans">
                </div>
                <div class="genre">
                    <label for="filtre-bd-mangas">Bd et mangas</label>
                    <input class="filtres" type="checkbox" name="filtres-livres" value="bd et manga" id="filtre-bd-mangas">
                </div>
                <div class="genre">
                    <label for="filtre-jeunesse">Jeunesse</label>
                    <input class="filtres" type="checkbox" name="filtres-livres" value="jeunesse" id="filtre-jeunesse">
                </div>
                <div class="genre">
                    <label for="filtre-poesie">Poésie</label>
                    <input class="filtres" type="checkbox" name="filtres-livres" value="poésie" id="filtre-poesie">
                </div>
                <div class="genre">
                    <label for="filtre-biographie">Biographie</label>
                    <input class="filtres" type="checkbox" name="filtres-livres" value="biographie" id="filtre-biographie">
                </div>
                <div class="genre">
                    <label for="filtre-actualite">Actualités</label>
                    <input class="filtres" type="checkbox" name="filtres-livres" value="actualité" id="filtre-actualite">
                </div>
            </div>
            <div class="filtre">
                <h6>Catégories film</h6>
                <img src="./assets/img/fleche_bas.svg" alt="Teloculture">
            </div>
            <div class="choix">
                <div class="genre">
                    <label for="filtre-longs-metrages">Longs métrages</label>
                    <input class="filtres" type="checkbox" name="filtres-films" value="long métrage" id="filtre-longs-metrages">
                </div>
                <div class="genre">
                    <label for="filtre-series">Séries</label>
                    <input class="filtres" type="checkbox" name="filtres-films" value="série" id="filtre-series">
                </div>
                <div class="genre">
                    <label for="filtre-documentaires">Documentaires</label>
                    <input class="filtres" type="checkbox" name="filtres-films" value="documentaire" id="filtre-documentaires">
                </div>
                <div class="genre">
                    <label for="filtre-films-danimations">Films d'animations</label>
                    <input class="filtres" type="checkbox" name="filtres-films" value="film animation" id="filtre-films-danimations">
                </div>
                <div class="genre">
                    <label for="filtre-courts-metrages">Courts métrages</label>
                    <input class="filtres" type="checkbox" name="filtres-films" value="court métrage" id="filtre-courts-metrages">
                </div>
                <div class="genre">
                    <label for="filtre-reportages">Reportages</label>
                    <input class="filtres" type="checkbox" name="filtres-films" value="reportage" id="filtre-reportages">
                </div>
            </div>
        </div>
    </section>
    <section id="resultat">
        <h1>Résultats de la recherche</h1>
        <div class="ma_recherche"></div>
        <div class="resultat">
            <div class="gauche">
                <h6>Résultats 1 - 5 / </h6>
                <h6 class="totale_resultat">20</h6>
            </div>
            <div class="droite">
                <!-- Pagination controls will be injected here -->
            </div>
        </div>
        <div class="all_articles">
            <!-- Articles injected here -->
        </div>
    </section>
</div>

<script src="./js/catalogue.js"></script>

@endsection