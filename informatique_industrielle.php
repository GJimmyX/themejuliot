<?php
/* Template name: Informatique Industrielle */
?>

<?php
/* Appel du header */
    get_header();
?>

<!-- Contenu de la page 'Informatique Industrielle' -->

<main class="informatique-industrielle">

    <?php
        $sectioninfoindus = new WP_Query();
        $sectioninfoindus->query(array(
                'post_type' => 'Navigation',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'nav-accueil',
                        'field'    => 'name',
                        'terms'    => 'informatique-industrielle',
                    ),
                ),
                'order' => 'ASC'
            )
        );

    ?>  <div class="contenu-informatique-industrielle">
    <?php

        if( $sectioninfoindus->have_posts() ) : while( $sectioninfoindus->have_posts() ) : $sectioninfoindus->the_post();
    ?>

            <div class="informatique-industrielle-card">
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