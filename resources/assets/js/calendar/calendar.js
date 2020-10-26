$(function() {
  if ($("body").hasClass("calendarPage")) {
    let container_id = ".listCardsResult";
    let container = $(container_id);

    let mixer = mixitup(container_id);

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

    function filter() {
      let { cat, team, journey } = getFormData();

      let filter = "";

      if (cat != "todos") filter = filter + "." + cat;
      if (team != "todos") filter = filter + "." + team;
      if (journey != "todos") filter = filter + "." + journey;
      if (filter == "") filter = "*";

      mixer.filter(filter).then(() => container.show());
    }

    $(".formFilters").submit(function(event) {
      event.preventDefault();
      filter();
    });

    filter();
  }
});
