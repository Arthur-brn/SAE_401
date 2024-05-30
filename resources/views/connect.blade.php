<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <form id="connect-form">
        <img src="" alt="logo Téloculture"> <!-- Insérer logo Teloculture -->
        <label for="">Email</label>
        <input type="text" name="email" id="">
        <label for="">Mot de passe</label>
        <input type="password" name="password" id="">
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
                        sessionStorage.setItem('userId', user.user_id);
                        sessionStorage.setItem('userStatus', user.status);
                        window.location.href = './account';
                    })
                    .catch(error => {
                        console.error('Error finding user :', error);
                    });
            });
        });
    </script>
</body>
</html>