<?php
/* Appel du header */
get_header();
?>

<!-- Contenu de la page 'Single Articles' -->

<main class="articles">

    <!-- Retour sur la page centrale d'articles -->

    <div class="returnBtn">
        <a href="<?php echo site_url('actualites'); ?>" title="Page précédente" class="return"><i class="fas fa-chevron-left"></i> Retour</a>
    </div>

    <!-- Affichage d'un seul article -->

    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

        <div class="articles-structure">
            <div id="articles-image">
                <?php $image = get_field( 'image' ); ?>
                <?php if ( $image ) : ?>
                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php the_title(); ?>" />
                <?php endif; ?>
            </div>

            <div id="articles-contenu">
                <div class="articles-descriptif">
                    <h2><?php the_field( 'titre' ); ?></h2>
                    <p><?php the_field( 'description' ); ?></p>
                </div>
            </div>
        </div>

        <div id="articles-commentaires">
            <?php comments_template();  // Section commentaire ?>
        </div>

    <?php endwhile; endif; ?>
    
    <!-- Slider des articles les plus récents (les 4 derniers) -->
    
    <?php

    $args = array(
        'post_type' => 'articles',
    );
    $articlesNumber = query_posts($args);

    if ( count($articlesNumber) >= 4 ) : ?>

        <div class="articles-slider">

            <!-- Bouton de commande du slider en manuel -->

            <div class="articles-button">
                <p class="articles-slider-button" onclick="plusArticlesslide(-1)"><i class="fas fa-chevron-circle-left"></i></p>
            </div>
            <div class="articles-elements articles-fade">

                <!-- Boucle pour l'affichage de deux artciles par slide -->

                <?php

                    $articlesSlider = new WP_Query();
                    $articlesSlider->query(array(
                        'post_type' => 'articles',
                        'posts_per_page' => 2,
                        )
                    );

                    if ($articlesSlider->have_posts() ) : while ($articlesSlider->have_posts() ) : $articlesSlider->the_post();
                ?>

                <div class="article-structure">
                    <ul class="article-list">
                        <li>
                            <?php if ( has_post_thumbnail() ) {
                                the_post_thumbnail( '', array( 'alt' => 'Image Article' ) );
                                } else { ?>
                                    <img src="<?php echo get_template_directory_uri() . '/img/default-image.png'; ?>" alt="Image Article" />
                            <?php 
                                } 
                            ?>
                        </li>
                        <li>
                            <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                        </li>
                    </ul>
                </div>

                <?php endwhile; endif; ?>
            </div>
            <div class="articles-elements articles-fade">

                <!-- Boucle pour l'affichage de deux artciles par slide -->

                <?php

                    $articlesSlider = new WP_Query();
                    $articlesSlider->query(array(
                        'post_type' => 'articles',
                        'posts_per_page' => 2,
                        'offset' => 2,
                        )
                    );

                    if ($articlesSlider->have_posts() ) : while ($articlesSlider->have_posts() ) : $articlesSlider->the_post();
                ?>

                <div class="article-structure">
                    <ul class="article-list">
                        <li>
                            <?php if ( has_post_thumbnail() ) {
                                the_post_thumbnail( '', array( 'alt' => 'Image Article' ) );
                                } else { ?>
                                    <img src="<?php echo get_template_directory_uri() . '/img/default-image.png'; ?>" alt="Image Article" />
                            <?php 
                                } 
                            ?>
                        </li>
                        <li>
                            <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                        </li>
                    </ul>
                </div>

                <?php endwhile; endif; ?>
            </div>

            <!-- Bouton de commande du slider en manuel -->

            <div class="articles-button">
                <p class="articles-slider-button" onclick="plusArticlesslide(1)"><i class="fas fa-chevron-circle-right"></i></p>
            </div>
        </div>
    <?php endif; ?>
</main>

<?php
/* Appel du footer */
get_footer();
?>