@extends('layout')

@section('content')

<section id="principale_infos">
    <img class="img_article" src="./img/details_article.jpg" alt="TeloCulture">
    <div class="infos">
        <h6 class="type">- BD ou manga</h6>
        <h2>Paradoxe. 1</h2>
        <h3>MARAZANO, RICHARD</h3>
        <p>Collection - 2023</p>
        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in hendrerit urna.
            Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris. Maecenas
            vitae mattis tellus. Nullam quis imperdiet augue. Vestibulum auctor ornare leo, non suscipit
            magna interdum eu. Curabitur pellentesque nibh nibh, at maximus ante.</p>
    </div>
    <div id="panier">
        <div class="disponibilite">
            <img src="./img/disponibilite.svg" alt="TeloCulture">
            <h6>Exemplaire disponible dans le réseau</h6>
        </div>
        <button class="panier">AJOUTER AU PANIER -></button>
    </div>
</section>

<section id="secondaire_infos">
    <div class="choix">
        <button id="btn-description" class="active">Description</button>
        <button id="btn-sujet">Sujet</button>
    </div>
    <div id="description">
        <div class="content_description">
            <div class="titre">
                <h5>Type de document</h5>
                <h5>Description physique</h5>
                <h5>Type de Langue</h5>
                <h5>Public visé</h5>
            </div>
            <div class="contenue">
                <h5>Album illustré jeunesse</h5>
                <h5>1 vol. (26 p.) ; illustrations en couleur ; 22 x 22 cm</h5>
                <h5>français</h5>
                <h5>Jeunesse</h5>
            </div>
        </div>
    </div>
    <div id="sujet" class="hidden">
        <div class="content_sujet">
            <h1>Partie sujet !!!</h1>
        </div>
    </div>
</section>
<script src="./js/details_article.js"></script>

@endsection