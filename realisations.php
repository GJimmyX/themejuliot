<?php
    /* Template Name: Realisations */
?>

<?php
/* Appel du header */
    get_header();
?>

<!-- Contenu de la page 'Nos Réalisations' -->

<main class="realisations">

    <!-- Boucle permettant l'affichage de realisations -->

    <?php
        $args = array(
            'post_type' => 'realisations',
            'posts_per_page' => 6,
            'paged' => get_query_var('paged'),
        );
        $t = query_posts($args);

    ?>

    <!-- Affichage des realisations -->

    <div class="realisations-disposition">
        <?php
            while ( have_posts() ) : the_post();
        ?>

            <div class="realisations-card">
                <div id="realisations-image">
                    <?php 
                        $image = get_field( 'image' );
                        if ($image) :    
                    ?>
                        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php the_title(); ?>">
                    <?php
                        endif;
                    ?>
                </div>
                <div id="realisations-titre">
                    <h2><?php the_field( 'titre' ); ?></h2>
                </div>
            </div>

        <?php
            endwhile;
        ?>
    </div>
    
    <!-- Pagination en fonction du nombre de posts par page -->

    <div class="realisations-pagination">
        <?php the_posts_pagination(); ?>
    </div>
</main>

<?php
/* Appel du footer */
    get_footer();
?>