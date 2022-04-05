<?php
/* Template name: Informatique Industrielle */
?>

<?php
/* Appel du header */
    get_header();
?>

<!-- Contenu de la page 'Informatique Industrielle' -->

<main class="informatique-industrielle">

    <!-- Boucle pour récupérer le bloc correspondant à: 'informatique industrielle' -->

    <?php
        $sectioninfoindus = new WP_Query();
        $sectioninfoindus->query(array(
                'post_type' => 'Navigation',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'bloc',
                        'field'    => 'name',
                        'terms'    => 'domaine-informatique-industrielle',
                    ),
                ),
                'order' => 'ASC'
            )
        );

    ?>  
    
    <div class="contenu-informatique-industrielle">

    <!-- Affichage du contenu correspondant à: 'informatique industrielle' -->

    <?php

        if( $sectioninfoindus->have_posts() ) : while( $sectioninfoindus->have_posts() ) : $sectioninfoindus->the_post();
    ?>

            <div class="informatique-industrielle-card">
                <div id="informatique-industrielle-image">
                    <?php 
                        $image = get_field( 'image' );
                        if ( $image ) ?>
                            <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
                        <?php
                    ?>
                </div>
                <div id="informatique-industrielle-contenu">
                    <h2><?php the_field( 'title' ); ?></h2>

                    <?php the_field( 'description' ) ?>

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