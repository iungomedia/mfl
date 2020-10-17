$(function () {
  if ($("body").hasClass("resultPage")) {
    var mixer = mixitup(".listCardsResult");

    $(".formFilters").submit(function (event) {
      event.preventDefault();
      var cat = $("#idCategory option:selected")
        .text()
        .toLowerCase()
        .replace(/ /g, "");
      var team = $("#idTeam option:selected")
        .text()
        .toLowerCase()
        .replace(/ /g, "");
      var journey = $("#idJourney option:selected")
        .text()
        .toLowerCase()
        .replace(/ /g, "");

      var filter = "";

      if (cat != "todos") {
        filter = filter + "." + cat;
      }
      if (team != "todos") {
        filter = filter + "." + team;
      }
      if (journey != "todos") {
        filter = filter + "." + journey;
      }

      if (filter == "") {
        filter = "*";
      }
      console.log(filter);
      mixer.filter(filter);
    });
  }
});
