document.addEventListener("DOMContentLoaded", function () {
    const filters = document.querySelectorAll(".filtre");
    const closeButtons = document.querySelectorAll(".type img");

    filters.forEach((filter) => {
        filter.addEventListener("click", function () {
            this.classList.toggle("active");
            const img = this.querySelector("img");
            img.classList.toggle("rotate");

            filters.forEach((f) => {
                if (f !== this) {
                    f.classList.remove("active");
                    const imgOther = f.querySelector("img");
                    imgOther.classList.remove("rotate");
                    f.nextElementSibling.style.display = "none";
                }
            });

            const choix = this.nextElementSibling;
            choix.style.display =
                choix.style.display === "block" ? "none" : "block";
        });
    });

    closeButtons.forEach((closeButton) => {
        closeButton.addEventListener("click", function () {
            this.parentElement.style.display = "none";
        });
    });
});
