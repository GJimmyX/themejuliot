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
        ?>

        <title><?php the_title(); ?> - Juliot Électricité</title>
        <?php wp_head(); ?>
        
        <script type="text/javascript"> window.cookieconsent_options = {"message":"Message qui apparaitra","dismiss":"J'accepte","learnMore":"+ d'info","link":"url-vers-mentions-legales.fr","theme":"light-bottom"}; </script><script type="text/javascript" src="https://unpkg.com/cookieconsent@3.1.1/build/cookieconsent.min.js"></script>
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
                </nav>

                <!-- Bouton de déconnexion wordpress -->

                <div class="admin-in">
                    <?php if (is_user_logged_in()) : ?>
                        <a href="<?php echo wp_logout_url( get_permalink( get_the_ID()) ); ?>">
                            <button>
                                Déconnexion
                            </button>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </header>

        <!-- Trigger du cookie -->

        <?php if(isset($_COOKIE['user_id'])){
            echo 'Votre Nom de session est : ' .$_COOKIE['user_id'];
            }
            /* else{
                $user = get_current_user_id();
                do_action( 'wp_logout', $user );
            } */
        ?>