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
                <input type="text" name="" id="" placeholder="Titre du document">
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
                    <select name="author_id" id="author_id"></select>
                </div>
                <div>
                    <label for="editor_id">Edition:</label>
                    <select name="editor_id" id="editor_id"></select>
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
                    <select name="language_id" id="language_id"></select>
                </div>
                <div>
                    <label for="summary">Résumé :</label>
                    <textarea id="summary" name="summary"></textarea>
                </div>
                <div>
                    <label for="type">Type de livre :</label>
                    <select id="type" name="type">
                        <option value="comics">Comics</option>
                        <option value="paper back">Paper back</option>
                        <option value="pocket book">Pocket book</option>
                        <option value="illustrated album">Illustrated album</option>
                    </select>
                </div>
                <div>
                    <label for="style">Style:</label>
                    <select id="style" name="style">
                        <option value="fantastique">Fantastique</option>
                        <option value="romantique">Romantique</option>
                        <option value="science-fiction">Science-fiction</option>
                        <option value="policier">Policier</option>
                    </select>
                </div>
                <div>
                    <label for="picture">Image :</label>
                    <input type="text" id="picture" name="picture">
                </div>
                <div>
                    <label for="copy_number">Copy Number:</label>
                    <input type="number" id="copy_number" name="copy_number">
                </div>
                <div>
                    <label for="loan_number">Loan Number:</label>
                    <input type="number" id="loan_number" name="loan_number" value="0">
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
                    <input type="text" id="picture" name="picture">
                </div>
                <div>
                    <label for="director_id">réalisateur :</label>
                    <select name="director_id" id="director_id"></select>
                </div>
                <div>
                    <label for="style">Style:</label>
                    <select id="style" name="style">
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
                    <label for="copy_number">Copy Number:</label>
                    <input type="number" id="copy_number" name="copy_number">
                </div>
                <div>
                    <label for="loan_number">Loan Number:</label>
                    <input type="number" id="loan_number" name="loan_number" value="0">
                </div>
                <button type="submit">Ajouter</button>
            </form>
        </div>
        <div x-show="tab === 'tab4'">
            <div>
                <label for="style">Document:</label>
                <select id="style" name="style">
                    <option value=""></option>
                    <option value="titanic">Titanic</option>
                    <option value="harry potter">Harry Potter</option>
                </select>
                <form action=""></form>
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
                <input type="number" name="" id="" placeholder="N° de la réservation">
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
            </table>
        </div>
        <div x-show="tab === 'tab2'">
            <div>
                <p>Rechercher une réservation :</p>
                <input type="text" name="" id="" placeholder="Titre du document">
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
            </table>
        </div>
        <div x-show="tab === 'tab3'">
            <div>
                <p>Rechercher une réservation :</p>
                <input type="text" name="" id="" placeholder="Titre du document">
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
            </table>
        </div>
        <div x-show="tab === 'tab4'">
            <form action="">
                <div>
                    <label for="loan_number">Numéro :</label>
                    <input type="number" name="loan_number" id="loan_number">
                </div>
                <div>
                    <label for="user_id">Nom :</label>
                    <input type="number" id="user_id" name="user_id">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const itemList = document.getElementById('itemList');
        const authorSelect = document.getElementById('author_id');
        const editorSelect = document.getElementById('editor_id');
        const directorSelect = document.getElementById('director_id');
        const bookLanguage = document.getElementById('language_id');
        const addBookForm = document.getElementById('addBookForm');
        const addFilmForm = document.getElementById('addFilmForm');
        const passedBooking = document.getElementById('passedBookings');
        const futureBooking = document.getElementById('futureBookings');
        const currentBooking = document.getElementById('currentBookings');

        async function fetchBooksAndDisplay() {
            try {
                const response = await fetch('/api/books');
                const books = await response.json();

                books.forEach(async (book) => {
                    const line = document.createElement("tr");

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
                    const languageOption = document.createElement('option');
                    languageOption.innerHTML = language.name;
                    languageOption.setAttribute('value', language.id);
                    bookLanguage.appendChild(languageOption);
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
                            loanable: [{ type: booking.loanable_type, id: booking.loanable_id }]
                        };
                    } else {
                        remadeLoans[booking.booking_number].loanable.push({ type: booking.loanable_type, id: booking.loanable_id });
                    }
                }); 

                const usedLoans = Object.values(remadeLoans);

                usedLoans.forEach(async (loan) => {
                    const line = document.createElement('tr');
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
                        if(item.type == "book"){
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

                });

            } catch (error) {
                console.error('Error fetching data:', error);
            }
        }
        
        fetchBooksAndDisplay();
        fetchFilmsAndDisplay();
        fetchAuthorsAndPopulateSelect();
        fetchEditorsAndPopulateSelect();
        fetchDirectorsAndPopulateSelect();
        fetchLanguagesAndPopulateSelect();
        fetchBookingsAndDisplay();

        addBookForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(addBookForm);
            fetch('/api/books', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(
                    window.location.href = './admin'
                )
                .catch(error => {
                    console.error('Error adding book :', error);
                });
        });

        addFilmForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(addFilmForm);
            fetch('/api/films', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(
                    window.location.href = './admin'
                )
                .catch(error => {
                    console.error('Error adding film :', error);
                });
        });
    });
</script>