@extends('layout')

@section('content')

<section id="top-page">
    <div>
        <h2>Le top du top</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim
            pharetra
            hac.
            Urna commodo, lacus ut magna velit eleifend. Amet, quis urna, a eu.
        </p>
        <button class="voir_plus">VOIR PLUS -></button>
    </div>
    <div class=" img">
        <img src="./img/top-page_litterature.jpg" alt="TeloCulture">
    </div>
</section>

<section id="nouveautes" class="splide" aria-label="Splide Basic HTML Example">
    <h2>Nouveautés !</h2>
    <div class="splide__track">
        <ul class="splide__list">
            <li class="splide__slide">
                <div>
                    <img src="./img/top-page_litterature.jpg" alt="TeloCulture">
                    <div class="infos">
                        <h5>Paradoxe. 1</h5>
                        <h6>MARAZANO, RICHARD</h6>
                    </div>
                </div>
            </li>
            <li class="splide__slide">
                <div>
                    <img src="./img/top-page_litterature.jpg" alt="TeloCulture">
                    <div class="infos">
                        <h5>Paradoxe. 2</h5>
                        <h6>MARAZANO, RICHARD</h6>
                    </div>
                </div>
            </li>
            <li class="splide__slide">
                <div>
                    <img src="./img/top-page_litterature.jpg" alt="TeloCulture">
                    <div class="infos">
                        <h5>Paradoxe. 3</h5>
                        <h6>MARAZANO, RICHARD</h6>
                    </div>
                </div>
            </li>
            <li class="splide__slide">
                <div>
                    <img src="./img/top-page_litterature.jpg" alt="TeloCulture">
                    <div class="infos">
                        <h5>Paradoxe. 4</h5>
                        <h6>MARAZANO, RICHARD</h6>
                    </div>
                </div>
            </li>
            <li class="splide__slide">
                <div>
                    <img src="./img/top-page_litterature.jpg" alt="TeloCulture">
                    <div class="infos">
                        <h5>Paradoxe. 5</h5>
                        <h6>MARAZANO, RICHARD</h6>
                    </div>
                </div>
            </li>
            <li class="splide__slide">
                <div>
                    <img src="./img/top-page_litterature.jpg" alt="TeloCulture">
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
            <img src="./img/fleche_droite.svg" alt="TeloCulture">
        </div>
        <div class="splide__arrow splide__arrow--next">
            <img src="./img/fleche_gauche.svg" alt="TeloCulture">
        </div>
    </div>

    <button class="voir_plus">VOIR PLUS -></button>
</section>

<section id="coups_de_coeur" class="splide" aria-label="Splide Basic HTML Example">
    <h2>Coups de coeur !</h2>

    <div class="splide__track">
        <ul class="splide__list">
            <li class="splide__slide">
                <div>
                    <img src="./img/top-page_litterature.jpg" alt="TeloCulture">
                    <div class="infos">
                        <h5>Paradoxe. 1</h5>
                        <h6>MARAZANO, RICHARD</h6>
                    </div>
                </div>
            </li>
            <li class="splide__slide">
                <div>
                    <img src="./img/top-page_litterature.jpg" alt="TeloCulture">
                    <div class="infos">
                        <h5>Paradoxe. 2</h5>
                        <h6>MARAZANO, RICHARD</h6>
                    </div>
                </div>
            </li>
            <li class="splide__slide">
                <div>
                    <img src="./img/top-page_litterature.jpg" alt="TeloCulture">
                    <div class="infos">
                        <h5>Paradoxe. 3</h5>
                        <h6>MARAZANO, RICHARD</h6>
                    </div>
                </div>
            </li>
            <li class="splide__slide">
                <div>
                    <img src="./img/top-page_litterature.jpg" alt="TeloCulture">
                    <div class="infos">
                        <h5>Paradoxe. 4</h5>
                        <h6>MARAZANO, RICHARD</h6>
                    </div>
                </div>
            </li>
            <li class="splide__slide">
                <div>
                    <img src="./img/top-page_litterature.jpg" alt="TeloCulture">
                    <div class="infos">
                        <h5>Paradoxe. 5</h5>
                        <h6>MARAZANO, RICHARD</h6>
                    </div>
                </div>
            </li>
            <li class="splide__slide">
                <div>
                    <img src="./img/top-page_litterature.jpg" alt="TeloCulture">
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
            <img src="./img/fleche_droite.svg" alt="TeloCulture">
        </div>
        <div class="splide__arrow splide__arrow--next">
            <img src="./img/fleche_gauche.svg" alt="TeloCulture">
        </div>
    </div>
    <button class="voir_plus">VOIR PLUS -></button>
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

<script src="./js/splide-4.1.3/dist/js/splide.min.js"></script>
<script src="./js/litterature.js"></script>

@endsection