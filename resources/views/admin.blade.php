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
                    <input type="number" id="author_id" name="author_id">
                </div>
                <div>
                    <label for="editor_id">Edition:</label>
                    <input type="number" id="editor_id" name="editor_id">
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
                    <input type="number" id="language_id" name="language_id">
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
                    <input type="number" id="director_id" name="director_id">
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
                <!--
                <div>
                    <label for="language_id">Langue:</label>
                    <input type="number" id="language_id" name="language_id">
                </div>
                -->
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
            <a href="#" @click.prevent="tab = 'tab1'" :class="{ 'tab_selected' : tab === 'tab1' }">Toutes les réservations</a>
        </li>
        <li>
            <a href="#" @click.prevent="tab = 'tab2' " :class="{ 'tab_selected' : tab === 'tab2' }">Réservations à venir </a>
        </li>
        <li>
            <a href="#" @click.prevent="tab = 'tab3'" :class="{ 'tab_selected' : tab === 'tab3' }">réservations en cours</a>
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
            <table>
                <tr>
                    <th>Numéro de la réservation</th>
                    <th>Nom</th>
                    <th>Document(s)</th>
                    <th>Date de réservation</th>
                    <th>Date de retour</th>
                    <th>Statut de la réservation</th>
                    <th>Suppression</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Dupont</td>
                    <td>
                        <ul>
                            <li>Titanic</li>
                            <li>Harry Potter</li>
                        </ul>
                    </td>
                    <td>23 - 04 - 2024</td>
                    <td>30 - 04 - 2024</td>
                    <td>A venir</td>
                    <td><i class="fa-solid fa-trash" style="color: #ff0000;"></i></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Dupont</td>
                    <td>
                        <ul>
                            <li>Titanic</li>
                            <li>Harry Potter</li>
                        </ul>
                    </td>
                    <td>23 - 04 - 2024</td>
                    <td>30 - 04 - 2024</td>
                    <td>En cours</td>
                    <td><i class="fa-solid fa-trash" style="color: #ff0000;"></i></td>
                </tr>
            </table>
        </div>
        <div x-show="tab === 'tab2'">
            <div>
                <p>Rechercher une réservation :</p>
                <input type="text" name="" id="" placeholder="Titre du document">
            </div>
            <table>
                <tr>
                    <th>Numéro de la réservation</th>
                    <th>Nom</th>
                    <th>Document(s)</th>
                    <th>Date de réservation</th>
                    <th>Date de retour</th>
                    <th>Statut de la réservation</th>
                    <th>Suppression</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Dupont</td>
                    <td>
                        <ul>
                            <li>Titanic</li>
                            <li>Harry Potter</li>
                        </ul>
                    </td>
                    <td>23 - 04 - 2024</td>
                    <td>30 - 04 - 2024</td>
                    <td>A venir</td>
                    <td><i class="fa-solid fa-trash" style="color: #ff0000;"></i></td>
                </tr>
            </table>
        </div>
        <div x-show="tab === 'tab3'">
            <div>
                <p>Rechercher une réservation :</p>
                <input type="text" name="" id="" placeholder="Titre du document">
            </div>
            <table>
                <tr>
                    <th>Numéro de la réservation</th>
                    <th>Nom</th>
                    <th>Document(s)</th>
                    <th>Date de réservation</th>
                    <th>Date de retour</th>
                    <th>Statut de la réservation</th>
                    <th>Suppression</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Dupont</td>
                    <td>
                        <ul>
                            <li>Titanic</li>
                            <li>Harry Potter</li>
                        </ul>
                    </td>
                    <td>23 - 04 - 2024</td>
                    <td>30 - 04 - 2024</td>
                    <td>En cours</td>
                    <td><i class="fa-solid fa-trash" style="color: #ff0000;"></i></td>
                </tr>
            </table>
        </div>
        <div x-show="tab === 'tab4'">
            <form action="">
                <div>
                    <label for="loan_number">Numéro de réservation:</label>
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

        fetch('/api/books')
            .then(response => response.json())
            .then(books => {
                books.forEach((book) => {
                    line = document.createElement("tr");

                    title = document.createElement('td');
                    title.innerHTML = book.title;

                    type = document.createElement('td');
                    type.innerHTML = 'Livre';

                    author = document.createElement('td');
                    fetch('/api/author/'+book.author_id)
                        .then(response => response.json())
                        .then(authorName => {
                            author.innerHTML = authorName.name;
                        })
                        .catch(error => {
                            console.error('Error fetching data:', error);
                        });

                    number = document.createElement('td');
                    number.innerHTML = book.copy_number;

                    available = document.createElement('td');
                    available.innerHTML = '';

                    suppr = document.createElement('td');
                    suppr.innerHTML = '<i class="fa-solid fa-trash" style="color: #ff0000;"></i>';

                    line.appendChild(title);
                    line.appendChild(type);
                    line.appendChild(author);
                    line.appendChild(number);
                    line.appendChild(available);
                    line.appendChild(suppr);

                    itemList.appendChild(line);
                })
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
        
        fetch('/api/films')
            .then(response => response.json())
            .then(films => {
                films.forEach((film) => {
                    line = document.createElement("tr");

                    title = document.createElement('td');
                    title.innerHTML = film.title;

                    type = document.createElement('td');
                    type.innerHTML = 'Film';

                    director = document.createElement('td');
                    fetch('/api/director/'+film.director_id)
                        .then(response => response.json())
                        .then(directorName => {
                            director.innerHTML = directorName.name;
                        })
                        .catch(error => {
                            console.error('Error fetching data:', error);
                        });

                    number = document.createElement('td');
                    number.innerHTML = film.copy_number;

                    available = document.createElement('td');
                    available.innerHTML = '';

                    suppr = document.createElement('td');
                    suppr.innerHTML = '<i class="fa-solid fa-trash" style="color: #ff0000;"></i>';

                    line.appendChild(title);
                    line.appendChild(type);
                    line.appendChild(director);
                    line.appendChild(number);
                    line.appendChild(available);
                    line.appendChild(suppr);

                    itemList.appendChild(line);
                })
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
        });
</script>