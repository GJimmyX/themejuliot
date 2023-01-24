        <!-- Structure du pied de page -->
        
        <footer>

            <!-- Éléments du pied de page -->

            <ul>
                <?php dynamic_sidebar('footer-sidebar'); ?>
            </ul>

            <?php if (is_page('accueil') && (is_user_logged_in() ) ){
                ?><!-- Trigger du cookie (Personne connectée seulement) --><?php
                echo '<p class="user-cookie">Session pour l\'utilisateur : ' .$_COOKIE['user_id'] . '</p>';
                }
            ?>

            <!-- Plan du site -->

            <p class="siteMap">
                <a href="/wp-content/themes/themejuliot/plan-du-site.xml" class="siteMapLink">Plan du site</a>
            </p>

            <!-- Appel du pied de la page -->

            <?php wp_footer(); ?>

            <?php if (!is_active_sidebar('header-sidebar') ) : ?>

                <!-- Changement de style si les réseaux sociaux ne sont pas activés -->
                
                <style>
                    body header .nav-container .navbar .nav-rs-search{
                        justify-content: center;
                    }
                </style>
                
                <style media="(max-width: 375.98px)">
                    body header .nav-container .navbar .nav-rs-search .nav-search .toggle-search input{
                        right: -80px;
                        top: -5px;
                    }
                </style>
                
                <style media="(min-width: 376px) AND (max-width: 575.98px)">
                    body header .nav-container .navbar .nav-rs-search .nav-search .toggle-search input{
                        right: -75px;
                        top: 10px;
                    }
                </style>
                
                <style media="(min-width: 576px) AND (max-width: 767.98px)">
                    body header .nav-container .navbar .nav-rs-search .nav-search .toggle-search input{
                        right: -70px;
                        top: 15px;
                    }
                </style>

            <?php endif; ?>

            <?php 
            
                include "comparaison.php";
			
                if( !$args_rejoindre->have_posts() ) :

                ?>

                    <!-- Changement de style s'il n'y a pas d'offres d'emploi -->

                    <style>
                        body header .nav-container .navbar .nav-menu .menu-entreprise .sub-menu .s04{
                            display: none;
                        }
                    </style>

                <?php

                endif;

            ?>
        </footer>
    </body>
</html>