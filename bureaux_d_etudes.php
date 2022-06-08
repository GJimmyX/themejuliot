<?php
    /* Template Name: Bureaux */
?>

<?php
/* Appel du header */
    get_header();
?>

<!-- Contenu de la page 'Nos bureaux d'étude' -->

<main class="bureaux-d-etudes">
    <div class="texte-bureaux-d-etudes">
        <p>L'entreprise Juliot Électricité est composée de 2 bureaux d'études, lui permettant ainsi d'avoir une bonne couverture géographique pour ses clients.</p>
    </div>
    <div class="section-adresses-logos-bureaux-d-etudes">
        <div class="adresses-bureaux-d-etudes">
            <div class="bureau-d-etudes-85">
                <img src="<?php echo get_template_directory_uri() . '/img/agence85.png' ?>" alt="Carte de localisation de l'Agence">
                <a href="https://goo.gl/maps/qRQbKatBLNXW2Q8NA" target="_blank">8 rue de l'arée - Vendéopôle La Mongie, 85140 Sainte Florence</a>
            </div>
            <div class="bureau-d-etudes-44">
                <img src="<?php echo get_template_directory_uri() . '/img/agence44.png' ?>" alt="Carte de localisation de l'Agence">
                <a href="https://goo.gl/maps/JUjYFJWjoKQufqsbA" target="_blank">2 Rue Georges Leclanché, 44980 Sainte Luce sur Loire</a>
            </div>
        </div>
        <div class="logos-bureaux-d-etudes">
            <a href="/accueil"><img src="<?php echo get_template_directory_uri() . '/img/LogoBureauJuliot.png' ?>" alt="Logos Entreprises"></a>
            <a href="http://agersystemes.fr/" target="_blank"><img src="<?php echo get_template_directory_uri() . '/img/LogoBureauAGER.png' ?>" alt="Logos Entreprises"></a>
        </div>
    </div>
</main>

<?php
/* Appel du footer */
    get_footer();
?>