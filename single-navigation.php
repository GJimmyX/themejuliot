<?php
/* Appel du header */
get_header();
?>

<!-- Contenu de la page 'Single Navigation' -->

<main class="article-navigation">
    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

        <div id="article-image">
            <?php $image = get_field( 'image' ); ?>
            <?php if ( $image ) : ?>
                <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
            <?php endif; ?>
        </div>

        <div id="article-contenu">
            <h2><?php the_field( 'title' ); ?></h2>

            <?php the_field( 'description' ); ?>
        </div>

    <?php endwhile; endif; ?>
</main>

<?php
/* Appel du footer */
get_footer();
?>