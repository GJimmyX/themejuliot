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
            'posts_per_page' => 4,
            'paged' => get_query_var('paged'),
        );
        $t = query_posts($args);

    ?>

    <div class="actualites-disposition">
    <?php
        while ( have_posts() ) : the_post();
    ?>

            <div class="actualites-card">
                <?php if ( has_post_thumbnail() ) {
                    the_post_thumbnail();
                    } else { ?>
                        <img src="<?php echo get_template_directory_uri() . '/img/default-image.png'; ?>" alt="<?php the_title(); ?>" />
                <?php 
                    } 
                ?>
                <a href="<?php the_permalink(); ?>"><h2 class="actualites-title"><?php the_title(); ?></h2></a>
            </div>

        <?php endwhile; ?>
    </div>
    
    <div class="actualites-pagination">
        <?php the_posts_pagination(); ?>
    </div>
</main>

<?php
/* Appel du footer */
get_footer();
?>