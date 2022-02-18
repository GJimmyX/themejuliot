/* JS pour le slider de la page d'accueil */

var slideIndex = 0;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var slides = document.getElementsByClassName("slider-elements");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length-1) {slideIndex = 0}
  if (n < 0) {slideIndex = slides.length-1}
  for (var i = 0; i < slides.length; i++) {
    slides[i].style.display = "none"; 
    dots[i].classList.remove("active");
  }
  slides[slideIndex].style.display = "flex";
  dots[slideIndex].classList.add("active");
}

setInterval(function() {
  showSlides(slideIndex += 1);
}, 3000);