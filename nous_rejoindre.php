<?php
    /* Template Name: Rejoins-nous */
?>

<?php
/* Appel du header */
    get_header();
?>

<!-- Contenu de la page 'Nous Rejoindre' -->

<main class="nous-rejoindre">

    <!-- Boucle permettant l'affichage d'offres d'emploi -->

    <?php
        $args = array(
            'post_type' => 'rejoindre',
            'posts_per_page' => 5,
            'paged' => get_query_var('paged'),
        );
        $t = query_posts($args);
    ?>

    <!-- Affichage des offres d'emploi -->

    <div class="nous-rejoindre-disposition">
        <?php
            while ( have_posts() ) : the_post();
        ?>

            <div class="nous-rejoindre-card">
                <div id="nous-rejoindre-titre">
                    <a href="/single-nous_rejoindre"><h2><?php the_field( 'nom_de_loffre' ); ?></h2></a>
                </div>
            </div>
            
        <?php
            endwhile;
        ?>
    </div>

</main>

<?php
/* Appel du footer */
    get_footer();
?>