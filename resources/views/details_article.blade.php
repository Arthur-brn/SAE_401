@extends('layout')

@section('content')

<section id="principale_infos">
    <img class="img_article" id="articlePicture">
    <div class="infos">
        <h6 class="type" id="articleCat"></h6>
        <h2 id="articleTitle"></h2>
        <h3 id="articleAuthor"></h3>
        <p id="articleYear"></p>
        <p id="articleSummary" style="text-align:justify"></p>
    </div>
    <div id="panier">
        <div class="disponibilite">
            <img src="../assets/img/disponibilite.svg" alt="TeloCulture">
            <h6 id="articleAvailbleNum"></h6>
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
                <h5>Disponible en </h5>
                <h5>Public visé</h5>
                <h5>Style</h5>
                <h5 id="changingHeader"></h5>
            </div>
            <div class="contenue">
                <h5 id="articleType"></h5>
                <h5 id="articleLenght"></h5>
                <h5 id="articleLanguage"></h5>
                <h5 id="articleTarget">Jeunesse</h5>
                <h5 id="articleStyle"></h5>
                <h5 id="articleEditor"></h5>
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
        const author = document.getElementById('articleAuthor');
        const year = document.getElementById('articleYear');
        const summary = document.getElementById('articleSummary');
        const availableNum = document.getElementById('articleAvailbleNum');
        const length = document.getElementById('articleLenght');
        const type = document.getElementById('articleType');
        const language = document.getElementById('articleLanguage');
        const changingHeader = document.getElementById('changingHeader');
        const editor = document.getElementById('articleEditor');
        const style = document.getElementById('articleStyle');

        if(articleType && articleType == "book"){
            fetchBookInfos(articleId);
        }
        else if(articleType && articleType == "film"){
            fetchFilmInfos(articleId);
        }

        async function fetchBookInfos(id) {
            try {
                const response = await fetch('/api/books/'+id);
                const book = await response.json();
                picture.setAttribute('src', '../assets/img/livres/'+book.picture);
                title.innerHTML = book.title;
                try {
                    const authorResponse = await fetch('/api/author/'+book.author_id);
                    const authorName = await authorResponse.json();
                    author.innerHTML = authorName.name.toUpperCase();
                } catch (error) {
                    console.error('Error fetching author data:', error);
                }
                year.innerHTML = "Collection - " +book.edition_year;
                summary.innerHTML = book.summary;
                try {
                    const avNumResponse = await fetch('/api/bookLoans/'+book.id);
                    const avNum = await avNumResponse.json();
                    if(book.copy_number - avNum > 0){
                        availableNum.innerHTML = (book.copy_number - avNum)+" exemplaire(s) disponible(s) dans le réseau";
                    }
                    else {
                        availableNum.innerHTML = "Aucun exemplaire disponible dans le réseau";
                    }
                } catch (error) {
                    console.error('Error fetching data:', error);
                }
                try {
                    const langResponse = await fetch('/api/language/'+book.language_id);
                    const lang = await langResponse.json();
                    language.innerHTML = lang.name;
                    
                } catch (error) {
                    console.error('Error fetching data:', error);
                }
                length.innerHTML = "1 vol. ("+book.page_number+" p.)";
                type.innerHTML = book.type.charAt(0).toUpperCase() + book.type.slice(1);
                try {
                    const editorResponse = await fetch('/api/editor/'+book.editor_id);
                    const editorName = await editorResponse.json();
                    changingHeader.innerHTML = "Editeur";
                    editor.innerHTML = editorName.name;
                    
                } catch (error) {
                    console.error('Error fetching data:', error);
                }
                style.innerHTML = book.style.charAt(0).toUpperCase() + book.style.slice(1);
            } catch (error) {
                console.error('Error fetching books data:', error);
            }
        }

        async function fetchFilmInfos(id) {
            try {
                const response = await fetch('/api/films/'+id);
                const film = await response.json();
                picture.setAttribute('src', '../assets/img/dvd/'+film.picture);
                title.innerHTML = film.title;
                try {
                    const directorResponse = await fetch('/api/director/'+film.director_id);
                    const directorName = await directorResponse.json();
                    author.innerHTML = directorName.name.toUpperCase();
                } catch (error) {
                    console.error('Error fetching author data:', error);
                }
                year.innerHTML = "Collection - " +film.year;
                summary.innerHTML = film.summary;
                try {
                    const avNumResponse = await fetch('/api/filmLoans/'+film.id);
                    const avNum = await avNumResponse.json();
                    if(film.copy_number - avNum > 0){
                        availableNum.innerHTML = (film.copy_number - avNum)+" exemplaire(s) disponible(s) dans le réseau";
                    }
                    else {
                        availableNum.innerHTML = "Aucun exemplaire disponible dans le réseau";
                    }
                } catch (error) {
                    console.error('Error fetching data:', error);
                }
                try {
                    const langResponse = await fetch('/api/filmLanguages/'+film.id);
                    const langs = await langResponse.json();
                    language.innerHTML = "Audio : ";
                    langs.forEach(async (lang) => {
                        try {
                            const langDetail = await fetch('/api/language/'+lang.language_id);
                            const langName = await langDetail.json();
                            language.innerHTML += langName.name + " ";
                            
                        } catch (error) {
                            console.error('Error fetching data:', error);
                        }
                    })
                } catch (error) {
                    console.error('Error fetching data:', error);
                }
                try {
                    const subResponse = await fetch('/api/filmSubtitles/'+film.id);
                    const subs = await subResponse.json();
                    language.innerHTML += "| Sous-titres : ";
                    subs.forEach(async (sub) => {
                        try {
                            const subDetail = await fetch('/api/language/'+sub.language_id);
                            const subName = await subDetail.json();
                            language.innerHTML += subName.name + " ";
                            
                        } catch (error) {
                            console.error('Error fetching data:', error);
                        }
                    })
                } catch (error) {
                    console.error('Error fetching data:', error);
                }
                length.innerHTML = "1 dvd. ("+(film.duration-film.duration%60)/60+"h"+film.duration%60+"min)";
                type.innerHTML = "Film";
                style.innerHTML = film.style.charAt(0).toUpperCase() + film.style.slice(1);
                changingHeader.innerHTML = "Casting";
                try {
                    const castingResponse = await fetch('/api/casting/'+film.id);
                    const casting = await castingResponse.json();
                    casting.forEach(async (cast) => {
                        try {
                            const actorResponse = await fetch('/api/actor/'+cast.actor_id);
                            const actor = await actorResponse.json();
                            editor.innerHTML += actor.name + ", ";
                        } catch (error) {
                            console.error('Error fetching data:', error);
                        }
                    })
                    
                } catch (error) {
                    console.error('Error fetching data:', error);
                }
            } catch (error) {
                console.error('Error fetching books data:', error);
            }
        }
    });
</script>

@endsection