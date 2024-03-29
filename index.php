<?php
/* Appel du header */
    get_header();
?>

<!-- Contenu de la page d'accueil -->

<main class="accueil">

    <!-- Titre de la page d'accueil -->

    <h1>Études et Réalisations en automatisme et électricité industrielle</h1>

    <!-- Section navigation de la page d'accueil -->

    <!-- Style nav -->

    <div class="section_01">

        <!-- Style -->

        <?php
            wp_nav_menu(
                array(
                    'container' => 'ul',
                    'theme_location' => 'Secondary',
                    'menu_class' => 'nav-menu',
                    'before' => '<div class="hover">',
                    'after' => '</div>',
                    'link_before' => '<p>',
                    'link_after' => '</p>',
                )
            );
        ?>

    </div>

    <!-- Section du carousel/slider de la page d'accueil -->

    <div class="section_02">
        <div class="carousel-slider">
            <div class="control-slider">
                <button class="prev" name="precedent" onclick="plusSlides(-1)"><i class="fas"></i></button>
                <div id="slider">
                    <div class="slider-elements fade">
                        <img src="<?php echo get_template_directory_uri() . '/img/img_accueil.jpg'; ?>" alt="Image Slider">
                    </div>
                    <div class="slider-elements fade">
                        <img src="<?php echo get_template_directory_uri() . '/img/img_accueil_01.png'; ?>" alt="Image Slider">
                    </div>
                    <div class="slider-elements fade">
                        <img src="<?php echo get_template_directory_uri() . '/img/img_accueil_02.png'; ?>" alt="Image Slider">
                    </div>
                </div>
                <button class="next" name="suivant" onclick="plusSlides(1)"><i class="fas"></i></button>
            </div>
            <div class="indicators">
                <span class="dot" onclick="currentSlide(3)"></span>
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
            </div>
        </div>

        <!-- Texte annexe au carousel/slider -->

        <div class="texte">
            <h2><b>JULIOT ÉLECTRICITÉ, C'EST:</b></h2>
            <p><img src="<?php echo get_template_directory_uri() . '/img/listBtn.png'; ?>" alt="Bouton de liste">L'expérience et la souplesse d'une équipe de 12 personnes pour répondre à vos besoins.</p>
            <p><img src="<?php echo get_template_directory_uri() . '/img/listBtn.png'; ?>" alt="Bouton de liste">Des techniciens aguerris dans le domaine de l'automatisme industriel.</p>
            <p><img src="<?php echo get_template_directory_uri() . '/img/listBtn.png'; ?>" alt="Bouton de liste">Un bureau d'études compétent et innovant capable de réaliser vos projets en automatisme, informatique industrielle et électricité tertiaire / industrielle.</p>
            <p><img src="<?php echo get_template_directory_uri() . '/img/listBtn.png'; ?>" alt="Bouton de liste">L'accent sur la qualité et la sécurité de nos installations.</p>
            <p><img src="<?php echo get_template_directory_uri() . '/img/listBtn.png'; ?>" alt="Bouton de liste">Une réponse rapide en cas de problème sur votre équipement.</p>
            <p><img src="<?php echo get_template_directory_uri() . '/img/listBtn.png'; ?>" alt="Bouton de liste">Qualifications QUALIFELEC mentions chauffage, automatisme et IRVE.</p>
            
            <!-- Liens des qualifications de Juliot Électricité -->

            <div class="links">
                <a href="https://pros.qualifelec.fr/qualification/chauffage-electrique" target="_blank" title="Qualifelec mention chauffage"><img src="<?php echo get_template_directory_uri() . '/img/qualifelec_mention_chauffage.png'; ?>" alt="Qualification mention chauffage"></a>
                <a href="https://pros.qualifelec.fr/page/irve" target="_blank" title="Qualifelec mention électricité"><img src="<?php echo get_template_directory_uri() . '/img/qualifelec_mention_electricite.png'; ?>" alt="Qualification mention électricité"></a>
            </div>
        </div>
    </div>

    <!-- Section Articles de la page d'accueil -->

    <div class="section_03">
        <?php
            $latestPost = new WP_Query();
            $latestPost->query(array(
                    'post_type' => 'articles',
                    'posts_per_page' => 1,
                )
            );

            while ($latestPost->have_posts() ) : $latestPost->the_post();
        ?>

            <div class="latestPost-card">
                <?php if ( has_post_thumbnail() ) {
                    the_post_thumbnail( '', array( 'alt' => 'Image Article' ) );
                    } else { ?>
                        <img src="<?php echo get_template_directory_uri() . '/img/default-image.png'; ?>" alt="Image Article" />
                <?php 
                    } 
                ?>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </div>

        <?php endwhile; ?>

        <!-- Lien vers la page d'articles du site -->
		
		<?php if (wp_count_posts('articles')->publish >= 2) : ?>
        	<a href="actualites" class="renvoi-actu">Plus d'articles...</a>
		<?php endif; ?>
    </div>

    <!-- Section de contact de la page d'accueil -->

    <div class="section_04">

        <!-- Bouton de contact Juliot Électricité -->

        <div class="contactAccueil">
            <?php echo "<div class='accroche_contact'><h2>N'hésitez pas à nous contacter via notre formulaire !</h2><p>Nous vous apporterons une réponse dans les plus brefs délais.</p></div>"; ?>
            <a href="contact" class="contactBtn">Contactez-nous</a>
        </div>

        <!-- Bannière slider d'entreprises -->

        <div class="company-banner">
            <p id="text-banner">Ils nous font confiance :</p>
            <div id="banner-slider">
                <div class="banner-elements banner-fade">
                    <ul class="banner">
                        <li>
                            <a href="https://www.piveteaubois.com/fr/" target="_blank" title="Piveteau Bois"><img src="<?php echo get_template_directory_uri() . '/img/img_banniere_accueil/piveteau_bois_logo.png' ?>" alt="Piveteau Bois"></a>
                        </li>
                        <li>
                            <a href="https://www.stef.com/" target="_blank" title="Transports STEF"><img src="<?php echo get_template_directory_uri() . '/img/img_banniere_accueil/stef_logo.png' ?>" alt="Transports STEF"></a>
                        </li>
                        <li>
                            <a href="https://www.edycem.fr/" target="_blank" title="Édycem Béton"><img src="<?php echo get_template_directory_uri() . '/img/img_banniere_accueil/edycem_logo.png' ?>" alt="Édycem Béton"></a>
                        </li>
                        <li>
                            <a href="https://www.materiaux.eiffageroute.com/carrieres-mousset" target="_blank" title="Carrières Mousset"><img src="<?php echo get_template_directory_uri() . '/img/img_banniere_accueil/logo_mousset_carrieres.png' ?>" alt="Carrières Mousset"></a>
                        </li>
                        <li>
                            <a href="https://www.kmoreau.fr/" target="_blank" title="Carrières Kleber Moreau"><img src="<?php echo get_template_directory_uri() . '/img/img_banniere_accueil/kleber_moreau_logo.png' ?>" alt="Carrières Kleber Moreau"></a>
                        </li>
                    </ul>
                </div>
                <div class="banner-elements banner-fade">
                    <ul class="banner">
                        <li>
                            <a href="https://www.essartsenbocage.fr/" target="_blank" title="Commune d'Essarts en Bocage"><img src="<?php echo get_template_directory_uri() . '/img/img_banniere_accueil/essarts_en_bocage_logo01.png' ?>" alt="Commune d'Essarts en Bocage"></a>
                        </li>
                        <li>
                            <a href="http://agersystemes.fr/" target="_blank" title="AGER Systèmes"><img src="<?php echo get_template_directory_uri() . '/img/img_banniere_accueil/logo_agersystemes.png' ?>" alt="AGER Systèmes"></a>
                        </li>
                        <li>
                            <a href="https://www.alphacan.com/fr/" target="_blank" title="Alphacan"><img src="<?php echo get_template_directory_uri() . '/img/img_banniere_accueil/alphacan_logo.png' ?>" alt="Alphacan"></a>
                        </li>
                        <li>
                            <a href="https://www.soulaines-sur-aubance.fr/" target="_blank" title="Soulaines Sur Aubance"><img src="<?php echo get_template_directory_uri() . '/img/img_banniere_accueil/Soulaines_sur_Aubance_logo.png' ?>" alt="Soulaines Sur Aubance"></a>
                        </li>
                        <li>
                            <a href="https://www.remouille.fr/" target="_blank" title="Remouillé"><img src="<?php echo get_template_directory_uri() . '/img/img_banniere_accueil/remouille_logo.png' ?>" alt="Remouillé"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Bouton de remontée de la page d'accueil -->

    <div id="btn">
        <button onclick="topFunction()" id="topBtn" title="Remonter en haut"><i class="fas fa-chevron-up"></i></button>
    </div>
</main>

<?php
/* Appel du footer */
    get_footer();
?>