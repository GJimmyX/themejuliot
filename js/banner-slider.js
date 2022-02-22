/* JS pour le slider entreprise de la page d'accueil */

var bannerSlideIndex = 0;
showBannerslide(bannerSlideIndex);

var bannerInterval;

function showBannerslide(n) {
  var bannerSlide = document.getElementsByClassName("banner-elements");
  if (n > bannerSlide.length-1) {bannerSlideIndex = 0}
  if (n < 0) {bannerSlideIndex = bannerSlide.length-1}
  for (var i = 0; i < bannerSlide.length; i++) {
    bannerSlide[i].style.display = "none";
  }
  bannerSlide[bannerSlideIndex].style.display = "flex";
}

function startBannerslide() {
    bannerInterval = setInterval(function() {
    showBannerslide(bannerSlideIndex += 1);
  }, 3000);
}

function stopBannerslide() {
  clearInterval(
    bannerInterval
  );
}

$(function() {
  startBannerslide();
  $('.banner-elements UL').hover(function() {
    stopBannerslide();
  }, function() {
    startBannerslide();
  })
});