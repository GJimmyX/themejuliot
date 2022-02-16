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
    
        <?php
            $recentPosts = new WP_Query();
            $recentPosts->query(array( 
                'orderby' => array(
                    'id' => 'ASC'
                ))
            );            
        ?>
            <?php while ($recentPosts->have_posts()) : $recentPosts->the_post();
        ?>

            <div class="nav-card">
                <?php the_post_thumbnail(); ?>
                <div class="hover">
                    <a href="<?php the_permalink(); ?>"><p><?php the_title(); ?></p></a>
                </div>
            </div>
        
        <?php endwhile; ?>

    </div>

    <!-- Section du carousel/slider de la page d'accueil -->

    <div class="section_02">
        <div class="carousel-slider">
            <div class="control-slider">
                <button class="prev" onclick="plusSlides(-1)"><i class="fas fa-chevron-left"></i></button>
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
                <button class="next" onclick="plusSlides(1)"><i class="fas fa-chevron-right"></i></button>
            </div>
            <div class="indicators">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>
        </div>
        <ul class="texte">
            <h2><b>JULIOT ÉLECTRICITÉ, C'EST:</b></h2>
            <p><img src="<?php echo get_template_directory_uri() . '/img/listBtn.png'; ?>" alt="Bouton de liste">L'expérience et la souplesse s'une équipe de 12 personnes pour répondre à vos besoins.</p>
            <p><img src="<?php echo get_template_directory_uri() . '/img/listBtn.png'; ?>" alt="Bouton de liste">Des techniciens aguerris dans le domaine de l'automatisme industriel.</p>
            <p><img src="<?php echo get_template_directory_uri() . '/img/listBtn.png'; ?>" alt="Bouton de liste">Un bureau d'études compétent et innovant capable de réaliser vos projets en automatisme, informatique industrielle et électricité tertiaire / industrielle.</p>
            <p><img src="<?php echo get_template_directory_uri() . '/img/listBtn.png'; ?>" alt="Bouton de liste">L'accent sur la qualité et la sécurité de nos installations.</p>
            <p><img src="<?php echo get_template_directory_uri() . '/img/listBtn.png'; ?>" alt="Bouton de liste">Une réponse rapide en cas de problème sur votre équipement.</p>
            <p><img src="<?php echo get_template_directory_uri() . '/img/listBtn.png'; ?>" alt="Bouton de liste">Qualifications QUALIFELEC mention chauffage, mention automatisme et IRVE.</p>
            <div class="links">
                <a href="https://pros.qualifelec.fr/qualification/chauffage-electrique" target="_blank" title="Qualifelec mention chauffage"><img src="<?php echo get_template_directory_uri() . '/img/qualifelec_mention_chauffage.png'; ?>" alt="Qualification mention chauffage"></a>
                <a href="https://pros.qualifelec.fr/page/irve" target="_blank" title="Qualifelec mention électricité"><img src="<?php echo get_template_directory_uri() . '/img/qualifelec_mention_electricite.png'; ?>" alt="Qualification mention électricité"></a>
            </div>
        </ul>
    </div>

    <!-- Section de contact de la page d'accueil -->

    <div class="section_03">
        <div class="contactAccueil">
            <?php echo "<div class='accroche_contact'><h2>Vous souhaitez en savoir plus ?</h2><p><b>N'hésitez pas à nous contacter via notre formulaire !</b></p></div>"; ?>
            <ul class="contactBtn">
                <a href="contact"><button type="button">Contactez-nous</button></a>
            </ul>
        </div>
        <div class="company-banner">
            <p id="text-banner">Ils nous font confiance :</p>
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
                <li>
                    <a href="https://www.essartsenbocage.fr/" target="_blank" title="Commune d'Essarts en Bocage"><img src="<?php echo get_template_directory_uri() . '/img/img_banniere_accueil/essarts_en_bocage_logo01.png' ?>" alt="Commune d'Essarts en Bocage"></a>
                </li>
                <li>
                    <a href="http://agersystemes.fr/" target="_blank" title="AGER Systèmes"><img src="<?php echo get_template_directory_uri() . '/img/img_banniere_accueil/logo_agersystemes.png' ?>" alt="AGER Systèmes"></a>
                </li>
            </ul>
        </div>
    </div>
</main>

<?php
/* Appel du footer */
    get_footer();
?>