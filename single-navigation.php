<?php
/* Appel du header */
get_header();
?>

<!-- Contenu de la page 'Single Navigation' -->

<main class="navigation-card">
    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

        <!-- Image principale de la page -->

        <div id="navigation-image">
            <?php $image = get_field( 'image' ); ?>
            <?php if ( $image ) : ?>
                <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
            <?php endif; ?>
            <div class="titre-intro">
                <h2><?php the_field( 'title' ); ?></h2>
                <p><i><?php the_field( 'intro' ); ?></i></p>
            </div>
        </div>
        
        <!-- Texte avec images incorporées -->

        <div id="navigation-contenu">

            <?php the_field( 'description' ); ?>

        </div>
        
        <!-- Bouton de renvoi vers la section Contact -->

        <div id="navigation-contact">
            <a href="/contact" class="contactBtn">Contactez-nous</a>
        </div>

    <?php endwhile; endif; ?>
    
    <!-- Ajout de CSS additionel et élements html -->
    
    <?php if(is_single('electricite-industrielle') || is_single('maintenance-electrique') ) :?>

        <!-- Ajout de flèches retour pour le sous-menu 'Electricite Industrielle' et 'Maintenance electrique' -->

        <div id="retour-link"><a href="/electricite" title="Retour vers Electricite" id="retour">< Retour</a></div>

        <!-- Ajout visu page active pour le sous-menu 'Electricite Industrielle' et 'Maintenance electrique' de la page d'accueil -->

        <script>
            var ajoutClass = document.getElementsByClassName('menu-electricite');
            var i;
            for (i = 0; i < ajoutClass.length; i++) 
            {
                ajoutClass[i].className += ' active';
            }
        </script>
        <style>
            @media (min-width: 1366px){
                body header .nav-container .navbar .nav-menu .active a{
                    background-color: #1f4290;
                    color: white;
                    border-radius: 30px;
                    box-shadow: 0px 10px 7px #808080;
                }
            }
        </style>
    <?php endif; ?>

    <?php if(is_single('automatisme') || is_single('informatique-industrielle') ) :?>

        <!-- Ajout visu page active pour le sous-menu 'Automatisme' et 'Informatique Industrielle' de la page d'accueil -->

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
                    background-color: #1F4290;
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