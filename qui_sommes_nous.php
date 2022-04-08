<?php
    /* Template Name: Qui sommes nous */
?>

<?php
/* Appel du header */
    get_header();
?>

<!-- Contenu de la page 'Qui sommes-nous ?' -->

<main class="qui-sommes-nous">
    <div class="sommes-nous-container">
        <img src="<?php echo get_template_directory_uri() . '/img/img_juliot.png' ?>" alt="Image pour la présentation de Juliot Électricité">
        <div class="sommes-nous-texte">
            <h4>Juliot Électricité est une société vendéenne crée en 1951 sur la commune de Rochetrejoux.</h4>
            <p>
                La société est une SARL (Société A Responsabilité Limitée) unipersonnelle. Le dirigeant actuel est Mr Jean-Charles DE FREITAS.
                L'entreprise a voulu changer de dynamique économique et est implantée depuis 2010, dans la zone d'activités de la Mongie, dans la commune d'Essarts En Bocage.
                De plus, une seconde agence Juliot Électricité à ouvert ses portes en périphérie de Nantes, sur la commune de Sainte Luce Sur Loire en 2015.
            </p>
        </div>
    </div>
</main>

<?php
/* Appel du footer */
    get_footer();
?>