$(function () {
  if ($("body").hasClass("homePage")) {
    var $slides = $(".supersliderHome");

    Hammer($slides[0]).on("swipeleft", function (e) {
      $slides.data("superslides").animate("next");
    });

    Hammer($slides[0]).on("swiperight", function (e) {
      $slides.data("superslides").animate("prev");
    });

    $slides.superslides({
      play: 5000,
      hashchange: true,
      pagination: false,
    });
  }
});
