@extends('layout')

@section('content')

<section id="principale_infos">
    <img class="img_article" id="articlePicture">
    <div class="infos">
        <h6 class="type" id="articleType"></h6>
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
        <button class="panier" id="addToCart">AJOUTER AU PANIER <img src="../assets/img/voir_plus.svg" alt="Teloculture"></button>
    </div>
</section>

<section id="secondaire_infos">
    <div class="container" x-data="{ tab : 'tab1' }">
        <ul id="tabs">
            <li>
                <a href="#" @click.prevent="tab = 'tab1'" :class="{ 'tab_selected' : tab === 'tab1' }">Description</a>
            </li>
            <li>
                <a href="#" @click.prevent="tab = 'tab2'" :class="{ 'tab_selected' : tab === 'tab2' }">Avis</a>
            </li>
        </ul>
        <div class="content">
            <div x-show="tab === 'tab1'">
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
            </div>
            <div x-show="tab === 'tab2'" id="comments">
                <form action="">
                    <textarea name="review_content" id="review_content" placeholder="Rentrez votre commentaire ici !"></textarea>
                    <div id="buttons">
                        <div class="rating_zone">
                            <label for="review_mark">Note /5 :</label>
                            <input style="width: 100%;" type="number" max="5" min="0" name="review_mark" id="review_mark">
                        </div>
                        <input type="submit" value="Envoyer !">
                        <button id="cancelButton">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", async function() {
        const articleId = "{{$id}}";
        const articleType = "{{$type}}";

        const userId = sessionStorage.getItem('userId');

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
        const reviewSection = document.getElementById('comments');
        const addReviewForm = document.getElementById('addReviewForm');
        const addToCartBtn = document.getElementById('addToCart');

        if (articleType && articleType == "Book") {
            await fetchBookInfos(articleId);
        } else if (articleType && articleType == "Film") {
            await fetchFilmInfos(articleId);
        }
        await fetchArticleReview(articleId, articleType);
        await displayCartButton();

        async function fetchBookInfos(id) {
            try {
                const response = await fetch('/api/books/' + id);
                const book = await response.json();
                picture.setAttribute('src', '../assets/img/livres/' + book.picture);
                title.innerHTML = book.title;
                try {
                    const authorResponse = await fetch('/api/author/' + book.author_id);
                    const authorName = await authorResponse.json();
                    author.innerHTML = authorName.name.toUpperCase();
                } catch (error) {
                    console.error('Error fetching author data:', error);
                }
                year.innerHTML = "Collection - " + book.edition_year;
                summary.innerHTML = book.summary;
                try {
                    const avNumResponse = await fetch('/api/bookLoans/' + book.id);
                    const avNum = await avNumResponse.json();
                    if (book.copy_number - avNum > 0) {
                        availableNum.innerHTML = (book.copy_number - avNum) + " exemplaire(s) disponible(s) dans le réseau";
                    } else {
                        availableNum.innerHTML = "Aucun exemplaire disponible dans le réseau";
                    }
                } catch (error) {
                    console.error('Error fetching data:', error);
                }
                try {
                    const langResponse = await fetch('/api/language/' + book.language_id);
                    const lang = await langResponse.json();
                    language.innerHTML = lang.name;

                } catch (error) {
                    console.error('Error fetching data:', error);
                }
                length.innerHTML = "1 vol. (" + book.page_number + " p.)";
                type.innerHTML = "- " + book.type.charAt(0).toUpperCase() + book.type.slice(1);
                try {
                    const editorResponse = await fetch('/api/editor/' + book.editor_id);
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
                const response = await fetch('/api/films/' + id);
                const film = await response.json();
                picture.setAttribute('src', '../assets/img/dvd/' + film.picture);
                title.innerHTML = film.title;
                try {
                    const directorResponse = await fetch('/api/director/' + film.director_id);
                    const directorName = await directorResponse.json();
                    author.innerHTML = directorName.name.toUpperCase();
                } catch (error) {
                    console.error('Error fetching author data:', error);
                }
                year.innerHTML = "Collection - " + film.year;
                summary.innerHTML = film.summary;
                try {
                    const avNumResponse = await fetch('/api/filmLoans/' + film.id);
                    const avNum = await avNumResponse.json();
                    if (film.copy_number - avNum > 0) {
                        availableNum.innerHTML = (film.copy_number - avNum) + " exemplaire(s) disponible(s) dans le réseau";
                    } else {
                        availableNum.innerHTML = "Aucun exemplaire disponible dans le réseau";
                    }
                } catch (error) {
                    console.error('Error fetching data:', error);
                }
                try {
                    const langResponse = await fetch('/api/filmLanguages/' + film.id);
                    const langs = await langResponse.json();
                    language.innerHTML = "Audio : ";
                    langs.forEach(async (lang) => {
                        try {
                            const langDetail = await fetch('/api/language/' + lang.language_id);
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
                    const subResponse = await fetch('/api/filmSubtitles/' + film.id);
                    const subs = await subResponse.json();
                    language.innerHTML += "| Sous-titres : ";
                    subs.forEach(async (sub) => {
                        try {
                            const subDetail = await fetch('/api/language/' + sub.language_id);
                            const subName = await subDetail.json();
                            language.innerHTML += subName.name + " ";

                        } catch (error) {
                            console.error('Error fetching data:', error);
                        }
                    })
                } catch (error) {
                    console.error('Error fetching data:', error);
                }
                length.innerHTML = "1 dvd. (" + (film.duration - film.duration % 60) / 60 + "h" + film.duration % 60 + "min)";
                type.innerHTML = "- " + film.type.charAt(0).toUpperCase() + film.type.slice(1);
                style.innerHTML = film.style.charAt(0).toUpperCase() + film.style.slice(1);
                changingHeader.innerHTML = "Casting";
                try {
                    const castingResponse = await fetch('/api/casting/' + film.id);
                    const casting = await castingResponse.json();
                    casting.forEach(async (cast) => {
                        try {
                            const actorResponse = await fetch('/api/actor/' + cast.actor_id);
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

        async function fetchArticleReview(id, type){
            try {
                let reviewResponse;
                if(type == "Book"){
                    reviewResponse = await fetch('/api/bookReview/'+id);
                }
                else{
                    reviewResponse = await fetch('/api/filmReview/'+id);
                }
                const reviews = await reviewResponse.json();
                reviews.forEach(async (review) => {
                    const line = document.createElement('div');
                    try{
                        const userResponse = await fetch('/api/user/'+review.user_id);
                        const user = await userResponse.json();
                        const userName = document.createElement('div');
                        userName.innerHTML = user.first_name+" "+user.last_name+ " - "+review.review_mark+"/5";
                        userName.classList.add('first_name');
                        const reviewContent = document.createElement('div');
                        reviewContent.innerHTML = review.review_content;
                        reviewContent.classList.add('comment_content');
                        line.appendChild(userName);
                        line.appendChild(reviewContent);
                    } catch (error) {
                        console.error('Error fetching data:', error);
                    }
                    reviewSection.appendChild(line);
                })

            } catch (error) {
                console.error('Error fetching data:', error);
            }
        }

        async function displayCartButton(){
            if(!userId){
                addToCartBtn.innerHTML = "Connectez-vous pour ajouter au panier !";
            }
            else if(availableNum.innerHTML == "Aucun exemplaire disponible dans le réseau"){
                addToCartBtn.innerHTML = "Impossible d'ajouter l'article au panier !";
            }
            else{
                try{
                    checkData = new FormData();
                    checkData.set('loanable_type', 'App\\Models\\'+articleType);
                    checkData.set('loanable_id', articleId);
                    checkData.set('user_id', userId);
                    const loansResponse = await fetch('/api/checkLoans', {
                        method: 'POST',
                        body: checkData
                    })
                    const loans = await loansResponse.json();
                    if(Object.keys(loans).length === 0){
                        addToCartBtn.addEventListener('click', async function(){
                            const formData = new FormData();
                            const date = new Date().toISOString().split('T')[0];
                            formData.set('loanable_type', 'App\\Models\\'+articleType);
                            formData.set('loanable_id', articleId);
                            formData.set('user_id', userId);
                            try{
                                const bookingNumResponse = await fetch('/api/checkCart/'+userId)
                                const bookingNum = await bookingNumResponse.json();
                                if(bookingNum != '')
                                {
                                    formData.set('booking_number', bookingNum.booking_number);
                                }
                                else{
                                    formData.set('booking_number', generateRandomString(10));
                                }
                            }catch (error) {
                                console.error('Error fetching author data:', error);
                            }
                            formData.set('start_date', date);
                            formData.set('status', 'add_to_cart');
                            try{
                                const bookingResponse = await fetch('/api/loans', {
                                    method: 'POST',
                                    body: formData
                                })
                                const booking = await bookingResponse.json();
                                window.location.href = "";
                            }catch (error) {
                                console.error('Error fetching author data:', error);
                            }
                        });
                    }
                    else{
                        addToCartBtn.innerHTML = "Vous avez déjà réservé cet article !";
                    }
                } catch (error) {
                    console.error('Error fetching data:', error);
                }
                
            }
        }

        function generateRandomString(length) {
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            let result = '';
            const charactersLength = characters.length;
            
            for (let i = 0; i < length; i++) {
                const randomIndex = Math.floor(Math.random() * charactersLength);
                result += characters.charAt(randomIndex);
            }
            
            return result;
        }
    });
</script>

@endsection