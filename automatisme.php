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
                <div id="automatisme-image">
                    <?php 
                        $image = get_field( 'image' );
                        if ( $image ) ?>
                            <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
                        <?php
                    ?>
                </div>
                <div id="automatisme-contenu">
                    <h2><?php the_field( 'title' ); ?></h2>

                    <?php the_field( 'description' ); ?>
                </div>
            </div>

        <?php endwhile; endif; ?>

    </div>
</main>

<?php
/* Appel du footer */
    get_footer();
?>