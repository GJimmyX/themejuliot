<?php
    /* Template Name: Entreprise */
?>

<?php
/* Appel du header */
    get_header();
?>

<?php
/* Inclusion Comparaison */
	include "comparaison.php";
?>

<!-- Contenu de la page 'Entreprise' -->

<main class="entreprise">
    <div class="section-accueil-entreprise">
        <p>
            L'entreprise Juliot Électricité ..... Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem
            Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem.
        </p>
        <img src="<?php echo get_template_directory_uri() . '/img/img_accueil.jpg' ?>" alt="Image Accueil Entreprise">
    </div>
    <div class="section-rea-actu-rejoindre">
        <div class="section-realisations">
            <a href="/nos-realisations">Nos Réalisations</a>
            <img src="<?php echo get_template_directory_uri() . '/img/img_realisations.png' ?>" alt="Image section">
        </div>
		<?php if( $args_articles->have_posts() ) : ?>
			<div class="section-actualites">
				<a href="/actualites">Actualites</a>
				<img src="<?php echo get_template_directory_uri() . '/img/img_actualites.png' ?>" alt="Image section">
			</div>
		<?php endif; ?>
		<?php if( $args_rejoindre->have_posts() ) : ?>
			<div class="section-rejoindre">
				<a href="/nous-rejoindre">Nous Rejoindre</a>
				<img src="<?php echo get_template_directory_uri() . '/img/img_nousrejoindre.png' ?>" alt="Image section">
			</div>
		<?php endif; ?>
    </div>
</main>

<?php
/* Appel du footer */
    get_footer();
?>