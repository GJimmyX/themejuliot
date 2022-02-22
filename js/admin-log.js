/* JS pour la section admin */

( function() {
    var button = document.getElementById( 'adminBtn' );
    var log = document.getElementById( 'admin-log' );

    button.onclick = toggle;

    function toggle(){
        button.toggleAttribute( 'toggle-admin' );
        log.classList.toggle( 'toggle-admin' );
    }

} )(jQuery);