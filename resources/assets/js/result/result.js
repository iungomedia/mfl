"use strict";

$(function () {
  if ($("body").hasClass("resultPage")) {
    let mixer = mixitup(".listCardsResult");

    function getText(id) {
      return $(id)
        .text()
        .toLowerCase()
        .replace(/ /g, "");
    }

    function getFormData() {
      let cat = getText("#idCategory option:selected");
      let team = getText("#idTeam option:selected");
      let journey = getText("#idJourney option:selected");

      return { cat, team, journey };
    }

    $(".formFilters").submit(function (event) {
      event.preventDefault();
      let { cat, team, journey } = getFormData();

      let filter = "";

      if (cat != "todos") filter = filter + "." + cat;
      if (team != "todos") filter = filter + "." + team;
      if (journey != "todos") filter = filter + "." + journey;
      if (filter == "") filter = "*";

      mixer.filter(filter);
    });
  }
});
