document.addEventListener("DOMContentLoaded", function () {
    function getSplideOptions() {
        return window.innerWidth > 480
            ? {
                  perPage: 5,
                  perMove: 1,
                  rewind: true,
                  gap: "1rem",
                  autoplay: false,
              }
            : {
                  perPage: 1,
                  perMove: 1,
                  rewind: true,
                  gap: "1rem",
                  autoplay: false,
              };
    }

    var nouveautesSplide = new Splide(
        "#nouveautes",
        getSplideOptions()
    ).mount();
    var coupsDeCoeurSplide = new Splide(
        "#coups_de_coeur",
        getSplideOptions()
    ).mount();

    window.addEventListener("resize", function () {
        nouveautesSplide.options = getSplideOptions();
        coupsDeCoeurSplide.options = getSplideOptions();
    });
});
