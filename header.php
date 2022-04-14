<?php

    /* Système de cookie du site Juliot Électricité */

    include_once "cookie.php";

?>

<!DOCTYPE html>
<html lang="fr">

    <!-- Appel de la balise <head>, du content et du responsive -->

    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        
        <!-- Requête cible pour les articles -->
        
        <?php
            if (is_singular('articles') ) : ?>
                <meta name="keywords" content="<?php the_title(); ?>">
            <?php 
            endif;
            if (is_singular('rejoindre') ) : ?>
                <meta name="keywords" content="<?php the_field( 'nom_de_loffre' ); ?>">
            <?php 
            endif;
        ?>

        <!-- Titre de chaque page -->

        <?php
            if (is_singular('rejoindre') ) : ?>
            <title> Offre d'emploi : <?php the_field( 'nom_de_loffre' ); ?> - Juliot Électricité</title>
        <?php else : ?>
            <title><?php the_title(); ?> - Juliot Électricité</title>
        <?php endif; ?>

        <?php wp_head(); ?>
        
        <script type="text/javascript" src="<?php echo get_template_directory_uri() . "/js/cookie.js" ?>"></script>
    </head>

    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>

        <!-- Structure du <header> -->

        <header>
            <div class="nav-container">

                <!-- Logo de l'entreprise -->

                <h1><?php the_custom_logo(); ?></h1>

                <!-- Menu de navigation du site -->

                <nav id="site-navigation" class="navbar" role="navigation">
                    <button class="menu-toggle"><img src="<?php echo get_template_directory_uri() . '/img/mobileBtn.png' ?>" alt="Bouton du menu"></button>
                    <?php 
                        wp_nav_menu(
                            array(
                                'container' => 'ul',
                                'theme_location' => 'Primary',
                                'menu_class' => 'nav-menu',
                            )
                        );
                    ?>
                    
                    <!-- Barre de recherche et réseaux sociaux du site Juliot Électricité -->
                    
                    <div class="nav-rs-search">

                        <!-- Réseaux sociaux du site Juliot Électricité -->

                        <?php dynamic_sidebar('header-sidebar'); ?>

                        <?php
                            if (!is_page('recherche') ) :
                        ?>

                            <!-- Barre de recherche du site Juliot Électricité -->

                            <div class="nav-search">
                                <button type="submit" id="search-btn" title="Rechercher"><p class="fas"></p></button>
                                <form action="/recherche" method="post" id="search-bar" class="search">
                                    <label for="search-bar-input"></label>
                                    <input type="text" id="search-bar-input" name="Recherche" placeholder="Recherche..." required="true">
                                </form>
                            </div>

                        <?php endif; ?>
                    </div>
                </nav>
            </div>
        </header>