@extends('layout')

@section('content')
<section>
    <p>TELOCULTURE</p>
    <form id="connect-form">
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password">
        <button type="submit">Se connecter</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const connectForm = document.getElementById('connect-form');

            // Écouteur d'événements pour le soumission du formulaire d'ajout de livre
            connectForm.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(connectForm);
                fetch('/api/connect', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(user => {
                        sessionStorage.setItem('userId', user.id);
                        sessionStorage.setItem('userStatus', user.status);
                        window.location.href = './account';
                    })
                    .catch(error => {
                        console.error('Error finding user :', error);
                    });
            });
        });
    </script>

</section>
@endsection

