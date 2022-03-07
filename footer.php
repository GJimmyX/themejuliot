        <!-- Structure du pied de page -->
        
        <footer>

            <!-- Éléments du pied de page -->

            <ul>
                <?php dynamic_sidebar('footer-sidebar'); ?>
            </ul>

            <!-- Section login et inscription wordpress -->

            <div class="login">
                <?php if (!is_user_logged_in()) : ?>
                    <button id="adminBtn"><p class="fas"></p></button>
                    <div id="admin-log" class="admin">
                        <form action="<?php bloginfo('url'); ?>/wp-login" method="post">
                            <?php wp_login_form( array(
                                'redirect_to' => 'get_permalink( get_the_ID())',
                            )); ?>
                            <a href="/inscription">Pas de compte ?</a>
                        </form>
                    </div>
                <?php endif; ?>
                <?php if (is_user_logged_in()) : ?>
                    <a href="<?php bloginfo('url'); ?>/wp-admin" id="admin-panel"><p class="fas"></p></a>
                <?php endif; ?>
            </div>

            <!-- Appel du pied de la page -->

            <?php wp_footer(); ?>
        </footer>
    </body>
</html>