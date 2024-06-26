@extends('layout')

@section('content')
<h2>Documents dans le réseau</h2>
<div class="container" x-data="{ tab : 'tab1' }">
    <ul id="tabs">
        <li>
            <a href="#" @click.prevent="tab = 'tab1'" :class="{ 'tab_selected' : tab === 'tab1' }">Liste des documents</a>
        </li>
        <li>
            <a href="#" @click.prevent="tab = 'tab2'" :class="{ 'tab_selected' : tab === 'tab2' }">Ajout de livre</a>
        </li>
        <li>
            <a href="#" @click.prevent="tab = 'tab3' " :class="{ 'tab_selected' : tab === 'tab3' }">Ajout de film</a>
        </li>

        <li>
            <a href="#" @click.prevent="tab = 'tab4'" :class="{ 'tab_selected' : tab === 'tab4' }">Modification de document</a>
        </li>
    </ul>
    <div class="content">
        <div x-show="tab === 'tab1'">
            <div>
                <p>Rechercher un document :</p>
                <input type="text" name="" id="itemListFilter" placeholder="Titre du document">
            </div>
            <table id="itemList">
                <thead>
                    <tr>
                        <td>Titre</td>
                        <td>Type de document</td>
                        <td>Auteur/réalisateur</td>
                        <td>Nombre d'exemplaire</td>
                        <td>Nombre disponible</td>
                        <td>Suppression</td>
                    </tr>
                </thead>
                <tr id="loadingBooksFilms">
                    <td colspan="6" 
                        style="text-align:center">
                        Récupération des données en cours...
                    </td>
                </tr>
            </table>
        </div>
        <div x-show="tab === 'tab2'">
            <form id="addBookForm">
                <div>
                    <label for="title">Titre du livre :</label>
                    <input type="text" id="title" name="title">
                </div>
                <div>
                    <label for="author_id">Auteur :</label>
                    <select name="author_id" id="author_id">
                        <option value="">Choisir l'auteur</option>
                    </select>
                    <input type="text" id="newAuthor" name="newAuthor" placeholder="Nouvel auteur">
                </div>
                <div>
                    <label for="editor_id">Edition:</label>
                    <select name="editor_id" id="editor_id">
                        <option value="">Choisir l'éditeur</option>
                    </select>
                    <input type="text" id="newEditor" name="newEditor" placeholder="Nouvel éditeur">
                </div>
                <div>
                    <label for="edition_year">Année d'édition:</label>
                    <input type="number" id="edition_year" name="edition_year">
                </div>
                <div>
                    <label for="page_number">Page Number:</label>
                    <input type="number" id="page_number" name="page_number">
                </div>
                <div>
                    <label for="language_id">Langue:</label>
                    <select name="language_id" id="language_id">
                        <option value="">Choisir la langue</option>
                    </select>
                </div>
                <div>
                    <label for="summary">Résumé :</label>
                    <textarea id="summary" name="summary"></textarea>
                </div>
                <div>
                    <label for="type">Type de livre :</label>
                    <select id="type" name="type">
                        <option value="">Choisir le type</option>
                        <option value="roman">Roman</option>
                        <option value="bd et manga">BD et Manga</option>
                        <option value="jeunesse">Jeunesse</option>
                        <option value="poésie">Poésie</option>
                        <option value="biographie">Biographie</option>
                        <option value="actualité">Actualité</option>
                    </select>
                </div>
                <div>
                    <label for="style">Style:</label>
                    <select id="style" name="style">
                        <option value="">Choisir le style</option>
                        <option value="fantastique">Fantastique</option>
                        <option value="romantique">Romantique</option>
                        <option value="science-fiction">Science-fiction</option>
                        <option value="policier">Policier</option>
                    </select>
                </div>
                <div>
                    <label for="picture">Image :</label>
                    <input type="file" id="picture" name="picture" accept=".png, .jpg, .jpeg">
                </div>
                <div>
                    <label for="copy_number">Nombre d'exemplaire :</label>
                    <input type="number" id="copy_number" name="copy_number">
                </div>
                <button type="submit">Ajouter</button>
            </form>
        </div>
        <div x-show="tab === 'tab3'">
            <form id="addFilmForm">
                <div>
                    <label for="title">Titre du film :</label>
                    <input type="text" id="title" name="title">
                </div>
                <div>
                    <label for="picture">Image :</label>
                    <input type="file" id="picture" name="picture" accept=".png, .jpg, .jpeg">
                </div>
                <div>
                    <label for="actors">Acteurs :</label>
                    <select name="actors" id="actors" multiple></select>
                </div>
                <div>
                    <label for="director_id">Réalisateur :</label>
                    <select name="director_id" id="director_id">
                        <option value="">Choisir le réalisateur</option>
                    </select>
                    <input type="text" id="newDirector" name="newDirector" placeholder="Nouveau Réalisateur">
                </div>
                <div>
                    <label for="style">Style:</label>
                    <select id="style" name="style">
                        <option value="">Choisir le style</option>
                        <option value="fantastique">Fantastique</option>
                        <option value="romantique">Romantique</option>
                        <option value="science-fiction">Science-fiction</option>
                        <option value="policier">Policier</option>
                    </select>
                </div>
                <div>
                    <label for="age_limit">Age limite :</label>
                    <input type="number" id="age_limit" name="age_limit">
                </div>
                <div>
                    <label for="summary">Résumé :</label>
                    <textarea id="summary" name="summary"></textarea>
                </div>
                <div>
                    <label for="duration">Durée du film :</label>
                    <input type="number" id="duration" name="duration">
                </div>
                <div>
                    <label for="year">Année du film :</label>
                    <input type="number" id="year" name="year">
                </div>
                <div>
                    <label for="audioLanguages">Langue(s) audio :</label>
                    <select name="audioLanguages" id="audioLanguages" multiple></select>
                </div>
                <div>
                    <label for="subLanguages">Langue(s) des sous-titres :</label>
                    <select name="subLanguages" id="subLanguages" multiple></select>
                </div>
                <div>
                    <label for="type">Type de livre :</label>
                    <select id="type" name="type">
                        <option value="">Choisir le type</option>
                        <option value="long métrage">Long métrage</option>
                        <option value="série">Série</option>
                        <option value="film animation">Film d'animation</option>
                        <option value="court métrage">Court-métrage</option>
                        <option value="reportage">Reportage</option>
                    </select>
                </div>
                <div>
                    <label for="copy_number">Nombre d'exemplaire :</label>
                    <input type="number" id="copy_number" name="copy_number">
                </div>
                <button type="submit">Ajouter</button>
            </form>
        </div>
        <div x-show="tab === 'tab4'">
            <div>
                <div>
                    <p>Rechercher un document :</p>
                    <input type="text" name="" id="itemModifyFilter" placeholder="Titre du document">
                </div>
                <table id="modifyList">
                    <thead>
                        <tr>
                            <td>Titre</td>
                            <td>Type de document</td>
                            <td>Nombre d'exemplaire</td>
                        </tr>
                    </thead>
                    <tr id="loadingModifyTable">
                        <td colspan="3" 
                            style="text-align:center">
                            Récupération des données en cours...
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<h2>Les réservations</h2>
<div class="container" x-data="{ tab : 'tab1' }">
    <ul id="tabs">
        <li>
            <a href="#" @click.prevent="tab = 'tab1'" :class="{ 'tab_selected' : tab === 'tab1' }">Réservations en cours</a>
        </li>
        <li>
            <a href="#" @click.prevent="tab = 'tab2' " :class="{ 'tab_selected' : tab === 'tab2' }">Réservations à venir </a>
        </li>
        <li>
            <a href="#" @click.prevent="tab = 'tab3'" :class="{ 'tab_selected' : tab === 'tab3' }">Réservations passées</a>
        </li>
        <li>
            <a href="#" @click.prevent="tab = 'tab4'" :class="{ 'tab_selected' : tab === 'tab4' }">Modifier une réservation</a>
        </li>
    </ul>
    <div class="content">
        <div x-show="tab === 'tab1'">
            <div>
                <p>Rechercher une réservation :</p>
                <input type="number" name="" id="currentFilter" placeholder="N° de la réservation">
            </div>
            <table id="currentBookings">
                <thead>
                    <tr>
                        <th>Numéro de la réservation</th>
                        <th>Nom</th>
                        <th>Document(s)</th>
                        <th>Date de réservation</th>
                        <th>Date de retour</th>
                        <th>Statut de la réservation</th>
                        <th>Suppression</th>
                    </tr>
                </thead>
                <tr id="loadCurrentBooking">
                    <td colspan="7" 
                        style="text-align:center">
                        Récupération des données en cours...
                    </td>
                </tr>
            </table>
        </div>
        <div x-show="tab === 'tab2'">
            <div>
                <p>Rechercher une réservation :</p>
                <input type="text" name="" id="futureFilter" placeholder="N° de la réservation">
            </div>
            <table id="futureBookings">
                <thead>
                    <tr>
                        <th>Numéro de la réservation</th>
                        <th>Nom</th>
                        <th>Document(s)</th>
                        <th>Date de réservation</th>
                        <th>Date de retour</th>
                        <th>Statut de la réservation</th>
                        <th>Suppression</th>
                    </tr>
                </thead>
                <tr id="loadFutureBooking">
                    <td colspan="7" 
                        style="text-align:center">
                        Récupération des données en cours...
                    </td>
                </tr>
            </table>
        </div>
        <div x-show="tab === 'tab3'">
            <div>
                <p>Rechercher une réservation :</p>
                <input type="text" name="" id="passedFilter" placeholder="N° de la réservation">
            </div>
            <table id="passedBookings">
                <thead>
                    <tr>
                        <th>Numéro de la réservation</th>
                        <th>Nom</th>
                        <th>Document(s)</th>
                        <th>Date de réservation</th>
                        <th>Date de retour</th>
                        <th>Statut de la réservation</th>
                        <th>Suppression</th>
                    </tr>
                </thead>
                <tr id="loadPassedBooking">
                    <td colspan="7" 
                        style="text-align:center">
                        Récupération des données en cours...
                    </td>
                </tr>
            </table>
        </div>
        <div x-show="tab === 'tab4'">
            <div>
                <p>Rechercher une réservation :</p>
                <input type="text" name="" id="modifyFilter" placeholder="N° de la réservation">
            </div>
            <table id="modifyBooking">
                <thead>
                    <tr>
                        <th>Numéro de la réservation</th>
                        <th>Nom</th>
                        <th>Document(s)</th>
                        <th>Statut de la réservation</th>
                    </tr>
                </thead>
                <tr id="loadingModifyBookings">
                    <td colspan="4" 
                        style="text-align:center">
                        Récupération des données en cours...
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div>
    <button id="deconnect" style="margin : auto">Me déconnecter</button>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', async function() {
        const userId = sessionStorage.getItem('userId');
        const userStatus = sessionStorage.getItem('userStatus');
        if(userId)
        {
            if(userStatus && userStatus == "admin"){
                const itemList = document.getElementById('itemList');
                const modifyList = document.getElementById('modifyList');
                const authorSelect = document.getElementById('author_id');
                const editorSelect = document.getElementById('editor_id');
                const directorSelect = document.getElementById('director_id');
                const actorSelect = document.getElementById('actors');
                const bookLanguage = document.getElementById('language_id');
                const audioLanguage = document.getElementById('audioLanguages');
                const subLanguage = document.getElementById('subLanguages');
                const addBookForm = document.getElementById('addBookForm');
                const addFilmForm = document.getElementById('addFilmForm');
                const passedBooking = document.getElementById('passedBookings');
                const futureBooking = document.getElementById('futureBookings');
                const currentBooking = document.getElementById('currentBookings');
                const decoButton = document.getElementById('deconnect');

                decoButton.addEventListener('click', function(){
                    sessionStorage.clear();
                    window.location.href = './account';
                });

                document.getElementById('itemListFilter').addEventListener('input', function(){
                    var input = this.value;
                    const table = document.getElementById('itemList');
                    var filter = input.replace(/ /g, '_');
                    var tr = table.getElementsByTagName('tr');

                    for (var i = 1; i < tr.length; i++) {
                        var rowClass = tr[i].className.toLowerCase();
                        if (rowClass.indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                })

                document.getElementById('itemModifyFilter').addEventListener('input', function(){
                    var input = this.value;
                    const table = document.getElementById('modifyList');
                    var filter = input.replace(/ /g, '_').toLowerCase();
                    var tr = table.getElementsByTagName('tr');

                    for (var i = 1; i < tr.length; i++) {
                        var rowClass = tr[i].className;
                        if (rowClass.indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                })

                document.getElementById('currentFilter').addEventListener('input', function(){
                    var input = this.value;
                    const table = document.getElementById('currentBookings');
                    var filter = input.toLowerCase();
                    var tr = table.getElementsByTagName('tr');

                    for (var i = 1; i < tr.length; i++) {
                        var rowClass = tr[i].className;
                        if (rowClass.indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                })

                document.getElementById('futureFilter').addEventListener('input', function(){
                    var input = this.value;
                    const table = document.getElementById('futureBookings');
                    var filter = input.toLowerCase();
                    var tr = table.getElementsByTagName('tr');

                    for (var i = 1; i < tr.length; i++) {
                        var rowClass = tr[i].className;
                        if (rowClass.indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                })

                document.getElementById('passedFilter').addEventListener('input', function(){
                    var input = this.value;
                    const table = document.getElementById('passedBookings');
                    var filter = input.toLowerCase();
                    var tr = table.getElementsByTagName('tr');

                    for (var i = 1; i < tr.length; i++) {
                        var rowClass = tr[i].className;
                        if (rowClass.indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                })

                document.getElementById('modifyFilter').addEventListener('input', function(){
                    var input = this.value;
                    const table = document.getElementById('modifyBooking');
                    var filter = input.toLowerCase();
                    var tr = table.getElementsByTagName('tr');

                    for (var i = 1; i < tr.length; i++) {
                        var rowClass = tr[i].className;
                        if (rowClass.indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                })

                async function fetchBooksAndDisplay() {
                    try {
                        const response = await fetch('/api/books');
                        const books = await response.json();

                        books.forEach(async (book) => {
                            const line = document.createElement("tr");
                            line.classList.add(book.title.replace(/ /g, '_'));

                            const title = document.createElement('td');
                            title.innerHTML = book.title;

                            const type = document.createElement('td');
                            type.innerHTML = 'Livre';

                            const author = document.createElement('td');
                            try {
                                const authorResponse = await fetch('/api/author/' + book.author_id);
                                const authorData = await authorResponse.json();
                                author.innerHTML = authorData.name;
                            } catch (error) {
                                console.error('Error fetching author data:', error);
                                author.innerHTML = 'Error fetching author';
                            }

                            const number = document.createElement('td');
                            number.innerHTML = book.copy_number;

                            const bookAvailable = document.createElement('td');
                            try {
                                const loanResponse = await fetch('/api/bookLoans/' + book.id);
                                const count = await loanResponse.json();
                                bookAvailable.innerHTML = book.copy_number - count;
                            } catch (error) {
                                console.error('Error fetching loan data:', error);
                                bookAvailable.innerHTML = 'Error fetching availability';
                            }

                            const suppr = document.createElement('td');
                            try{
                                const response = await fetch('/api/checkBook/'+book.id);
                                const data = await response.json();
                                if(data.loanable_id)
                                {
                                    suppr.innerHTML = "Suppression impossible !";
                                }
                                else
                                {
                                    suppr.innerHTML = '<i class="fa-solid fa-trash" style="color: #ff0000;"></i>';
                                    suppr.addEventListener('click', async function(){
                                        try{
                                            const response = await fetch('/api/removeBook/'+book.id);
                                            const data = await response.json();
                                            window.location.href = "./admin";
                                        }catch (error) {
                                            console.error('Error fetching data:', error);
                                        }
                                    });
                                } 
                            } catch (error) {
                                console.error('Error fetching data:', error);
                            }

                            line.appendChild(title);
                            line.appendChild(type);
                            line.appendChild(author);
                            line.appendChild(number);
                            line.appendChild(bookAvailable);
                            line.appendChild(suppr);

                            document.getElementById('itemList').appendChild(line);
                        });
                    } catch (error) {
                        console.error('Error fetching books data:', error);
                    }
                }
                
                async function fetchFilmsAndDisplay() {
                    try {
                        const response = await fetch('/api/films');
                        const films = await response.json();

                        films.forEach(async (film) => {
                            const line = document.createElement("tr");
                            line.classList.add(film.title.replace(/ /g, '_'));

                            const title = document.createElement('td');
                            title.innerHTML = film.title;

                            const type = document.createElement('td');
                            type.innerHTML = 'Film';

                            const director = document.createElement('td');
                            try {
                                const directorResponse = await fetch(`/api/director/${film.director_id}`);
                                const directorData = await directorResponse.json();
                                director.innerHTML = directorData.name;
                            } catch (error) {
                                console.error('Error fetching director data:', error);
                                director.innerHTML = 'Error fetching director';
                            }

                            const number = document.createElement('td');
                            number.innerHTML = film.copy_number;

                            const available = document.createElement('td');
                            try {
                                const loanResponse = await fetch(`/api/filmLoans/${film.id}`);
                                const count = await loanResponse.json();
                                available.innerHTML = film.copy_number - count;
                            } catch (error) {
                                console.error('Error fetching loan data:', error);
                                available.innerHTML = 'Error fetching availability';
                            }

                            const suppr = document.createElement('td');
                            try{
                                const response = await fetch('/api/checkFilm/'+film.id);
                                const data = await response.json();
                                if(data.loanable_id)
                                {
                                    suppr.innerHTML = "Suppression impossible !";
                                }
                                else
                                {
                                    suppr.innerHTML = '<i class="fa-solid fa-trash" style="color: #ff0000;"></i>';
                                    suppr.addEventListener('click', async function(){
                                        try{
                                            const response = await fetch('/api/removeFilm/'+film.id);
                                            const data = await response.json();
                                            window.location.href = "./admin";
                                        }catch (error) {
                                            console.error('Error fetching data:', error);
                                        }
                                    });
                                } 
                            } catch (error) {
                                console.error('Error fetching data:', error);
                            }

                            line.appendChild(title);
                            line.appendChild(type);
                            line.appendChild(director);
                            line.appendChild(number);
                            line.appendChild(available);
                            line.appendChild(suppr);

                            document.getElementById('itemList').appendChild(line);
                            document.getElementById('loadingBooksFilms').remove();
                        });
                    } catch (error) {
                        console.error('Error fetching films data:', error);
                    }
                }

                async function fetchAuthorsAndPopulateSelect() {
                    try {
                        const response = await fetch('api/authors');
                        const authors = await response.json();

                        authors.forEach(author => {
                            const authorOption = document.createElement('option');
                            authorOption.innerHTML = author.name;
                            authorOption.setAttribute('value', author.id);
                            authorSelect.appendChild(authorOption);
                        });
                    } catch (error) {
                        console.error('Error fetching data:', error);
                    }
                }

                async function fetchEditorsAndPopulateSelect() {
                    try {
                        const response = await fetch('api/editors');
                        const editors = await response.json();

                        editors.forEach(editor => {
                            const editorOption = document.createElement('option');
                            editorOption.innerHTML = editor.name;
                            editorOption.setAttribute('value', editor.id);
                            editorSelect.appendChild(editorOption);
                        });
                    } catch (error) {
                        console.error('Error fetching data:', error);
                    }
                }

                async function fetchDirectorsAndPopulateSelect() {
                    try {
                        const response = await fetch('api/directors');
                        const directors = await response.json();

                        directors.forEach(director => {
                            const directorOption = document.createElement('option');
                            directorOption.innerHTML = director.name;
                            directorOption.setAttribute('value', director.id);
                            directorSelect.appendChild(directorOption);
                        });
                    } catch (error) {
                        console.error('Error fetching data:', error);
                    }
                }

                async function fetchLanguagesAndPopulateSelect() {
                    try {
                        const response = await fetch('api/languages');
                        const languages = await response.json();

                        languages.forEach(language => {
                            const languageOption1 = document.createElement('option');
                            languageOption1.innerHTML = language.name;
                            languageOption1.setAttribute('value', language.id);
                            bookLanguage.appendChild(languageOption1);

                            const languageOption2 = document.createElement('option');
                            languageOption2.innerHTML = language.name;
                            languageOption2.setAttribute('value', language.id);
                            audioLanguage.appendChild(languageOption2);

                            const languageOption3 = document.createElement('option');
                            languageOption3.innerHTML = language.name;
                            languageOption3.setAttribute('value', language.id);
                            subLanguage.appendChild(languageOption3);
                        });
                    } catch (error) {
                        console.error('Error fetching data:', error);
                    }
                }

                async function fetchActorsAndPopulateSelect() {
                    try {
                        const response = await fetch('api/actors');
                        const actors = await response.json();

                        actors.forEach(actor => {
                            const actorOption = document.createElement('option');
                            actorOption.innerHTML = actor.name;
                            actorOption.setAttribute('value', actor.id);
                            actorSelect.appendChild(actorOption);
                        });
                    } catch (error) {
                        console.error('Error fetching data:', error);
                    }
                }

                async function fetchBookingsAndDisplay(){
                    try {
                        const response = await fetch('api/loans');
                        const loans = await response.json();
                        const sortedLoans = loans.sort((a, b) => {
                            if (a.booking_number < b.booking_number) {
                                return -1;
                            }
                            if (a.booking_number > b.booking_number) {
                                return 1;
                            }
                            return 0;
                        });
                        const remadeLoans = {};

                        sortedLoans.forEach(booking => {
                            if (!remadeLoans[booking.booking_number]) {
                                remadeLoans[booking.booking_number] = {
                                    booking_number: booking.booking_number,
                                    user_id: booking.user_id,
                                    start_date: booking.start_date,
                                    status : booking.status,
                                    loanable: [{ type: booking.loanable_type, id: booking.loanable_id }]
                                };
                            } else {
                                remadeLoans[booking.booking_number].loanable.push({ type: booking.loanable_type, id: booking.loanable_id });
                            }
                        }); 

                        const usedLoans = Object.values(remadeLoans);

                        usedLoans.forEach(async (loan) => {
                            if(loan.status != "add_to_cart"){
                                const line = document.createElement('tr');
                                line.classList.add(loan.booking_number.toLowerCase());
                                const bookingNumber = document.createElement('td');
                                bookingNumber.innerHTML = loan.booking_number;
                                const userName = document.createElement('td');
                                try {
                                    const userResponse = await fetch('/api/user/'+loan.user_id);
                                    const userData = await userResponse.json();
                                    userName.innerHTML = userData.first_name + " " + userData.last_name;
                                } catch (error) {
                                    console.error('Error fetching author data:', error);
                                    userName.innerHTML = 'Error fetching user';
                                }
                                const items = document.createElement('td');
                                const itemList = document.createElement('ul');
                                loan.loanable.forEach(async (item) => {
                                    const itemName = document.createElement('li');
                                    
                                    if(item.type.split(/\\/)[2] == "Book"){
                                        fetchUrl = '/api/books/'+item.id;
                                    }
                                    else{
                                        fetchUrl = '/api/films/'+item.id;
                                    }
                                    try {
                                        const itemResponse = await fetch(fetchUrl);
                                        const itemData = await itemResponse.json();
                                        itemName.innerHTML = itemData.title;
                                    } catch (error) {
                                        console.error('Error fetching author data:', error);
                                        itemName.innerHTML = 'Error fetching item';
                                    }
                                    itemList.appendChild(itemName);
                                });

                                currentDate = new Date();
                                loanDate = new Date(loan.start_date);
                                returnDate = new Date(loanDate);
                                returnDate.setDate(loanDate.getDate() + 7);
                                startDate = document.createElement("td");
                                startDate.innerHTML = loanDate.getDate()+" - "+(loanDate.getMonth()+1)+" - "+loanDate.getFullYear();
                                endDate = document.createElement("td");
                                endDate.innerHTML = returnDate.getDate()+" - "+(returnDate.getMonth()+1)+" - "+returnDate.getFullYear();

                                const loanStatus = document.createElement('td');
                                
                                suppr = document.createElement('td');
                                suppr.innerHTML = '<i class="fa-solid fa-trash" style="color: #ff0000;"></i>';
                                suppr.addEventListener('click', async function(){
                                    try{
                                        const response = await fetch('api/removeLoan/'+loan.booking_number);
                                        const data = await response.json();
                                        window.location.href = "./admin";
                                    } catch (error) {
                                        console.error('Error fetching data:', error);
                                    }
                                });

                                line.appendChild(bookingNumber);
                                line.appendChild(userName);
                                items.appendChild(itemList);
                                line.appendChild(items);
                                line.appendChild(startDate);
                                line.appendChild(endDate);
                                line.appendChild(loanStatus);
                                line.appendChild(suppr);
                                if(currentDate < returnDate && currentDate > loanDate)
                                {
                                    loanStatus.innerHTML = "En cours";
                                    currentBooking.appendChild(line);
                                }
                                else if(currentDate < loanDate)
                                {
                                    loanStatus.innerHTML = "A venir";
                                    futureBooking.appendChild(line);
                                }
                                else{
                                    loanStatus.innerHTML = "Passée";
                                    passedBooking.appendChild(line);
                                }
                                document.getElementById('loadCurrentBooking').remove();
                                document.getElementById('loadFutureBooking').remove();
                                document.getElementById('loadPassedBooking').remove();
                            }
                        });

                    } catch (error) {
                        console.error('Error fetching data:', error);
                    }
                }

                async function fetchBookAndPopulateModifyTable() {
                    try {
                        const response = await fetch('/api/books');
                        const books = await response.json();

                        books.forEach(async (book) => {
                            const line = document.createElement("tr");
                            line.classList.add(book.title.replace(/ /g, '_'));

                            const title = document.createElement('td');
                            title.innerHTML = book.title;

                            const type = document.createElement('td');
                            type.innerHTML = 'Livre';
                            const number = document.createElement('td');
                            try {
                                const loanResponse = await fetch('/api/bookLoans/' + book.id);
                                const count = await loanResponse.json();
                                const form = document.createElement('form');
                                form.innerHTML += '<input type="number" min="'+count+'" name="copy_number" value="'+book.copy_number+'">';
                                form.innerHTML += '<button type="submit">Modifier</button>';
                                number.appendChild(form);
                                form.addEventListener('submit', async function(){
                                    formData = new FormData(form);
                                    try {
                                        const response = await fetch('/api/modifyBook/'+book.id, {
                                            method : 'POST',
                                            body : formData
                                        });
                                        const articleData = await response.json();
                                        window.location.href = './admin';
                                    } catch (error) {
                                        console.error('Error fetching loan data:', error);
                                    }
                                })
                            } catch (error) {
                                console.error('Error fetching loan data:', error);
                            }

                            line.appendChild(title);
                            line.appendChild(type);
                            line.appendChild(number);

                            modifyList.appendChild(line);
                            document.getElementById('loadingModifyTable').remove();
                        });
                    } catch (error) {
                        console.error('Error fetching books data:', error);
                    }
                }

                async function fetchFilmAndPopulateModifyTable() {
                    try {
                        const response = await fetch('/api/films');
                        const films = await response.json();

                        films.forEach(async (film) => {
                            const line = document.createElement("tr");
                            line.classList.add(film.title.replace(/ /g, '_'));

                            const title = document.createElement('td');
                            title.innerHTML = film.title;

                            const type = document.createElement('td');
                            type.innerHTML = 'Film';

                            const number = document.createElement('td');
                            try {
                                const loanResponse = await fetch('/api/filmLoans/' + film.id);
                                const count = await loanResponse.json();
                                const form = document.createElement('form');
                                form.innerHTML += '<input type="number" min="'+count+'" name="copy_number" value="'+film.copy_number+'">';
                                form.innerHTML += '<button type="submit">Modifier</button>';
                                number.appendChild(form);
                                form.addEventListener('submit', async function(){
                                    formData = new FormData(form);
                                    try {
                                        const response = await fetch('/api/modifyFilm/'+film.id, {
                                            method : 'POST',
                                            body : formData
                                        });
                                        const articleData = await response.json();
                                        window.location.href = './admin';
                                    } catch (error) {
                                        console.error('Error fetching loan data:', error);
                                    }
                                })
                            } catch (error) {
                                console.error('Error fetching loan data:', error);
                            }

                            line.appendChild(title);
                            line.appendChild(type);
                            line.appendChild(number);

                            modifyList.appendChild(line);
                        });
                    } catch (error) {
                        console.error('Error fetching books data:', error);
                    }
                }

                async function fetchBookingsAndPopulateModifyTable(){
                    try {
                        const response = await fetch('api/loans');
                        const loans = await response.json();
                        const sortedLoans = loans.sort((a, b) => {
                            if (a.booking_number < b.booking_number) {
                                return -1;
                            }
                            if (a.booking_number > b.booking_number) {
                                return 1;
                            }
                            return 0;
                        });
                        const remadeLoans = {};

                        sortedLoans.forEach(booking => {
                            if (!remadeLoans[booking.booking_number]) {
                                remadeLoans[booking.booking_number] = {
                                    booking_number: booking.booking_number,
                                    user_id: booking.user_id,
                                    start_date: booking.start_date,
                                    status : booking.status,
                                    loanable: [{ type: booking.loanable_type, id: booking.loanable_id }]
                                };
                            } else {
                                remadeLoans[booking.booking_number].loanable.push({ type: booking.loanable_type, id: booking.loanable_id });
                            }
                        }); 

                        const usedLoans = Object.values(remadeLoans);

                        usedLoans.forEach(async (loan) => {
                            if(loan.status != "add_to_cart"){
                                const line = document.createElement('tr');
                                line.classList.add(loan.booking_number.toLowerCase());
                                const bookingNumber = document.createElement('td');
                                bookingNumber.innerHTML = loan.booking_number;
                                const userName = document.createElement('td');
                                try {
                                    const userResponse = await fetch('/api/user/'+loan.user_id);
                                    const userData = await userResponse.json();
                                    userName.innerHTML = userData.first_name + " " + userData.last_name;
                                } catch (error) {
                                    console.error('Error fetching author data:', error);
                                    userName.innerHTML = 'Error fetching user';
                                }
                                const items = document.createElement('td');
                                const itemList = document.createElement('ul');
                                loan.loanable.forEach(async (item) => {
                                    const itemName = document.createElement('li');
                                    
                                    if(item.type.split(/\\/)[2] == "Book"){
                                        fetchUrl = '/api/books/'+item.id;
                                    }
                                    else{
                                        fetchUrl = '/api/films/'+item.id;
                                    }
                                    try {
                                        const itemResponse = await fetch(fetchUrl);
                                        const itemData = await itemResponse.json();
                                        itemName.innerHTML = itemData.title;
                                    } catch (error) {
                                        console.error('Error fetching author data:', error);
                                        itemName.innerHTML = 'Error fetching item';
                                    }
                                    itemList.appendChild(itemName);
                                });

                                const loanStatus = document.createElement('td');
                                const form = document.createElement('form');
                                const statusSelect = document.createElement('select');
                                statusSelect.setAttribute('name', 'status');
                                
                                if(loan.status == "booked")
                                {
                                    const option1 = document.createElement('option');
                                    option1.setAttribute('value', 'booked');
                                    option1.innerHTML = 'Réservée';
                                    statusSelect.appendChild(option1);
                                    const option2 = document.createElement('option');
                                    option2.setAttribute('value', 'loaned');
                                    option2.innerHTML = 'Emprûntée';
                                    statusSelect.appendChild(option2);
                                    const option3 = document.createElement('option');
                                    option3.setAttribute('value', 'returned');
                                    option3.innerHTML = 'Rendue';
                                    statusSelect.appendChild(option3);
                                }
                                else if(loan.status == "loaned")
                                {
                                    const option2 = document.createElement('option');
                                    option2.setAttribute('value', 'loaned');
                                    option2.innerHTML = 'Emprûntée';
                                    statusSelect.appendChild(option2);
                                    const option3 = document.createElement('option');
                                    option3.setAttribute('value', 'returned');
                                    option3.innerHTML = 'Rendue';
                                    statusSelect.appendChild(option3);
                                }
                                else{
                                    const option3 = document.createElement('option');
                                    option3.setAttribute('value', 'returned');
                                    option3.innerHTML = 'Rendue';
                                    statusSelect.appendChild(option3);
                                }
                                form.appendChild(statusSelect);
                                form.innerHTML += '<button type="submit">Modifier</button>';
                                loanStatus.appendChild(form);

                                form.addEventListener('submit', async function(){
                                    formData = new FormData(form);
                                    try {
                                        const response = await fetch('/api/modifyLoan/'+loan.booking_number, {
                                            method : 'POST',
                                            body : formData
                                        });
                                        const loanData = await response.json();
                                        window.location.href = './admin';
                                    } catch (error) {
                                        console.error('Error fetching loan data:', error);
                                    }
                                })

                                line.appendChild(bookingNumber);
                                line.appendChild(userName);
                                items.appendChild(itemList);
                                line.appendChild(items);
                                line.appendChild(loanStatus);
                                document.getElementById('modifyBooking').appendChild(line);
                                document.getElementById('loadingModifyBookings').remove();
                            }
                        });

                    } catch (error) {
                        console.error('Error fetching data:', error);
                    }
                }

                await fetchBooksAndDisplay();
                await fetchFilmsAndDisplay();
                await fetchAuthorsAndPopulateSelect();
                await fetchEditorsAndPopulateSelect();
                await fetchDirectorsAndPopulateSelect();
                await fetchLanguagesAndPopulateSelect();
                await fetchActorsAndPopulateSelect();
                await fetchBookingsAndDisplay();
                await fetchBookAndPopulateModifyTable();
                await fetchFilmAndPopulateModifyTable();
                await fetchBookingsAndPopulateModifyTable();

                addBookForm.addEventListener('submit', async function(event) {
                    event.preventDefault();
                    let formData = new FormData(addBookForm);
                    const newAuthorInput = document.getElementById('newAuthor');
                    const newEditorInput = document.getElementById('newEditor');

                    if(newAuthorInput.value != ""){
                        const authorResponse = await fetch('api/authors', {
                            method: 'POST',
                            body: formData
                        });
                        const newAuthorId = await authorResponse.json();
                        formData.set('author_id', newAuthorId);
                    }

                    if(newEditorInput.value != ""){
                        const editorResponse = await fetch('api/editors', {
                            method: 'POST',
                            body: formData
                        });
                        const newEditorId = await editorResponse.json();
                        formData.set('editor_id', newEditorId);
                    }

                    await storeBook(formData);
                    
                });

                async function storeBook(formData){
                    try {
                        const bookResponse = await fetch('/api/books', {
                            method: 'POST',
                            body: formData
                        });
                        const bookData = await bookResponse.json();
                        if (bookResponse.ok) {
                            window.location.href = './admin';
                        } else {
                            console.error('Error adding book:', bookData);
                        }
                    } catch (error) {
                        console.error('Error adding book:', error);
                    }
                }

                addFilmForm.addEventListener('submit', async function(event) {
                    event.preventDefault();
                    let formData = new FormData(addFilmForm);
                    const newDirectorInput = document.getElementById('newDirector');

                    if(newDirectorInput.value != ""){
                        const directorResponse = await fetch('api/directors', {
                            method: 'POST',
                            body: formData
                        });
                        const newDirectorId = await directorResponse.json();
                        formData.set('director_id', newDirectorId);
                    }

                    await storeFilm(formData);
                    
                });

                async function storeFilm(formData){
                    try {
                        const filmResponse = await fetch('/api/films', {
                            method: 'POST',
                            body: formData
                        });
                        const filmData = await filmResponse.json();
                        if (filmResponse.ok) {
                            formData.set('film_id', filmData);
                            
                            await storeAudioLanguages(formData);
                            await storeSubLanguages(formData);
                            await storeActors(formData);
            
                            window.location.href = './admin';
                        } else {
                            console.error('Error adding book:', filmData);
                        }
                    } catch (error) {
                        console.error('Error adding book:', error);
                    }
                }

                async function storeAudioLanguages(formData){
                    const audioLang = formData.getAll('audioLanguages');
                    audioLang.forEach(async (lang)=>{
                        formData.set('language_id', lang);
                        const audioResponse = await fetch('/api/audioLanguage', {
                            method: 'POST',
                            body: formData
                        });
                        const audioData = await audioResponse.json();
                    });
                }

                async function storeSubLanguages(formData){
                    const subLang = formData.getAll('subLanguages');
                    subLang.forEach(async (lang)=>{
                        formData.set('language_id', lang);
                        const subResponse = await fetch('/api/subtitle', {
                            method: 'POST',
                            body: formData
                        });
                        const subData = await subResponse.json();
                    });
                }

                async function storeActors(formData){
                    const actors = formData.getAll('actors');
                    actors.forEach(async (actor)=>{
                        formData.set('actor_id', actor);
                        const actorResponse = await fetch('/api/casting', {
                            method: 'POST',
                            body: formData
                        });
                        const actorData = await actorResponse.json();
                    });
                }
            }
            else
            {
                window.location.href = './account';
            }
        }
        else
        {
            window.location.href = './connect';
        }
    });
</script>