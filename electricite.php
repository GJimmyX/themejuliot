<?php
/* Template name: Electricite */
?>

<?php
/* Appel du header */
    get_header();
?>

<!-- Contenu de la page 'Électricité' -->

<main class="electricite">

    <!-- Boucle pour récupérer le bloc correspondant en catégorie à: 'domaine-electricite' -->

    <?php
        $sectionelectricite = new WP_Query();
        $sectionelectricite->query(array(
                'post_type' => 'Navigation',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'bloc',
                        'field'    => 'name',
                        'terms'    => 'domaine-electricite',
                    ),
                ),
                'order' => 'ASC'
            )
        );

    ?>  
    
    <div class="nav-electricite">

    <!-- Affichage du contenu correspondant à: 'electricite' -->

    <?php

        while ($sectionelectricite->have_posts()) : $sectionelectricite->the_post();
    ?>

            <div class="electricite-card">
                <?php 
                    $image = get_field( 'image' );
                    if ( $image ) ?>
                        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
                    <?php
                ?>
                
                <div class="electricite-hover">
                    <a href="<?php the_permalink(); ?>"><p><?php the_field( 'title' ) ?></p></a>
                </div>
            </div>

        <?php endwhile; ?>

    </div>
</main>

<?php
/* Appel du footer */
    get_footer();
?>