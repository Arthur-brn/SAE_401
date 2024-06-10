document.addEventListener('DOMContentLoaded', function() {
    const userId = sessionStorage.getItem('userId');
    if (userId) {
        const currentTable = document.getElementById('currentTable');
        const passedTable = document.getElementById('passedTable');
        const userName = document.getElementById('userName');
        const userMail = document.getElementById('userMail');
        const userAddress = document.getElementById('userAddress');
        const decoButton = document.getElementById('deconnect');

        const bodyData = JSON.stringify({
            userId: parseInt(userId)
        });

        decoButton.addEventListener('click', function() {
            sessionStorage.clear();
            window.location.href = './account';
        });

        fetch('/api/account/' + userId)
            .then(response => response.json())
            .then(user => {
                userName.innerHTML = user.first_name + " " + user.last_name;
                userMail.innerHTML = user.email;
                userAddress.innerHTML = user.address;
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });

        fetch('/api/account/loan/' + userId)
            .then(response => response.json())
            .then(loans => {
                loans.forEach((loan) => {
                    line = document.createElement("tr");

                    currentDate = new Date();
                    loanDate = new Date(loan.start_date);
                    returnDate = new Date();
                    returnDate.setDate(loanDate.getDate() + 7);

                    productName = document.createElement("td");
                    productName.innerHTML = loan.article_name;
                    startDate = document.createElement("td");
                    startDate.innerHTML = loanDate.getDate() + " - " + (loanDate.getMonth() + 1) + " - " + loanDate.getFullYear();
                    endDate = document.createElement("td");
                    endDate.innerHTML = returnDate.getDate() + " - " + (returnDate.getMonth() + 1) + " - " + returnDate.getFullYear();;
                    bookingNumber = document.createElement("td");
                    bookingNumber.innerHTML = loan.booking_number;

                    line.appendChild(productName);
                    line.appendChild(startDate);
                    line.appendChild(endDate);
                    line.appendChild(bookingNumber);
                    if (currentDate > returnDate) {
                        passedTable.appendChild(line);
                    } else {
                        currentTable.appendChild(line);
                    }
                });
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    } else {
        window.location.href = './connect';
    }
});