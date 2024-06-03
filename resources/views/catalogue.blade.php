@extends('layout')

@section('content')

<div id="main">
    <section id="filtre">
        <h2>Affiner votre recherche</h2>
        <div class="all_filtres">
            <div class="filtre">
                <h6>Filtres rapides</h6>
                <img src="./img/fleche_bas.svg" alt="Teloculture">
            </div>
            <div class="choix">
                <p>choix filtres</p>
            </div>
            <div class="filtre">
                <h6>Filtres rapides</h6>
                <img src="./img/fleche_bas.svg" alt="Teloculture">
            </div>
            <div class="choix">
                <p>choix filtres</p>
            </div>
            <div class="filtre">
                <h6>Filtres rapides</h6>
                <img src="./img/fleche_bas.svg" alt="Teloculture">
            </div>
            <div class="choix">
                <p>choix filtres</p>
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
                <img src="./img/croix.svg" alt="Teloculture">
            </div>
        </div>
        <div class="resultat">
            <div class="gauche">
                <h6>Résultats 1 - 10 / </h6>
                <h6 class="totale_resultat">132</h6>
            </div>
            <div class="droite">
                <img src="./img/fleche_gauche.svg" alt="Teloculture">
                <p class="active" data-page="1">1</p>
                <p class="passive" data-page="2">2</p>
                <p class="passive" data-page="3">3</p>
                <p class="reduit">...</p>
                <p class="passive totale_page" data-page="140">140</p>
                <img src="./img/fleche_droite.svg" alt="Teloculture">
            </div>
        </div>
        <div class="all_articles">
            <div class="article" data-article="1">
                <div class="gauche_article">
                    <img class="img_article" src="./img/catalogue.jpg" alt="TeloCulture">
                    <div class="plus_infos">
                        <img src="./img/Info.svg" alt="TeloCulture">
                        <h5>Plus d'informations</h5>
                    </div>
                </div>
                <div class="infos">
                    <h6 class="type">- BD ou manga</h6>
                    <h2>Paradoxe. 1</h2>
                    <h3>MARAZANO, RICHARD</h3>
                    <p>Collection - 2023</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in
                        hendrerit urna.
                        Pellentesque sit amet sapien fringilla, ...</p>
                </div>
            </div>
            <div class="article" data-article="2">
                <div class="gauche_article">
                    <img class="img_article" src="./img/catalogue.jpg" alt="TeloCulture">
                    <div class="plus_infos">
                        <img src="./img/Info.svg" alt="TeloCulture">
                        <h5>Plus d'informations</h5>
                    </div>
                </div>
                <div class="infos">
                    <h6 class="type">- BD ou manga</h6>
                    <h2>Paradoxe. 2</h2>
                    <h3>MARAZANO, RICHARD</h3>
                    <p>Collection - 2023</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in
                        hendrerit urna.
                        Pellentesque sit amet sapien fringilla, ...</p>
                </div>
            </div>
            <div class="article" data-article="3">
                <div class="gauche_article">
                    <img class="img_article" src="./img/catalogue.jpg" alt="TeloCulture">
                    <div class="plus_infos">
                        <img src="./img/Info.svg" alt="TeloCulture">
                        <h5>Plus d'informations</h5>
                    </div>
                </div>
                <div class="infos">
                    <h6 class="type">- BD ou manga</h6>
                    <h2>Paradoxe. 3</h2>
                    <h3>MARAZANO, RICHARD</h3>
                    <p>Collection - 2023</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in
                        hendrerit urna.
                        Pellentesque sit amet sapien fringilla, ...</p>
                </div>
            </div>
            <div class="article" data-article="4">
                <div class="gauche_article">
                    <img class="img_article" src="./img/catalogue.jpg" alt="TeloCulture">
                    <div class="plus_infos">
                        <img src="./img/Info.svg" alt="TeloCulture">
                        <h5>Plus d'informations</h5>
                    </div>
                </div>
                <div class="infos">
                    <h6 class="type">- BD ou manga</h6>
                    <h2>Paradoxe. 4</h2>
                    <h3>MARAZANO, RICHARD</h3>
                    <p>Collection - 2023</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in
                        hendrerit urna.
                        Pellentesque sit amet sapien fringilla, ...</p>
                </div>
            </div>
            <div class="article" data-article="5">
                <div class="gauche_article">
                    <img class="img_article" src="./img/catalogue.jpg" alt="TeloCulture">
                    <div class="plus_infos">
                        <img src="./img/Info.svg" alt="TeloCulture">
                        <h5>Plus d'informations</h5>
                    </div>
                </div>
                <div class="infos">
                    <h6 class="type">- BD ou manga</h6>
                    <h2>Paradoxe. 5</h2>
                    <h3>MARAZANO, RICHARD</h3>
                    <p>Collection - 2023</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in
                        hendrerit urna.
                        Pellentesque sit amet sapien fringilla, ...</p>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="./js/catalogue.js"></script>

@endsection