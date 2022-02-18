<?php
/* Template name: Electricite */
?>

<?php
/* Appel du header */
    get_header();
?>

<!-- Contenu de la page 'Électricité' -->

<main class="electricite">

    <?php
        $sectionelec = new WP_Query();
        $sectionelec->query(array(
                'post_type' => 'Navigation',
                'order' => 'ASC'
            )
        );

    ?>  <div class="nav-elec">
    <?php

        while ($sectionelec->have_posts()) : $sectionelec->the_post();
    ?>
        <?php if ( get_field( 'elec_' ) == 1 ) : ?>

            <div class="elec-card">
                <?php 
                    $image = get_field( 'image' );
                    if ( $image ) ?>
                        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
                    <?php
                ?>
                
                <div class="elec-hover">
                    <a href="<?php the_permalink(); ?>"><p><?php the_field( 'title' ) ?></p></a>
                </div>
            </div>

        <?php endif; endwhile; ?>

    </div>
</main>

<?php
/* Appel du footer */
    get_footer();
?>