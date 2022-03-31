/* JS pour la table d'horaires */

( function() {
    var button = document.getElementById( 'horaires-btn' );
    var table = document.getElementById( 'horaires-table' );

    button.onclick = toggle;

    function toggle() {
        button.toggleAttribute( 'toggle-table' );
        table.classList.toggle( 'toggle-table' );
    }

} )(jQuery);