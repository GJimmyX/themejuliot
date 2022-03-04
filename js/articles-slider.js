/* JS pour le slider articles dans la page single */

var articlesSlideIndex = 0;
showArticlesslide(articlesSlideIndex);

var articlesInterval;

function plusArticlesslide(n) {
    showArticlesslide(articlesSlideIndex += n);
    clearInterval(
        articlesInterval
    );
    articlesInterval = setInterval(function() {
        showArticlesslide(articlesSlideIndex += 1);
    }, 5000);
}

function showArticlesslide(n) {
    var articlesSlide = document.getElementsByClassName("articles-elements");
    if (n > articlesSlide.length-1) {articlesSlideIndex = 0}
    if (n < 0) {articlesSlideIndex = articlesSlide.length-1}
    for (var i = 0; i < articlesSlide.length; i++) {
        articlesSlide[i].style.display = "none";
    }
    articlesSlide[articlesSlideIndex].style.display = "flex";
}

function startArticlesslide() {
    articlesInterval = setInterval(function() {
        showArticlesslide(articlesSlideIndex += 1);
    }, 5000);
}

function stopArticlesslide() {
    clearInterval(
        articlesInterval
    );
}

$(function() {
    startArticlesslide();
    $('.articles-elements UL').hover(function() {
        stopArticlesslide();
    }, function() {
        startArticlesslide();
    })
});