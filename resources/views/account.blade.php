<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte</title>
</head>
<body>
    <div>
        <h2>Mon Compte</h2>
        <p><b>Historique des réservations :</b></p>
        <p>Emprûnts en cours :</p>
        <table id="currentTable">
            <th>
                <td>Nom du document</td>
                <td>Date de réservation</td>
                <td>Date de rendu</td>
                <td>Numéro de réservation</td>
            </th>
        </table>
        <p>Emprûnts passées :</p>
        <table id="passedTable">
            <th>
                <td>Nom du document</td>
                <td>Date de réservation</td>
                <td>Date de rendu</td>
                <td>Numéro de réservation</td>
            </th>
        </table>
    </div>
    <div>
        <h2>Détails du compte</h2>
        <p id="userName"></p>       <!-- peut modifier le type de balise -->
        <p id="userMail"></p>       <!-- mais NE PAS MODIFIER LES ID ! -->
        <p id="userAddress"></p>
        <button>Editer</button>
        <button>Me déconnecter</button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userId = sessionStorage.getItem('userId');
            if(userId)
            {
                const currentTable = document.getElementById('currentTable');
                const passedTable = document.getElementById('passedTable');
                const userName = document.getElementById('userName');
                const userMail = document.getElementById('userMail');
                const userAddress = document.getElementById('userAddress');
                
                const bodyData = JSON.stringify({ userId: parseInt(userId) });

                fetch('/api/account/'+userId)
                    .then(response => response.json())
                    .then(user => {
                        userName.innerHTML = user.first_name + " " + user.last_name;
                        userMail.innerHTML = user.email;
                        userAddress.innerHTML = user.address;
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                    });
                
                fetch('/api/account/loan/'+userId)
                    .then(response => response.json())
                    .then(loans => {
                        console.log(loans);
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                    });
            }
            else
            {
                window.location.href = './connect';
            }
        });
    </script>
</body>
</html>