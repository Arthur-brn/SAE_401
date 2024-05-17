<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ $fileCss }}</title>
        <link rel="stylesheet" href="./css/header.css" />
        <link rel="stylesheet" href="./css/{{ $fileCss }}.css" />
        <link rel="stylesheet" href="./css/app.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap"
            rel="stylesheet"
        />
        <script
            src="https://kit.fontawesome.com/cc30acfb71.js"
            crossorigin="anonymous"
        ></script>
    </head>
    <body>
        <div id="headerTop">
            <div id="topL">
                <img src="../assets/img/logo.png" alt="" />
                <p>TELOCULTURE</p>
            </div>
            <div id="topR">
                <a href="#">
                    <img class="icon" src="./assets/icons/user.png" alt="">
                    <p>COMPTE</p>
                </a>
                <a href="#">
                    <img class="icon" src="./assets/icons/heart.png" alt="">
                    <p>FAVORIS</p>
                </a>
                <a href="#">
                    <img class="icon" src="./assets/icons/cart.png" alt="">
                    <p>PANIER</p>
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

        </footer>
    </body>
</html>
