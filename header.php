<!DOCTYPE html>
<html lang="fr">

    <!-- Appel de la balise <head>, du content et du responsive-->

    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <title>Juliot Électricité</title>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>
        
        <!-- Structure du <header> -->

        <header>
            <div class="nav-container">
                <h1><?php the_custom_logo(); ?></h1>
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