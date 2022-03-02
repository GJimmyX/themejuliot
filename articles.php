<?php
    /* Template name: Articles */
?>

<?php
/* Appel du header */
get_header();
?>

<main class="actualites">
    <?php
        $args = array(
            'post_type' => 'articles',
            'posts_per_page' => 2,
            'paged' => get_query_var('paged'),
        );
        $t = query_posts($args);

        while ( have_posts() ) : the_post();
    ?>

            <div class="actualites-card">
                <h2><?php the_title(); ?></h2>
            </div>

        <?php endwhile; ?>
        
    <?php the_posts_pagination(); ?>
</main>

<?php
/* Appel du footer */
get_footer();
?>