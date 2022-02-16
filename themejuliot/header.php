<!DOCTYPE html>
<html lang="fr">

    <!-- Appel de la balise <head>, du content et du responsive-->

    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
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
                    <!-- <div class="search-in">
                        <button id="searchBtn" onclick="toggle()"><i class="fas fa-search"></i></button>
                        <div id="search-bar" class="bar">
                            <form action="traitement.php" method="post">
                                <input type="text" placeholder="Search">
                            </form>
                        </div>
                    </div> -->
                    <div class="admin-in">
                        <button id="adminBtn"><i class="fas fa-user"></i><p>Administrateur</p></button>
                        <?php if (is_user_logged_in()) : ?>
                            <a href="<?php echo wp_logout_url('index.php'); ?>">
                                <button>
                                    Déconnexion
                                </button>
                            </a>
                        <?php endif; ?>
                        <div id="admin-log" class="admin">
                            <form action="wp-login.php" method="post">
                                <?php wp_login_form(); ?>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </header>