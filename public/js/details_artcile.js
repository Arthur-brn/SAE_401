document.addEventListener("DOMContentLoaded", function () {
    const btnDescription = document.getElementById("btn-description");
    const btnSujet = document.getElementById("btn-sujet");
    const description = document.getElementById("description");
    const sujet = document.getElementById("sujet");

    btnDescription.addEventListener("click", function () {
        btnDescription.classList.add("active");
        btnSujet.classList.remove("active");
        description.classList.remove("hidden");
        sujet.classList.add("hidden");
    });

    btnSujet.addEventListener("click", function () {
        btnSujet.classList.add("active");
        btnDescription.classList.remove("active");
        sujet.classList.remove("hidden");
        description.classList.add("hidden");
    });
});
