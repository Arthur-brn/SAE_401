<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $fileCss }}</title>
    <link rel="stylesheet" href="./css/layout.css" />
    <link rel="stylesheet" href="./css/{{ $fileCss }}.css" />
    <link rel="stylesheet" href="./css/app.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/cc30acfb71.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>

    <script src="./js/{{ $fileJS }}.js"></script>
</head>

<body x-data="{burgerOpen: false}">
    <div id="headerTop">
        <div id="topL">
            <img src="../assets/img/logo.png" alt="" />
            <p>TELOCULTURE</p>
        </div>
        <div id="topR">
            <i @click="burgerOpen = true" class="fa-solid fa-bars fa-xl" style="color: #6887f6;"></i>
            <a href="#">
                <img class="icon" src="./assets/icons/heart.png" alt="">
                <p>FAVORIS</p>
            </a>
            <a href="/panier">
                <img class="icon" src="./assets/icons/cart.png" alt="">
                <p>PANIER</p>
            </a>
            <a href="/account">
                <img class="icon" src="./assets/icons/user.png" alt="">
                <p>COMPTE</p>
            </a>
        </div>
    </div>
    <hr />
    <div id="headerBot">
        <a href="/" class="{{ Request::is('/') ? 'select' : '' }}">ACCUEIL</a>
        <a href="/litterature" class="{{ Request::is('litterature') ? 'select' : '' }}">LITTÉRATURE</a>
        <a href="/cinema" class="{{ Request::is('cinema') ? 'select' : '' }}">CINÉMA</a>
        <a href="/tendances" class="{{ Request::is('tendances') ? 'select' : '' }}">TENDANCES</a>
        <a href="/contact" class="{{ Request::is('contact') ? 'select' : '' }}">CONTACTEZ-NOUS</a>
    </div>
    <div id="burger" x-show="burgerOpen" x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-1000" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90" @click.away="burgerOpen = false">
        <div>
            <i @click="burgerOpen = false" class="fa-solid fa-xmark fa-xl" style="color: #6887f6;"></i>
        </div>
        <ul>
            <li>
                <a href="">
                    <p>FAVORIS</p>
                </a>
            </li>
            <li>
                <a href="">
                    <p>PANIER</p>
                </a>
            </li>
            <li>
                <a href="">
                    <p>COMPTE</p>
                </a>
            </li>
            <li>
                <a href="">
                    <p>LITTÉRATURE</p>
                </a>
            </li>
            <li>
                <a href="">
                    <p>CINÉMA</p>
                </a>
            </li>
            <li>
                <a href="">
                    <p>TENDANCES</p>
                </a>
            </li>
            <li>
                <a href="">
                    <p>CONTACTEZ</p>
                </a>
            </li>
        </ul>
    </div>
    <main>
        @yield('content')
    </main>
    <footer>
        <div>
            <div id="footer_left">
                <p>TELOCULTURE</p>
                <p>Nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                <div id="icons">
                    <i class="fa-brands fa-facebook fa-3x" style="color: #ff625c;"></i>
                    <i class="fa-brands fa-linkedin fa-3x" style="color: #ff625c;"></i>
                    <i class="fa-brands fa-twitter fa-3x" style="color: #ff625c;"></i>
                    <i class="fa-brands fa-youtube fa-3x" style="color: #ff625c;"></i>
                </div>
            </div>
            <div id="footer_right">
                <div>
                    <p id="footer_title">Catégories</p>
                    <a href="#">ACCUEIL</a>
                    <a href="#">LITTÉRATURE</a>
                    <a href="#">CINÉMA</a>
                    <a href="#">CONTACT</a>
                    <a href="#">CONTACTEZ-NOUS</a>
                </div>
            </div>
        </div>
        <div id="footer_bot">
            <p>© 2024 . All Rights Reserved.</p>
            <p><span>Privacy</span> | Terms of Service</p>
        </div>
    </footer>
</body>

</html>