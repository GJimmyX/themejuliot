<?php

/* Ajouter l'édition dans WordPress */

add_theme_support('customize-selective-refresh-widgets');

/* Afficher la gestion de menus */

register_nav_menu( 'Primary', __( 'Menu de Navigation' ));

/* Ajouter un background */

add_theme_support( 'custom-background' );

/* Ajouter un logo */

add_theme_support( 'custom-logo' );

/* Ajouter le support des thmbnails (miniatures) */

add_theme_support( 'post-thumbnails' );

/* Ajouter différentes tailles d'image */

function taille_media() {
  add_image_size( 'taille_00', 60, 60, false );
  add_image_size( 'taille_01', 250, 200, false );
  add_image_size( 'taille_02', 500, 400, false );
  add_image_size( 'taille_03', 750, 600, false );
};

add_action('after_setup_theme', 'taille_media');

/* Ajouter le support du CSS, des polices d'écriture, de Font Awesome et du JS/JQuery */

function enqueue_style() {
  wp_enqueue_style( 'style', get_stylesheet_uri());
  wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap');
  wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');
  wp_deregister_script('jquery');
  wp_register_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', false, '', true);
  wp_enqueue_script('jquery');
  wp_enqueue_script('sliderjs', get_template_directory_uri() . '/js/slider.js', false, '', true);
  wp_enqueue_script('navjs', get_template_directory_uri() . '/js/navigation.js', false, '', true);
  wp_enqueue_script('adminjs', get_template_directory_uri() . '/js/admin-log.js', false, '', true);
};

add_action('wp_enqueue_scripts', 'enqueue_style');

/* Ajouter un Custom Post pour la catégorie de navigation */

function cpt_juliot() {

  $labels = array(
    'name' => 'Navigation',
    'all_items' => 'Blocs de navigation', // Sous-menu
    'singular_name' => 'Bloc de navigation',
    'add_item' => 'Ajouter un bloc de navigation',
    'edit_item' => 'Éditer un bloc de navigation',
    'menu_name' => 'Navigation',
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_in_rest' => true,
    'has_archive' => true,
    'supports' => array( 'title', 'thumbnail', 'custom-fields' ),
    'menu_position' => 10,
    'menu_icon' => 'dashicons-menu',
  );

  register_post_type( 'Navigation', $args );

  $labels = array(
    'name' => 'Bloc',
    'new_product_name' => 'Nouveau Bloc',
    'parent_item' => 'Bloc Type',
  );

  $args = array(
    'labels' =>$labels,
    'public' => true,
    'show_in_rest' => true,
    'hierarchical' => true,
  );

  register_taxonomy( 'nav-accueil', 'Navigation', $args );

}

add_action('init', 'cpt_juliot', false); // Init de la fonction cpt_juliot

/* Ajouter le support Widget pour le footer */

register_sidebar( array(
    'id' => 'footer-sidebar',
    'name' => 'Pied de page',
    'before-widget' => '<div>',
    'after-widget' => '</div>',
) );

?>