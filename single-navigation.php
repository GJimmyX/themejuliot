<?php
/* Appel du header */
get_header();
?>

<!-- Contenu de la page 'Single Navigation' -->

<main class="navigation-card">
    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

        <div id="navigation-image">
            <?php $image = get_field( 'image' ); ?>
            <?php if ( $image ) : ?>
                <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
            <?php endif; ?>
        </div>

        <div id="navigation-contenu">
            <h2><?php the_field( 'title' ); ?></h2>

            <?php the_field( 'description' ); ?>
        </div>

    <?php endwhile; endif; ?>
    
    <!-- Ajout de CSS additionel et élements html -->
    
    <!-- Ajout de flèches retour pour le sous-menu 'Installation Industrielle' et 'Maintenance Industrielle' -->
    
    <?php if(is_single('electricite-industrielle') || is_single('maintenance-electrique') ) :?>
        <a href="/electricite" title="Retour vers Electricite" id="retour">< Retour</a>
    <?php endif; ?>

    <!-- Ajout visu page active pour le sous-menu 'Automatisme' et 'Informatique Industrielle' de la page d'accueil -->

    <?php if(is_single('automatisme') || is_single('informatique-industrielle') ) :?>
        <script>
            <?php if(is_single('automatisme') ) : ?>
                var ajoutClass = document.getElementsByClassName('menu-automatisme');
            <?php endif; ?>
            <?php if(is_single('informatique-industrielle') ) : ?>
                var ajoutClass = document.getElementsByClassName('menu-informatique-industrielle');
            <?php endif; ?>
            var i;
            for (i = 0; i < ajoutClass.length; i++) 
            {
                ajoutClass[i].className += ' active';
            }
        </script>
        <style>
            @media (min-width: 1366px){
                body header .nav-container .navbar .nav-menu .active a{
                    background-color: #202f86;
                    color: white;
                    border-radius: 30px;
                    box-shadow: 0px 10px 7px #808080;
                }
            }
        </style>
    <?php endif; ?>
</main>

<?php
/* Appel du footer */
get_footer();
?>