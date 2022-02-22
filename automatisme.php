<?php
/* Template name: Automatisme */
?>

<?php
/* Appel du header */
    get_header();
?>

<!-- Contenu de la page 'Automatisme' -->

<main class="automatisme">

    <?php
        $sectionautomatisme = new WP_Query();
        $sectionautomatisme->query(array(
                'post_type' => 'Navigation',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'nav-accueil',
                        'field'    => 'name',
                        'terms'    => 'automatisme',
                    ),
                ),
                'order' => 'ASC'
            )
        );

    ?>  <div class="contenu-automatisme">
    <?php

        if( $sectionautomatisme->have_posts() ) : while( $sectionautomatisme->have_posts() ) : $sectionautomatisme->the_post();
    ?>

            <div class="automatisme-card">
                <?php 
                    $image = get_field( 'image' );
                    if ( $image ) ?>
                        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
                    <?php
                ?>
            </div>

        <?php endwhile; endif; ?>

    </div>
</main>

<?php
/* Appel du footer */
    get_footer();
?>