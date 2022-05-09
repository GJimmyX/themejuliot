/* JS pour la table d'horaires */

( function() {
    var text = document.getElementById( 'textBtn' );
    var button = document.getElementById( 'horaires-btn' );
    var table = document.getElementById( 'horaires-table' );

    button.onclick = toggle;

    function toggle() {
        text.classList.toggle( 'toggle-hide' );
        button.toggleAttribute( 'toggle-table' );
        table.classList.toggle( 'toggle-table' );
    }

} )(jQuery);