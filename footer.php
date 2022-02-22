        <!-- Structure du pied de page -->
        
        <footer>

            <!-- Éléments du pied de page -->

            <ul>
                <?php dynamic_sidebar('footer-sidebar'); ?>
            </ul>

            <div class="login">
                <button id="adminBtn"><p class="fas"></p></button>
                <?php if (!is_user_logged_in()) : ?>
                    <div id="admin-log" class="admin">
                        <form action="/wp-login.php" method="post">
                            <?php wp_login_form( array(
                                'redirect_to' => 'get_permalink( get_the_ID())',
                            )); ?>
                            <a href="inscription">Pas de compte ?</a>
                        </form>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Appel du pied de la page -->

            <?php wp_footer(); ?>
        </footer>
    </body>
</html>