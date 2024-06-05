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
            <thead>
                <tr>
                    <td>Nom du document</td>
                    <td>Date de réservation</td>
                    <td>Date de rendu</td>
                    <td>Numéro de réservation</td>
                </tr>
            </thead>
        </table>
        <p>Emprûnts passées :</p>
        <table id="passedTable">
            <thead>
                <tr>
                    <td>Nom du document</td>
                    <td>Date de réservation</td>
                    <td>Date de rendu</td>
                    <td>Numéro de réservation</td>
                </tr>
            </thead>
        </table>
    </div>
    <div>
        <h2>Détails du compte</h2>
        <p id="userName"></p>       <!-- peut modifier le type de balise -->
        <p id="userMail"></p>       <!-- mais NE PAS MODIFIER LES ID ! -->
        <p id="userAddress"></p>
        <button>Editer</button>
        <button id="deconnect">Me déconnecter</button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userId = sessionStorage.getItem('userId');
            const userStatus = sessionStorage.getItem('userStatus');
            if(userId)
            {
                if(userStatus && userStatus == "customer"){
                    const currentTable = document.getElementById('currentTable');
                    const passedTable = document.getElementById('passedTable');
                    const userName = document.getElementById('userName');
                    const userMail = document.getElementById('userMail');
                    const userAddress = document.getElementById('userAddress');
                    const decoButton = document.getElementById('deconnect');
                    
                    const bodyData = JSON.stringify({ userId: parseInt(userId) });

                    decoButton.addEventListener('click', function(){
                        sessionStorage.clear();
                        window.location.href = './account';
                    });

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
                            loans.forEach((loan) => {
                            line = document.createElement("tr");

                            currentDate = new Date();
                            loanDate = new Date(loan.start_date);
                            returnDate = new Date(loanDate);
                            returnDate.setDate(loanDate.getDate() + 7);

                            productName = document.createElement("td");
                            productName.innerHTML = loan.article_name;
                            startDate = document.createElement("td");
                            startDate.innerHTML = loanDate.getDate()+" - "+(loanDate.getMonth()+1)+" - "+loanDate.getFullYear();
                            endDate = document.createElement("td");
                            endDate.innerHTML = returnDate.getDate()+" - "+(returnDate.getMonth()+1)+" - "+returnDate.getFullYear();
                            bookingNumber = document.createElement("td");
                            bookingNumber.innerHTML = loan.booking_number;

                            line.appendChild(productName);
                            line.appendChild(startDate);
                            line.appendChild(endDate);
                            line.appendChild(bookingNumber);
                            if(currentDate > returnDate)
                            {
                                passedTable.appendChild(line);
                            }
                            else
                            {
                                currentTable.appendChild(line);
                            }
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                    });
                }
                else
                {
                    window.location.href = './admin';
                }
                
            }
            else
            {
                window.location.href = './connect';
            }
        });
    </script>
</body>
</html>