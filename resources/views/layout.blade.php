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
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v1.9.8/dist/alpine.js" defer></script>
</head>

<body>
    <div id="headerTop">
        <div id="topL">
            <img src="../assets/img/logo.png" alt="" />
            <p>TELOCULTURE</p>
        </div>
        <div id="topR">
            <a href="#">
                <img class="icon" src="./assets/icons/heart.png" alt="">
                <p>FAVORIS</p>
            </a>
            <a href="#">
                <img class="icon" src="./assets/icons/cart.png" alt="">
                <p>PANIER</p>
            </a>
            <a href="#">
                <img class="icon" src="./assets/icons/user.png" alt="">
                <p>COMPTE</p>
            </a>
        </div>
    </div>
    <hr />
    <div id="headerBot">
        <a href="#" class="select">ACCUEIL</a>
        <a href="#">LITTÉRATURE</a>
        <a href="#">CINÉMA</a>
        <a href="#">MUSIQUES</a>
        <a href="#">TENDANCES</a>
        <a href="#">CONTACTEZ-NOUS</a>
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
                <p id="footer_title">Catégories</p>
                <a href="#">ACCUEIL</a>
                <a href="#">LITTÉRATURE</a>
                <a href="#">CINÉMA</a>
                <a href="#">CONTACT</a>
                <a href="#">CONTACTEZ-NOUS</a>
            </div>
        </div>
        <div id="footer_bot">
            <p>© 2024 . All Rights Reserved.</p>
            <p><span>Privacy</span> | Terms of Service</p>
        </div>
    </footer>
</body>

</html>