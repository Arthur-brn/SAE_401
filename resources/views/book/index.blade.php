<ul id="book-list"></ul>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Effectuer une requête AJAX pour récupérer la liste des livres
        fetch('/api/books')
            .then(response => response.json())
            .then(data => {
                // Une fois que les données sont récupérées avec succès, les afficher dans la liste
                const bookList = document.getElementById('book-list');
                bookList.innerHTML = ''; // Vider la liste au cas où elle aurait déjà des éléments

                // Boucler à travers les données pour afficher chaque livre dans la liste
                data.forEach(book => {
                    const listItem = document.createElement('li');
                    listItem.textContent = book.title + ' by ' + book.author.name;
                    bookList.appendChild(listItem);
                });
            })
            .catch(error => {
                console.error('Error fetching data:', error); // En cas d'erreur, afficher l'erreur dans la console
            });
    });
</script>