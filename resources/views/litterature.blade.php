@extends('layout')

@section('content')

<section id="top-page">
    <div>
        <h2>Le top du top</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim
            pharetra hac. Urna commodo, lacus ut magna velit eleifend. Amet, quis urna, a eu.
        </p>
        <button class="voir_plus">VOIR PLUS <img src="./assets/img/voir_plus.svg" alt="Teloculture"></button>
    </div>
    <div class="img">
        <img src="./assets/img/top-page_litterature.jpg" alt="TeloCulture">
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
    <button class="voir_plus">VOIR PLUS <img src="./assets/img/voir_plus.svg" alt="Teloculture"></button>
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
    <button class="voir_plus">VOIR PLUS <img src="./assets/img/voir_plus.svg" alt="Teloculture"></button>
</section>

<section id="genre">
    <div>
        <h2>Selon le genre</h2>
        <div class="allGenre">
            <div>
                <div class="genre">
                    <h3>Romans</h3>
                </div>
                <div class="genre">
                    <h3>BD et mangas</h3>
                </div>
                <div class="genre">
                    <h3>Jeunesse</h3>
                </div>
                <div class="genre">
                    <h3>Poésie</h3>
                </div>
                <div class="genre">
                    <h3>Biographie</h3>
                </div>
                <div class="genre">
                    <h3>Actualités</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="./js/litterature.js"></script>

@endsection