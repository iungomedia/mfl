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
  if (current_size == "xs") return 2;
  else if (current_size == "sm") return 2;
  else if (current_size == "md") return 3;
  else if (current_size == "lg") return 4;
  else if(current_size == "xl") return 5;
  else if(current_size == "xxl") return 6;
  else if(current_size == "xxxl") return 7;
  return 9;
}

function computeOwlResponsiveConfig() {
  let responsive = {};
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
  return $(".listResultCenterBottomBar");
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
  initOwlCarousel();

  $(".triggerNavbar").click(function() {
    $(".mflNavbarCollapse").addClass("open");
    document.querySelector("html").style.overflow = "hidden";
  });

  $(".closeMenuResponsive").click(function() {
    $(".mflNavbarCollapse").removeClass("open");
    document.querySelector("html").style.overflow = "initial";
  });
});
