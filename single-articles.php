<?php
/* Appel du header */
get_header();
?>

<!-- Contenu de la page 'Single Articles' -->

<main class="articles">
    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

        <div id="articles-image">
            <?php $image = get_field( 'image' ); ?>
            <?php if ( $image ) : ?>
                <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
            <?php endif; ?>
        </div>

        <div id="articles-contenu">
            <h2><?php the_field( 'title' ); ?></h2>

            <?php the_field( 'description' ); ?>
        </div>

    <?php endwhile; endif; ?>
</main>

<?php
/* Appel du footer */
get_footer();
?>