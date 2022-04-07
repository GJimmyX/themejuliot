        <!-- Structure du pied de page -->
        
        <footer>

            <!-- Éléments du pied de page -->

            <ul>
                <?php dynamic_sidebar('footer-sidebar'); ?>
            </ul>

            <?php if(isset($_COOKIE['user_id'])){
                /* Trigger du cookie (Personne connectée seulement) */
                echo '<p class="user-cookie">Session pour l\'utilisateur : ' .$_COOKIE['user_id'] . '</p>';
                }
            ?>

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
                        right: -75px;
                        top: -5px;
                    }
                </style>
                
                <style media="(min-width: 376px) AND (max-width: 575.98px)">
                    body header .nav-container .navbar .nav-rs-search .nav-search .toggle-search input{
                        right: -75px;
                        top: 0px;
                    }
                </style>
                
                <style media="(min-width: 576px) AND (max-width: 767.98px)">
                    body header .nav-container .navbar .nav-rs-search .nav-search .toggle-search input{
                        right: -75px;
                        top: 5px;
                    }
                </style>
            <?php endif; ?>
        </footer>
    </body>
</html>