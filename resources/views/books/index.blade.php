<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
</head>

<body>
    <!-- Formulaire pour ajouter un nouveau livre -->
    <form id="add-book-form">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title"><br>

        <label for="picture">Picture:</label><br>
        <input type="text" id="picture" name="picture"><br>

        <label for="author_id">Author ID:</label><br>
        <input type="number" id="author_id" name="author_id"><br>

        <label for="editor_id">Editor ID:</label><br>
        <input type="number" id="editor_id" name="editor_id"><br>

        <label for="language_id">Language ID:</label><br>
        <input type="number" id="language_id" name="language_id"><br>

        <label for="style">Style:</label><br>
        <select id="style" name="style">
            <option value="fantastique">Fantastique</option>
            <option value="romantique">Romantique</option>
            <option value="science-fiction">Science-fiction</option>
            <option value="policier">Policier</option>
        </select><br>

        <label for="type">Type:</label><br>
        <select id="type" name="type">
            <option value="comics">Comics</option>
            <option value="paper back">Paper back</option>
            <option value="pocket book">Pocket book</option>
            <option value="illustrated album">Illustrated album</option>
        </select><br>

        <label for="summary">Summary:</label><br>
        <textarea id="summary" name="summary"></textarea><br>

        <label for="page_number">Page Number:</label><br>
        <input type="number" id="page_number" name="page_number"><br>

        <label for="edition_year">Edition Year:</label><br>
        <input type="number" id="edition_year" name="edition_year"><br>

        <label for="copy_number">Copy Number:</label><br>
        <input type="number" id="copy_number" name="copy_number"><br>

        <label for="loan_number">Loan Number:</label><br>
        <input type="number" id="loan_number" name="loan_number" value="0"><br>
        <button type="submit">Add Book</button>
    </form>

    <!-- Liste des livres -->
    <h2>Book List</h2>
    <ul id="book-list"></ul>

    <!-- Affichage des détails d'un livre -->
    <h2>Book Details</h2>
    <div id="book-details"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addBookForm = document.getElementById('add-book-form');
            const bookList = document.getElementById('book-list');
            const bookDetails = document.getElementById('book-details');

            // Fonction pour afficher tous les livres
            function displayAllBooks() {
                fetch('/api/books')
                    .then(response => response.json())
                    .then(data => {
                        bookList.innerHTML = ''; // Vider la liste au cas où elle aurait déjà des éléments
                        // Boucler à travers les données pour afficher chaque livre dans la liste
                        data.forEach(book => {
                            const listItem = document.createElement('li');
                            listItem.textContent = book.title;
                            listItem.addEventListener('click', function() {
                                displayBookDetails(book.id);
                            });
                            bookList.appendChild(listItem);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                    });
            }

            // Fonction pour afficher les détails d'un livre en fonction de son ID
            function displayBookDetails(id) {
                fetch('/api/books/' + id)
                    .then(response => response.json())
                    .then(book => {
                        bookDetails.innerHTML = `
                            <p>Title: ${book.title}</p>
                            <p>Author ID: ${book.author_id}</p>
                            <p>Editor ID: ${book.editor_id}</p>
                            <p>Language ID: ${book.language_id}</p>
                            <p>Style: ${book.style}</p>
                            <p>Type: ${book.type}</p>
                            <p>Summary: ${book.summary}</p>
                            <p>Page Number: ${book.page_number}</p>
                            <p>Edition Year: ${book.edition_year}</p>
                            <p>Copy Number: ${book.copy_number}</p>
                            <p>Loan Number: ${book.loan_number}</p>`;
                    })
                    .catch(error => {
                        console.error('Error fetching book details:', error);
                    });
            }

            // Écouteur d'événements pour le soumission du formulaire d'ajout de livre
            addBookForm.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(addBookForm);
                fetch('/api/books', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(book => {
                        console.log('Book added successfully:', book);
                        displayAllBooks(); // Rafraîchir la liste des livres après l'ajout
                        addBookForm.reset(); // Réinitialiser le formulaire d'ajout de livre
                    })
                    .catch(error => {
                        console.error('Error adding book:', error);
                    });
            });

            // Afficher tous les livres au chargement initial de la page
            displayAllBooks();
        });
    </script>
</body>

</html>