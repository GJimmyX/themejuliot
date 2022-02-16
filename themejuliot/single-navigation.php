<?php
/* Appel du header */
get_header();
?>

<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

    <?php $image = get_field( 'image' ); ?>
    <?php if ( $image ) : ?>
        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
    <?php endif; ?>
    <?php if ( $link ) : ?>
        <h1><a href="<?php the_permalink(); ?>"><?php echo esc_html( $link ); ?></a></h1>
    <?php endif; ?>

<?php endwhile; endif; ?>

<?php
/* Appel du footer */
get_footer();
?>