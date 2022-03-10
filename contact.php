<?php
/* Template name: Contact */
?>

<?php
/* Appel du header */
    get_header();
?>

<!-- Section de contact -->

<main class="contact">

    <!-- Formulaire permettant de contacter Juliot Électricité -->

    <div class="formulaire">
        <h1>Vous souhaitez en savoir plus ? N'hésitez pas à nous contacter via notre formulaire !</h1>
        <?php echo do_shortcode('[contact-form-7 id="118" title="Contactez-nous !" html_name="formulaire"]'); ?>
    </div>
</main>

<?php
/* Appel du footer */
    get_footer();
?>