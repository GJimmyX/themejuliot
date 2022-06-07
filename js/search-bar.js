/* JS pour la barre de recherche */

( function() {
    var button = document.getElementById( 'search-btn' );
    var search = document.getElementById( 'search-bar-input' );

    button.onclick = toggle;

    function toggle() {
        button.toggleAttribute( 'toggle-search' );
        search.classList.toggle( 'toggle-search' );
    }

} )(jQuery);