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
            .then(userId => {
                sessionStorage.setItem('userId', userId);
                window.location.href = './account';
            })
            .catch(error => {
                console.error('Error finding user :', error);
            });
    });
});