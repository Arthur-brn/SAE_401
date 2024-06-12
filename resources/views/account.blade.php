@extends('layout')

@section('content')
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
    <p id="userName"></p>
    <p id="userMail"></p>
    <p id="userAddress"></p>
    <button id="deconnect">Me déconnecter</button>
</div>
<script>
        document.addEventListener('DOMContentLoaded', async function() {
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

                    await fetch('/api/account/'+userId)
                        .then(response => response.json())
                        .then(user => {
                            userName.innerHTML = user.first_name + " " + user.last_name;
                            userMail.innerHTML = user.email;
                            userAddress.innerHTML = user.address;
                        })
                        .catch(error => {
                            console.error('Error fetching data:', error);
                        });
                    
                    await fetch('/api/account/loan/'+userId)
                        .then(response => response.json())
                        .then(loans => {
                            loans.forEach(async (loan) => {
                                const line = document.createElement("tr");

                                currentDate = new Date();
                                loanDate = new Date(loan.start_date);
                                returnDate = new Date(loanDate);
                                returnDate.setDate(loanDate.getDate() + 7);

                                const startDate = document.createElement("td");
                                startDate.innerHTML = loanDate.getDate()+" - "+(loanDate.getMonth()+1)+" - "+loanDate.getFullYear();
                                const endDate = document.createElement("td");
                                endDate.innerHTML = returnDate.getDate()+" - "+(returnDate.getMonth()+1)+" - "+returnDate.getFullYear();
                                const bookingNumber = document.createElement("td");
                                bookingNumber.innerHTML = loan.booking_number;

                                if(currentDate > returnDate)
                                {
                                    passedTable.appendChild(line);
                                }
                                else
                                {
                                    currentTable.appendChild(line);
                                }

                                const productName = document.createElement("td");
                                try{
                                    let articleResponse;
                                    if(loan.loanable_type == 'App\\Models\\Book'){
                                        articleResponse = await fetch('/api/books/'+loan.loanable_id);
                                    }
                                    else{
                                        articleResponse = await fetch('/api/films/'+loan.loanable_id);
                                    }
                                    const article = await articleResponse.json();
                                    productName.innerHTML = article.title;
                                }catch (error) {
                                    console.error('Error fetching data:', error);
                                }

                                line.appendChild(productName);
                                line.appendChild(startDate);
                                line.appendChild(endDate);
                                line.appendChild(bookingNumber);
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
@endsection

