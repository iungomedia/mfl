$(function() {
  if ($("body").hasClass("cheerleaderPage")) {

    let data = document.querySelectorAll(".assets");
    let timers = [];

    function toggleSlider(assets) {
      let image_hidden_count = assets.querySelectorAll(".asset.hidden").length;

      if (image_hidden_count == 0) return;

      let image_hidden_last = assets.querySelector(".asset.hidden:not(.last)");

      if (!image_hidden_last && image_hidden_count > 2) return;

      if (image_hidden_count == 1)
        image_hidden_last = assets.querySelector(".asset.hidden");

      let image_last = assets.querySelector(".asset.hidden.last");
      let image_showing = assets.querySelector(".asset:not(.hidden)");

      if (image_last) image_last.classList.remove("last");

      image_showing.classList.add("hidden", "last");
      image_hidden_last.classList.remove("hidden");
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
      }, randomNumber(5000, 12000));
    }

    function onTeamClick(event) {
      let current_target = event.currentTarget;
      let index = parseInt(current_target.dataset.index);
      let assets = parseAssets(teams[index].assets);
      Fresco.show(assets, {
        youtube: {
          autohide: 1,
          autoplay: 1,
          controls: 1,
          enablejsapi: 1,
          hd: 1,
          iv_load_policy: 3,
          loop: 0,
          modestbranding: 1,
          showinfo: 0,
          rel: 0,
          vq: 'hd1080'
        },
        onShow() {
          document.querySelector("html").style.overflow = "hidden";
        },
        afterHide() {
          document.querySelector("html").style.overflow = "initial";
        }
      });
    }

    function parseAssets(assets) {
      return assets.map(asset => {
        return { url: asset.source, caption: asset.title };
      });
    }

    initSlider();
  }
});
