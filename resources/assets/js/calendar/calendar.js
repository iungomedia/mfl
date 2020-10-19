$(function () {
  if ($("body").hasClass("calendarPage")) {
    let mixer = mixitup(".listCardsResult");
    let hash = location.hash;
    init();

    $(".formFilters").submit(function (event) {
      event.preventDefault();
      let cat = $("#idCategory option:selected")
        .text()
        .toLowerCase()
        .replace(/ /g, "");
      let team = $("#idTeam option:selected")
        .text()
        .toLowerCase()
        .replace(/ /g, "");
      let journey = $("#idJourney option:selected")
        .text()
        .toLowerCase()
        .replace(/ /g, "");

      filters(cat, team, journey);
    });

    function init() {
      if (hash != "") {
        let teamHash = hash.split("-");
        $("#idTeam option[value=" + teamHash[1] + "]").attr(
          "selected",
          "selected"
        );
        let cat = $("#idCategory option:selected")
          .text()
          .toLowerCase()
          .replace(/ /g, "");
        let team = $("#idTeam option:selected")
          .text()
          .toLowerCase()
          .replace(/ /g, "");
        let journey = $("#idJourney option:selected")
          .text()
          .toLowerCase()
          .replace(/ /g, "");
        filters(cat, team, journey);
      }
    }

    function filters(cat, team, journey) {
      let filter = "";

      if (cat != "todos") filter = filter + "." + cat;
      if (team != "todos") filter = filter + "." + team;
      if (journey != "todos") filter = filter + "." + journey;
      if (filter == "") filter = "*";

      console.log(cat, team, journey, filter);
      mixer.filter(filter);
    }
  }
});
