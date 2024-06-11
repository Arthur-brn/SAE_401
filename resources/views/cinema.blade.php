@extends('layout')

@section('content')

<section id="top-page">
    <div>
        <h2></h2>
        <p></p>
        <a href="#"><button class="voir_plus">VOIR PLUS <img src="./assets/img/voir_plus.svg" alt="Teloculture"></button></a>
    </div>
    <div class="img">
        <img src="" alt="">
    </div>
</section>

<section id="nouveautes" class="splide" aria-label="Splide Basic HTML Example">
    <h2>Nouveautés !</h2>
    <div class="splide__track">
        <ul class="splide__list" id="nouveautes-list">
            <!-- Les nouveautés seront insérées ici par JavaScript -->
        </ul>
    </div>
    <div class="splide__arrows">
        <div class="splide__arrow splide__arrow--prev">
            <img src="./assets/img/fleche_droite.svg" alt="TeloCulture">
        </div>
        <div class="splide__arrow splide__arrow--next">
            <img src="./assets/img/fleche_gauche.svg" alt="TeloCulture">
        </div>
    </div>
    <a href="/catalogue"><button class="voir_plus">VOIR PLUS <img src="./assets/img/voir_plus.svg" alt="Teloculture"></button></a>
</section>

<section id="coups_de_coeur" class="splide" aria-label="Splide Basic HTML Example">
    <h2>Coups de coeur !</h2>
    <div class="splide__track">
        <ul class="splide__list" id="coups_de_coeur-list">
            <!-- Les coups de coeur seront insérés ici par JavaScript -->
        </ul>
    </div>
    <div class="splide__arrows">
        <div class="splide__arrow splide__arrow--prev">
            <img src="./assets/img/fleche_droite.svg" alt="TeloCulture">
        </div>
        <div class="splide__arrow splide__arrow--next">
            <img src="./assets/img/fleche_gauche.svg" alt="TeloCulture">
        </div>
    </div>
    <a href="/catalogue"><button class="voir_plus">VOIR PLUS <img src="./assets/img/voir_plus.svg" alt="Teloculture"></button></a>
</section>

<section id="genre">
    <div>
        <h2>Selon le genre</h2>
        <div class="allGenre">
            <div>
                <div class="genre romans">
                    <h3>Longs Métrages</h3>
                </div>
                <div class="genre bd_mangas">
                    <h3>Séries</h3>
                </div>
                <div class="genre jeunesse">
                    <h3>Documentaires</h3>
                </div>
                <div class="genre poesie">
                    <h3>Films d'Animation</h3>
                </div>
                <div class="genre biographie">
                    <h3>Courts Métrages</h3>
                </div>
                <div class="genre actualites">
                    <h3>Reportages</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="./js/cinema.js"></script>

@endsection