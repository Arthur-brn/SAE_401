@extends('layout')

@section('content')

<section id="top-page">
    <div>
        <h2>Le top du top</h2>
        <p>Découvrez des œuvres littéraires incontournables, sélectionnées pour leur qualité et leur profondeur.</p>
        <a href="/catalogue"><button class="voir_plus">VOIR PLUS <img src="./assets/img/voir_plus.svg" alt="Teloculture"></button></a>
    </div>
    <div class=" img">
        <img src="./assets/img/top-page_litterature.jpg" alt="TeloCulture">
    </div>
</section>

<section id="nouveautes" class="splide" aria-label="Splide Basic HTML Example">
    <h2>Nouveautés !</h2>

    <div class="splide__track">
        <ul class="splide__list">
            <li class="splide__slide">
                <div>
                    <img src="./assets/img/top-page_litterature.jpg" alt="TeloCulture">
                    <div class="infos">
                        <h5>Paradoxe. 1</h5>
                        <h6>MARAZANO, RICHARD</h6>
                    </div>
                </div>
            </li>
            <li class="splide__slide">
                <div>
                    <img src="./assets/img/top-page_litterature.jpg" alt="TeloCulture">
                    <div class="infos">
                        <h5>Paradoxe. 2</h5>
                        <h6>MARAZANO, RICHARD</h6>
                    </div>
                </div>
            </li>
            <li class="splide__slide">
                <div>
                    <img src="./assets/img/top-page_litterature.jpg" alt="TeloCulture">
                    <div class="infos">
                        <h5>Paradoxe. 3</h5>
                        <h6>MARAZANO, RICHARD</h6>
                    </div>
                </div>
            </li>
            <li class="splide__slide">
                <div>
                    <img src="./assets/img/top-page_litterature.jpg" alt="TeloCulture">
                    <div class="infos">
                        <h5>Paradoxe. 4</h5>
                        <h6>MARAZANO, RICHARD</h6>
                    </div>
                </div>
            </li>
            <li class="splide__slide">
                <div>
                    <img src="./assets/img/top-page_litterature.jpg" alt="TeloCulture">
                    <div class="infos">
                        <h5>Paradoxe. 5</h5>
                        <h6>MARAZANO, RICHARD</h6>
                    </div>
                </div>
            </li>
            <li class="splide__slide">
                <div>
                    <img src="./assets/img/top-page_litterature.jpg" alt="TeloCulture">
                    <div class="infos">
                        <h5>Paradoxe. 6</h5>
                        <h6>MARAZANO, RICHARD</h6>
                    </div>
                </div>
            </li>
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
        <ul class="splide__list">
            <li class="splide__slide">
                <div>
                    <img src="./assets/img/top-page_litterature.jpg" alt="TeloCulture">
                    <div class="infos">
                        <h5>Paradoxe. 1</h5>
                        <h6>MARAZANO, RICHARD</h6>
                    </div>
                </div>
            </li>
            <li class="splide__slide">
                <div>
                    <img src="./assets/img/top-page_litterature.jpg" alt="TeloCulture">
                    <div class="infos">
                        <h5>Paradoxe. 2</h5>
                        <h6>MARAZANO, RICHARD</h6>
                    </div>
                </div>
            </li>
            <li class="splide__slide">
                <div>
                    <img src="./assets/img/top-page_litterature.jpg" alt="TeloCulture">
                    <div class="infos">
                        <h5>Paradoxe. 3</h5>
                        <h6>MARAZANO, RICHARD</h6>
                    </div>
                </div>
            </li>
            <li class="splide__slide">
                <div>
                    <img src="./assets/img/top-page_litterature.jpg" alt="TeloCulture">
                    <div class="infos">
                        <h5>Paradoxe. 4</h5>
                        <h6>MARAZANO, RICHARD</h6>
                    </div>
                </div>
            </li>
            <li class="splide__slide">
                <div>
                    <img src="./assets/img/top-page_litterature.jpg" alt="TeloCulture">
                    <div class="infos">
                        <h5>Paradoxe. 5</h5>
                        <h6>MARAZANO, RICHARD</h6>
                    </div>
                </div>
            </li>
            <li class="splide__slide">
                <div>
                    <img src="./assets/img/top-page_litterature.jpg" alt="TeloCulture">
                    <div class="infos">
                        <h5>Paradoxe. 6</h5>
                        <h6>MARAZANO, RICHARD</h6>
                    </div>
                </div>
            </li>
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
                    <h3>Romans</h3>
                </div>
                <div class="genre bd_mangas">
                    <h3>BD et mangas</h3>
                </div>
                <div class="genre jeunesse">
                    <h3>Jeunesse</h3>
                </div>
                <div class="genre poesie">
                    <h3>Poésie</h3>
                </div>
                <div class="genre biographie">
                    <h3>Biographie</h3>
                </div>
                <div class="genre actualites">
                    <h3>Actualités</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="./js/litterature.js"></script>

@endsection