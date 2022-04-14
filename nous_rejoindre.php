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
                <div class="nous-rejoindre-titre">
                    <a href="<?php the_permalink(); ?>"><h2><?php the_field( 'nom_de_loffre' ); ?></h2></a>
                </div>
                <div class="nous-rejoindre-infos">
                    <?php
                        $local_compare = get_field( 'localisation' );
                        if ($local_compare == 'Essarts En Bocage') :
                            $local_key = 'dw9Ugbqx2zkpui2K6';
                        else :
                            $local_key ='6B4DC4rLGQ7QrFVn8';
                        endif;
                    ?>
                    <p class="localisation"><i class="fas"></i><a href="<?php echo "https://goo.gl/maps/$local_key"; ?>" target="_blank" class="localisation"><?php the_field( 'localisation' ); ?></a></p>
                    <?php
                        $domain_compare = get_field( 'type_demploi' );
                        if ($domain_compare == 'Automatisme'){
                            $domaine_key = '/automatisme';
                        }
                        else if ($domain_compare == 'Electricite Industrielle'){
                            $domaine_key = '/navigation/electricite-industrielle';
                        } 
                        else if ($domain_compare == 'Maintenance Electrique'){
                            $domaine_key = '/navigation/maintenance-electrique';
                        }
                        else{
                            $domaine_key = '/informatique-industrielle';
                        }
                    ?>
                    <p class="domaine"><i class="fa-solid"></i><a href="<?php echo "$domaine_key"; ?>" target="_blank" class="domaine"><?php the_field( 'type_demploi' ); ?></a></p>
                </div>
            </div>
            
        <?php
            endwhile;
        ?>
    </div>
    
    <!-- Pagination faite en fonction du nombre de posts par page -->

    <div class="nous-rejoindre-pagination">
        <?php the_posts_pagination(); ?>
    </div>
</main>

<?php
/* Appel du footer */
    get_footer();
?>