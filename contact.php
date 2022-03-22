<?php
/* Template name: Contact */
?>

<?php
/* Appel du header */
    get_header();
?>

<!-- Section de contact -->

<main class="contact">

    <!-- Cartes sites des 2 agences Juliot Électricité -->

    <div class="adresses">
        <div class="agence85">
            <a href="https://goo.gl/maps/qRQbKatBLNXW2Q8NA" target="_blank" title="Agence 85" class="carte-agence85"></a>
            <p>8 rue de l'arée - Vendéopôle La Mongie, 85140 Sainte Florence</p>
        </div>
        <div class="agence44">
            <a href="https://goo.gl/maps/JUjYFJWjoKQufqsbA" target="_blank" title="Agence 44" class="carte-agence44"></a>
            <p>2 Rue Georges Leclanché, 44980 Sainte Luce sur Loire</p>
        </div>
    </div>

    <!-- Formulaire permettant de contacter Juliot Électricité -->

    <div class="formulaire">
        <h1>N'hésitez pas à nous contacter via notre formulaire ! Nous vous apporterons une réponse dans les plus brefs délais.</h1>
        <?php echo do_shortcode('[contact-form-7 id="118" title="Contactez-nous !" html_name="formulaire"]'); ?>
    </div>

    <!-- Horaires de Juliot Électricité et téléphone -->

    <div class="horaires">
        <h2 id="horaires-title-section">Horaires Accueil Juliot Électricité</h2>
        <div class="horaires-text"><i class="horaires-title">Matin:</i><p>7<sup>h</sup>30 - 12<sup>h</sup>30</p></div>
        <div class="horaires-text"><i class="horaires-title">Après-midi:</i><p>13<sup>h</sup>30 - 17<sup>h</sup>30</p></div>
        <div class="horaires-tel"><i class="horaires-title">Téléphone:</i><p class="fas fa-phone-alt"></p><a href="tel:+0251094000" title="Téléphone Juliot Électricité"><p>02 51 09 40 00</p></a></div>
    </div>
</main>

<?php
/* Appel du footer */
    get_footer();
?>