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
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16501.844453706908!2d-1.1501714177343898!3d46.79960456247184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480687bf3d314767%3A0x69cc6639a9752e4b!2sEts+Juliot!5e0!3m2!1sfr!2sfr!4v1452178373100" frameborder="0"></iframe>
            <p>8 rue de l'arée - Vendéopôle La Mongie, 85140 Sainte Florence</p>
        </div>
        <div class="agence44">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2708.061571898497!2d-1.4733119487450836!3d47.25449927906061!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4805e564d95e3f05%3A0x534a3595ec6e592d!2s2+Rue+Georges+Leclanch%C3%A9%2C+44980+Sainte-Luce-sur-Loire!5e0!3m2!1sfr!2sfr!4v1456131605674" frameborder="0"></iframe>
            <p>2 Rue Georges Leclanché, 44980 Sainte Luce sur Loire</p>
        </div>
    </div>

    <!-- Formulaire permettant de contacter Juliot Électricité -->

    <div class="formulaire">
        <h1>N'hésitez pas à nous contacter via notre formulaire ! Nous vous réponderons dans les plus brefs délais.</h1>
        <?php echo do_shortcode('[contact-form-7 id="118" title="Contactez-nous !" html_name="formulaire"]'); ?>
    </div>

    <!-- Horaires de Juliot Électricité et téléphone -->

    <div class="horaires">
        <h2 id="horaires-title-section">Horaires Accueil Juliot Électricité</h2>
        <div class="horaires-text"><i class="horaires-title">Matin:</i><p>7h30 - 12h30</p></div>
        <div class="horaires-text"><i class="horaires-title">Après-midi:</i><p>13h30 - 17h30</p></div>
        <div class="horaires-tel"><i class="horaires-title">Téléphone:</i><p class="fas fa-phone-alt"></p><a href="tel:+0251094000">02 51 09 40 00</a></div>
    </div>
</main>

<?php
/* Appel du footer */
    get_footer();
?>