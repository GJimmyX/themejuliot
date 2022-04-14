<?php
/* Appel du header */
get_header();
?>

<!-- Contenu de la page 'Single Nous Rejoindre' -->

<main class="rejoindre">

    <!-- Retour sur la page centrale d'offres -->

    <div class="returnBtn">
        <a href="<?php echo site_url('nous-rejoindre'); ?>" title="Page précédente" class="return"><i class="fas fa-chevron-left"></i> Retour</a>
    </div>

    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

        <div class="rejoindre-structure">

            <div id="rejoindre-titre">
                <div id="titre-offre">
                    <h2><?php the_field( 'nom_de_loffre' ); ?></h2>
                </div>
                <div id="description-entreprise">
                    <p><?php the_field( 'description_de_lentreprise' ); ?></p>
                </div>
            </div>

            <div id="rejoindre-contenu">
                <div id="localisation-et-type">
                    <p>
                        <i><?php the_field( 'localisation' ); ?></i>
                        -
                        <i><?php the_field( 'type_demploi' ); ?></i>
                    </p>
                </div>
                <div id="contrat">
                    <p><?php the_field( 'type_de_contrat' ); ?></p>
                </div>
                <div id="description-offre">
                    <p><?php the_field( 'description_de_loffre' ); ?></p>
                </div>
            </div>
        </div>

    <?php endwhile; endif; ?>

</main>

<?php
/* Appel du footer */
get_footer();
?>