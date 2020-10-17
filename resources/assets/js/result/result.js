"use strict";

$(function () {
  if ($("body").hasClass("resultPage")) {
    let mixer = mixitup(".listCardsResult");

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

      let filter = "";

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
