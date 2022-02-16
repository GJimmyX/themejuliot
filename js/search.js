/* JS pour la barre de recherche */

( function() {
    var button = document.getElementById( 'searchBtn' );
    var search = document.getElementById( 'search-bar' );

    button.onclick = toggle;

    function toggle(){
        button.toggleAttribute( 'toggle-search' );
        search.classList.toggle( 'toggle-search' );
    }

} )(jQuery);