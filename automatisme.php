<?php
/* Template name: Automatisme */
?>

<?php
/* Appel du header */
    get_header();
?>

<!-- Contenu de la page 'Automatisme' -->

<main class="automatisme">

    <!-- Boucle pour récupérer le bloc correspondant à: 'automatisme' -->

    <?php
        $sectionautomatisme = new WP_Query();
        $sectionautomatisme->query(array(
                'post_type' => 'Navigation',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'bloc',
                        'field'    => 'name',
                        'terms'    => 'domaine-automatisme',
                    ),
                ),
                'order' => 'ASC'
            )
        );

    ?>  
    
    <div class="contenu-automatisme">

    <!-- Affichage du contenu correspondant à: 'informatique industrielle' -->

    <?php

        if( $sectionautomatisme->have_posts() ) : while( $sectionautomatisme->have_posts() ) : $sectionautomatisme->the_post();
    ?>

            <div class="automatisme-card">

                <!-- Image principale de la page -->

                <div id="automatisme-image">
                    <?php 
                        $image = get_field( 'image' );
                        if ( $image ) ?>
                            <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
                        <?php
                    ?>
                    <div class="titre-intro">
                        <h2><?php the_field( 'title' ); ?></h2>
                        <p><i><?php the_field( 'intro' ); ?></i></p>
                    </div>
                </div>

                <!-- Texte avec images incorporées -->

                <div id="automatisme-contenu">

                    <?php the_field( 'description' ); ?>

                </div>

                <!-- Bouton de renvoi vers la section Contact -->

                <div id="automatisme-contact">
                    <a href="/contact" class="contactBtn">Contactez-nous</a>
                </div>
            </div>

        <?php endwhile; endif; ?>

    </div>
</main>

<?php
/* Appel du footer */
    get_footer();
?>