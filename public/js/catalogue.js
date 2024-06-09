document.addEventListener("DOMContentLoaded", function () {
    // Filtres

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
                choix.style.display === "flex" ? "none" : "flex";
        });
    });

    // Fermer type
    closeButtons.forEach((closeButton) => {
        closeButton.addEventListener("click", function () {
            this.parentElement.style.display = "none";
        });
    });

    // Changement page

    const articles = document.querySelectorAll(".article");
    const pages = document.querySelectorAll(".droite p[data-page]");
    const totalPage = parseInt(
        document.querySelector(".totale_page").getAttribute("data-page"),
        10
    );
    const articlesPerPage = 5;
    let currentPage = 1;

    function showPage(pageNum) {
        const start = (pageNum - 1) * articlesPerPage;
        const end = pageNum * articlesPerPage;

        articles.forEach((article, index) => {
            if (index >= start && index < end) {
                article.classList.remove("hidden");
            } else {
                article.classList.add("hidden");
            }
        });

        updatePagination(pageNum);
    }

    function updatePagination(activePage) {
        pages.forEach((page) => {
            const pageNum = parseInt(page.getAttribute("data-page"), 10);

            if (pageNum === activePage) {
                page.classList.remove("passive");
                page.classList.add("active");
            } else if (
                pageNum === activePage - 1 ||
                pageNum === activePage + 1
            ) {
                page.classList.remove("active");
                page.classList.add("passive");
                page.classList.remove("hidden");
            } else {
                page.classList.remove("active");
                page.classList.add("passive");
                page.classList.add("hidden");
            }
        });

        document.querySelector(".reduit").classList.remove("hidden");
        document.querySelector(".totale_page").classList.remove("hidden");
    }

    pages.forEach((page) => {
        page.addEventListener("click", () => {
            const pageNum = parseInt(page.getAttribute("data-page"), 10);
            currentPage = pageNum;
            showPage(currentPage);
        });
    });

    showPage(currentPage);
});
