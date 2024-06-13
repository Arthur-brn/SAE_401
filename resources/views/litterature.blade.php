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
    <a href="/catalogue?filter=desc&type=livre"><button class="voir_plus">VOIR PLUS <img src="./assets/img/voir_plus.svg" alt="Teloculture"></button></a>
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
    <a href="/catalogue?filter=loan&type=livre"><button class="voir_plus">VOIR PLUS <img src="./assets/img/voir_plus.svg" alt="Teloculture"></button></a>
</section>

<section id="genre">
    <div>
        <h2>Selon le genre</h2>
        <div class="allGenre">
            <div>
                <div class="genre romans">
                    <a href="/catalogue?filter=roman">
                        <h3>Romans</h3>
                    </a>
                </div>
                <div class="genre bd_mangas">
                    <a href="/catalogue?filter=bd+et+manga">
                        <h3>BD et mangas</h3>
                    </a>
                </div>
                <div class="genre jeunesse">
                    <a href="/catalogue?filter=jeunesse">
                        <h3>Jeunesse</h3>
                    </a>
                </div>
                <div class="genre poesie">
                    <a href="/catalogue?filter=po%c3%a9sie">
                        <h3>Poésie</h3>
                    </a>
                </div>
                <div class="genre biographie">
                    <a href="/catalogue?filter=biographie">
                        <h3>Biographie</h3>
                    </a>
                </div>
                <div class="genre actualites">
                    <a href="/catalogue?filter=actualit%c3%a9">
                        <h3>Actualités</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="./js/litterature.js"></script>

@endsection