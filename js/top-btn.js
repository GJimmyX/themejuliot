// Script pour le bouton de remontée

// On prend le bouton
var mybutton = document.getElementById("topBtn");

// Quand on descend vers le bas de la page, on affiche le bouton
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 150 || document.documentElement.scrollTop > 150) {
    mybutton.style.display = "flex";
  } else {
    mybutton.style.display = "none";
  }
}

// Lorsque l'on clique sur le bouton, on remonte sur le haut de la page
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}