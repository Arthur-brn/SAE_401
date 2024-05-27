document.addEventListener("DOMContentLoaded", function () {
  function getSplideOptions() {
    return window.innerWidth > 480
      ? { perPage: 5, type: "loop", padding: "0 5rem" }
      : { perPage: 1, type: "loop", padding: "0 5rem" };
  }

  // Initialize Splide for both sections
  var splides = document.querySelectorAll(".splide");
  splides.forEach(function (splideElement) {
    var splide = new Splide(splideElement, getSplideOptions()).mount();

    // Listen for resize events
    window.addEventListener("resize", function () {
      splide.options = getSplideOptions();
    });
  });
});
