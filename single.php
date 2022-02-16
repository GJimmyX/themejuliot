<?php
/* Appel du header */
    get_header();
?>

<!-- Structure de l'article -->

<main class="article">
    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

    <?php the_post_thumbnail(); ?>
    <a href="<?php bloginfo('url'); ?>"><i class="fas fa-chevron-left"></i>Retour</a>
    <h2><?php the_title(); ?></h2>
    <div class="text"><?php the_content(); ?></div>

    <?php endwhile; endif; ?>
</main>

<?php
/* Appel du footer */
    get_footer();
?>