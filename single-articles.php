<?php
/* Appel du header */
get_header();
?>

<!-- Contenu de la page 'Single Articles' -->

<main class="articles">
    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

        <div class="articles-structure">
            <div id="articles-image">
                <?php $image = get_field( 'image' ); ?>
                <?php if ( $image ) : ?>
                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                <?php endif; ?>
            </div>

            <div id="articles-contenu">
                <div class="articles-descriptif">
                    <h2><?php the_field( 'titre' ); ?></h2>
                    <p><?php the_field( 'description' ); ?></p>
                </div>
            </div>
        </div>

    <?php endwhile; endif; ?>

    <div class="articles-slider">
        <div class="articles-elements">
            <?php

                $articlesSlider = new WP_Query();
                $articlesSlider->query(array(
                    'post_type' => 'articles',
                    'posts_per_page' => 2,
                    )
                );

                while ($articlesSlider->have_posts() ) : $articlesSlider->the_post();
            ?>

            <div class="article-structure">
                <ul class="article-list">
                    <?php if ( has_post_thumbnail() ) {
                        the_post_thumbnail();
                        } else { ?>
                            <img src="<?php echo get_template_directory_uri() . '/img/default-image.png'; ?>" alt="<?php the_title(); ?>" />
                    <?php 
                        } 
                    ?>
                    <h2><?php the_title(); ?></h2>
                </ul>
            </div>

            <?php endwhile; ?>
        </div>
        <div class="articles-elements">
            <?php

                $articlesSlider = new WP_Query();
                $articlesSlider->query(array(
                    'post_type' => 'articles',
                    'posts_per_page' => 2,
                    'offset' => 2,
                    )
                );

                while ($articlesSlider->have_posts() ) : $articlesSlider->the_post();
            ?>

            <div class="article-structure">
                <ul class="article-list">
                <?php if ( has_post_thumbnail() ) {
                        the_post_thumbnail();
                        } else { ?>
                            <img src="<?php echo get_template_directory_uri() . '/img/default-image.png'; ?>" alt="<?php the_title(); ?>" />
                    <?php 
                        } 
                    ?>
                    <h2><?php the_title(); ?></h2>
                </ul>
            </div>

            <?php endwhile; ?>
        </div>
    </div>
</main>

<?php
/* Appel du footer */
get_footer();
?>