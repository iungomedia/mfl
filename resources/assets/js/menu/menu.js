const breakpoints = [
  "--breakpoint-xs",
  "--breakpoint-sm",
  "--breakpoint-md",
  "--breakpoint-lg",
  "--breakpoint-xl",
  "--breakpoint-xxl",
  "--breakpoint-xxxl",
  "--breakpoint-4xl"
];

function computeOwlItems(size, value) {
  let buffer = size.split("-");
  let current_size = buffer[buffer.length - 1];
  if (current_size == "xs") return 1;
  else if (current_size == "sm") return 2;
  else if (current_size == "md") return 3;
  else if (current_size == "lg") return 4;
  else if (current_size == "xl") return 5;
  else if (current_size == "xxl") return 6;
  else if (current_size == "xxxl") return 7;
  else if (current_size == "4xl") return 9;
  return 1;
}

function computeOwlResponsiveConfig() {
  let responsive = { 0: { items: 1 } };
  for (let i = breakpoints.length - 1; i >= 0; i--) {
    let breakpoint = breakpoints[i];
    let value = parseInt(getCssVarValue(breakpoint));
    responsive[value] = { items: computeOwlItems(breakpoint, value) };
  }
  return responsive;
}

function getCssVarValue(variable) {
  return getComputedStyle(document.documentElement).getPropertyValue(variable);
}

function getOwlCarousel() {
  return $(".owl-carousel");
}

function initOwlCarousel() {
  let owl_carousel = getOwlCarousel();
  owl_carousel.owlCarousel({
    margin: 0,
    loop: true,
    nav: false,
    dots: false,
    autoplay: true,
    responsive: computeOwlResponsiveConfig()
  });
}

$(document).ready(function() {
  let section_menu = $(".section-menu");
  let nav_open = $(".action-nav a.open");
  let nav_close = $(".action-nav a.close");
  let body = $("body");

  nav_open.click(() => {
    body.css("overflow", "hidden");
    section_menu.addClass("fullscreen");
  });

  nav_close.click(() => {
    body.css("overflow", "inherit");
    section_menu.removeClass("fullscreen");
  });

  initOwlCarousel();
});
