<?php
/* Appel du header */
    get_header();
?>

<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
        <main class="page-header">
            <h1 class="page-title text-center"><?php _e( 'Page non trouvée', 'themejuliot' ); ?></h1>
        </main>
        <div class="page-wrapper">
            <div class="page-content">
                <img src="<?php echo get_template_directory_uri() . '/img/404-1.gif'; ?>" alt="">
                <p class="text-center"><?php _e( "La page que vous cherchez n'est pas disponible" ); ?></p>
            </div>
        </div>
    </div>
</div>

<?php
/* Appel du footer */
    get_footer();
?>