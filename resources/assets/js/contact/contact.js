$(function () {
  if ($("body").hasClass("contactPage")) {
    let map;
    let Lat = parseFloat($(".mapContact").attr("data-lat"));
    let Lon = parseFloat($(".mapContact").attr("data-lon"));
    initMap();
    function initMap() {
      console.log(Lon);
      map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: Lat, lng: Lon },
        zoom: 12,
      });

      let marker = new google.maps.Marker({
        position: { lat: Lat, lng: Lon },
        map: map,
      });
    }
  }
});
