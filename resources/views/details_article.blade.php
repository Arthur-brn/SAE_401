@extends('layout')

@section('content')

<section id="principale_infos">
    <img class="img_article" id="articlePicture">
    <div class="infos">
        <h6 class="type" id="articleCat">- BD ou manga</h6>
        <h2 id="articleTitle"></h2>
        <h3 id="articleAuthor">MARAZANO, RICHARD</h3>
        <p id="articleYear"></p>
        <p id="articleSummary"></p>
    </div>
    <div id="panier">
        <div class="disponibilite">
            <img src="./img/disponibilite.svg" alt="TeloCulture">
            <h6 id="articleAvailbleNum">Exemplaire disponible dans le réseau</h6>
        </div>
        <button class="panier">AJOUTER AU PANIER -></button>
    </div>
</section>

<section id="secondaire_infos">
    <div class="choix">
        <button id="btn-description" class="active">Description</button>
    </div>
    <div id="description">
        <div class="content_description">
            <div class="titre">
                <h5>Type de document</h5>
                <h5>Description physique</h5>
                <h5>Type de Langue</h5>
                <h5>Public visé</h5>
                <h5>Editeur</h5>
                <h5>Style</h5>
            </div>
            <div class="contenue">
                <h5 id="articleType"></h5>
                <h5 id="articleLenght"></h5>
                <h5 id="articleLanguage">français</h5>
                <h5 id="articleTarget">Jeunesse</h5>
                <h5 id="articleEditor"></h5>
                <h5 id="articleStyle"></h5>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const articleId = "{{$id}}";
        const articleType = "{{$type}}";

        const picture = document.getElementById('articlePicture');
        const title = document.getElementById('articleTitle');
        const year = document.getElementById('articleYear');
        const summary = document.getElementById('articleSummary');
        const length = document.getElementById('articleLenght');
        const type = document.getElementById('articleType');
        const style = document.getElementById('articleStyle');

        if(articleType && articleType == "book"){
            fetchBookInfos(articleId);
        }
        else if(articleType && articleType == "film"){
            fetch('/api/films/'+articleId)
                .then(response => response.json())
                .then(film => {
                    console.log(film);
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }

        async function fetchBookInfos(id) {
            try {
                const response = await fetch('/api/books/'+id);
                const book = await response.json();
                picture.setAttribute('src', '../assets/img/livres/'+book.picture);
                title.innerHTML = book.title;
                year.innerHTML = "Collection - " +book.edition_year;
                summary.innerHTML = book.summary;
                length.innerHTML = "1 vol. ("+book.page_number+" p.)";
                type.innerHTML = book.type;
                style.innerHTML = book.style;
            } catch (error) {
                console.error('Error fetching books data:', error);
            }
        }
    });
</script>

@endsection