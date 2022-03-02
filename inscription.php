<?php 
    /* Template name: Inscription */
?>

<?php
/* Appel du header */
    get_header();
?>

    <!-- Ajouter le support du formulaire d'inscription -->

    <!-- Formulaire d'inscription -->
    
    <main class="inscription">
        <h2>Inscription sur Juliot Électricité</h2>
        <form name="registerform" action="<?php bloginfo('url'); ?>/wp-login.php?action=register" method="post"> 
            <div class="name">
                <label for="login">Identifiant :</label>
                <input type="text" name="user_login" id="login" />
            </div>
            <div class="email">
                <label for="login_email">E-mail :</label>
                <input type="text" name="user_email" id="login_email" />
            </div>
            <div class="submitting">
                <input type="hidden" name="redirect_to" value="<?php echo get_permalink( get_the_ID()); ?>" /> 
                <input type="submit" name="wp-submit" />
            </div>
        </form>
    </main>

<?php
/* Appel du footer */
    get_footer();
?>