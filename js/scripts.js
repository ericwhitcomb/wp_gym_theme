jQuery(document).ready(($) => {
  // Make the menu responsive
  $("#menu-main-menu").slicknav({
    // appendTo: ".site-header",
  });

  // Run the bxSlider library on testimonials
  $(".testimonials-list").bxSlider({
    controls: false,
    mode: "fade",
  });

  // When the page is ready add the fixed menu if position is > 300px
  const headerScroll = document.querySelector(".navigation-bar");
  const rect = headerScroll.getBoundingClientRect();
  const topDistance = Math(abs(rect.top));

  fixedMenu(topDistance);
});

// Adds a fixed menu on top
const fixedMenu = (scroll) => {
  const headerScroll = document.querySelector(".navigation-bar");

  // in the case the scroll is greater than 300 add some classes
  if (scroll > 300) {
    headerScroll.classList.add("fixed-top");
  } else {
    headerScroll.classList.remove("fixed-top");
  }
};

// keeps track of the vertical scroll and calls fixed menu when needed
window.onscroll = () => {
  const scroll = window.scrollY;
  fixedMenu(scroll);
};
