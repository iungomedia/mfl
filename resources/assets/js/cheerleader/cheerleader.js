$(function() {
  if ($("body").hasClass("cheerleaderPage")) {
    let data = document.querySelectorAll(".assets");
    let timers = [];

    function toggleSlider(assets) {
      let { length: image_hidden_count } = assets.querySelectorAll(
        ".asset.image.hidden"
      );

      if (image_hidden_count == 0) return;

      let image_hidden = assets.querySelector(".asset.image.hidden:not(.last)");

      if (!image_hidden && image_hidden_count > 2) {
        return console.log("se evita");
      }

      if (image_hidden_count == 1) {
        image_hidden = assets.querySelector(".asset.image.hidden");
      }

      let image_last = assets.querySelector(".asset.image.hidden.last");
      let image_showing = assets.querySelector(".asset.image:not(.hidden)");

      if (image_last) image_last.classList.remove("last");

      image_showing.classList.add("hidden", "last");
      image_hidden.classList.remove("hidden");
    }

    function stopSlider(index) {
      if (timers[index]) {
        clearTimeout(timers[index]);
      }
    }

    function initSlider() {
      for (let i = 0, length = data.length; i < length; i++) {
        const assets = data[i];
        $(assets.parentElement).click(onTeamClick);
        registerSlider(assets, i);
      }
    }

    function registerSlider(assets, index) {
      timers[index] = setTimeout(function() {
        toggleSlider(assets);
      }, randomNumber(6000, 10000));
    }

    function onTeamClick(event) {
      let current_target = event.currentTarget;
      let index = parseInt(current_target.dataset.index);
      let assets = parseAssetsToGlitchbox(teams[index].assets);

      const gallery = GLightbox({
        touchNavigation: true,
        autoplayVideos: true,
        zoomable: true
      });

      gallery.setElements(assets);
      gallery.open();
    }

    function detectSource(href) {
      if (href.includes("youtube")) return "youtube";
      else if (href.includes("vimeo")) return "vimeo";
      return "local";
    }

    function parseAssetsToGlitchbox(assets) {
      return assets.map(asset => {
        return {
          href: asset.source,
          type: asset.type,
          description: asset.title,
          source: detectSource(asset.source)
        };
      });
    }

    initSlider();
  }
});
