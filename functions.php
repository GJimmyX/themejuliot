<?php

/* Ajouter l'édition dans WordPress */

add_theme_support('customize-selective-refresh-widgets');

/* Ajouter un logo */

add_theme_support( 'custom-logo' );

/* Ajouter un background */

add_theme_support( 'custom-background' );

/* Ajouter le support des thmbnails (miniatures) */

add_theme_support( 'post-thumbnails' );

/* Supprimer différentes tailles d'image */

function remove_default_img_sizes( $sizes ) {
  $targets = ['medium_large', 'large', '1536x1536', '2048x2048'];

  foreach($sizes as $size_index=>$size) {
    if(in_array($size, $targets)) {
      unset($sizes[$size_index]);
    }
  }

  return $sizes;
}

add_filter( 'intermediate_image_sizes', 'remove_default_img_sizes' );

/* Afficher la gestion de menus */

register_nav_menu( 'Primary', __( 'Menu de Navigation' ));

register_nav_menu( 'Secondary', __('Menu Annexe' ));

/* Différer éxécution scripts JS */

function add_defer_attribute($tag, $handle) {
  $scripts_to_defer = array(
    get_template_directory_uri() . '/js/navigation.js',
    get_template_directory_uri() . '/js/search-bar.js',
    get_template_directory_uri() . '/js/slider.js',
    get_template_directory_uri() . '/js/banner-slider.js',
    get_template_directory_uri() . '/js/top-btn.js',
    get_template_directory_uri() . '/js/articles-slider.js',
    get_template_directory_uri() . '/js/horaires-table.js',
  );
  foreach ($scripts_to_defer as $defer_scripts) {
    if ( $defer_scripts === $handle ) {
      return str_replace( ' src', ' defer="defer" src', $tag );
    }
  }
  return $tag;
}

add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);

/* Ajouter le support du CSS, des polices d'écriture, de Font Awesome et du JS/JQuery */

function enqueue_style_themejuliot() {
  wp_enqueue_style( 'style', get_stylesheet_uri());
  wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap');
  wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css');
  wp_deregister_script('jquery');
  wp_register_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', false, '', true);
  wp_enqueue_script('jquery');
  wp_enqueue_script('navjs', get_template_directory_uri() . '/js/navigation.js', false, '', true);
  wp_enqueue_script( get_template_directory_uri() . '/js/navigation.js', $src, $deps, $ver, $in_footer);
  if (!is_page('recherche') ) :
    wp_enqueue_script('searchjs', get_template_directory_uri() . '/js/search-bar.js', false, '', true);
    wp_enqueue_script( get_template_directory_uri() . '/js/search-bar.js', $src, $deps, $ver, $in_footer);
  endif;
  if (is_page('accueil') ) :
    wp_enqueue_script('sliderjs', get_template_directory_uri() . '/js/slider.js', false, '', true);
    wp_enqueue_script('bannersliderjs', get_template_directory_uri() . '/js/banner-slider.js', false, '', true);
    wp_enqueue_script('topbtnjs', get_template_directory_uri() . '/js/top-btn.js', false, '', true);
    wp_enqueue_script( get_template_directory_uri() . '/js/slider.js', $src, $deps, $ver, $in_footer);
    wp_enqueue_script( get_template_directory_uri() . '/js/banner-slider.js', $src, $deps, $ver, $in_footer);
    wp_enqueue_script( get_template_directory_uri() . '/js/top-btn.js', $src, $deps, $ver, $in_footer);
  endif;
  if (is_singular('articles') && ( wp_count_posts('articles')->publish >= 4 ) ) :
    wp_enqueue_script('articlessliderjs', get_template_directory_uri() . '/js/articles-slider.js', false, '', true);
    wp_enqueue_script( get_template_directory_uri() . '/js/articles-slider.js', $src, $deps, $ver, $in_footer);
  endif;
  if (is_page('contact') ) :
    wp_enqueue_script('horairesjs', get_template_directory_uri() . '/js/horaires-table.js', false, '', true);
    wp_enqueue_script( get_template_directory_uri() . '/js/horaires-table.js', $src, $deps, $ver, $in_footer);
  endif;
};

add_action('wp_enqueue_scripts', 'enqueue_style_themejuliot');

/* Enlever l'affichage de la barre d'administration pour tout le monde sauf l'admin */

if (!current_user_can('administrator') ) :
  show_admin_bar(false);
endif;

/* Enlever l'affichage des pages pour le rôle Éditeur dans la barre d'administration*/

function visu_menu() {
  if (current_user_can('editor') ) :
    remove_menu_page('edit.php?post_type=page');
  endif;
}

add_action( 'admin_menu', 'visu_menu', 999);

/* Enlever l'affichage du plugin SEO, de la création de pages et de Contact Form 7 pour le rôle Éditeur dans la barre d'administration */

function visu_abmenu() {
  if (current_user_can('editor') ) :
    ?>

    <style>

      /* Enlever l'affichage du plugin SEO et du plugin Contact Form 7 pour le rôle Éditeur dans la barre d'administration*/

      body #wpwrap #adminmenumain #adminmenuwrap #adminmenu #toplevel_page_wpseo_workouts{
        display: none;
      }
      body #wpwrap #adminmenumain #adminmenuwrap #adminmenu #toplevel_page_wpcf7{
        display: none;
      }

      /* Enlever l'affichage du plugin SEO et du plugin Contact Form 7 pour le rôle Éditeur dans l'entête de la barre d'administration*/

      body #wpwrap #wpcontent #wpadminbar .ab-top-menu #wp-admin-bar-new-content .ab-sub-wrapper #wp-admin-bar-new-page{
        display: none;
      }
      body #wpwrap #wpcontent #wpadminbar .ab-top-menu #wp-admin-bar-wpseo-menu{
        display: none;
      }

      /* Enlever l'affichage de blocs dans le body de l'administration */

      body #wpwrap #wpcontent #wpbody #wpbody-content #screen-meta #screen-options-wrap #adv-settings .metabox-prefs label{
        display: none;
      }
      body #wpwrap #wpcontent #wpbody #wpbody-content .wrap #dashboard-widgets-wrap .metabox-holder #postbox-container-1 .ui-sortable #dashboard_right_now{
        display: none;
      }
      body #wpwrap #wpcontent #wpbody #wpbody-content .wrap #dashboard-widgets-wrap .metabox-holder #postbox-container-1 .ui-sortable .wpseo-dashboard-overview{
        display: none;
      }
      
    </style>

    <?php
  endif;
}

add_action( 'admin_bar_menu', 'visu_abmenu', 999);

/* Supprimer le Post Type par défaut de WordPress */

function remove_default_post_type() {
  remove_menu_page( 'edit.php' );
}

add_action( 'admin_menu', 'remove_default_post_type' );

function remove_default_post_type_menu_bar( $wp_admin_bar ) {
  $wp_admin_bar->remove_node( 'new-post' );
}

add_action( 'admin_bar_menu', 'remove_default_post_type_menu_bar', 999 );

/* Suppression du style in-wordpress */

function remove_duotone() {
  remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
}

add_action( 'init', 'remove_duotone' );

/* Ajouter la personnalisation du login form */

function my_login_style() { ?>
  <style>
    body #login{
      width: 375px;
    }
    #login h1 a{
      background-image: url(<?php echo get_template_directory_uri(); ?>/img/siteLogo.png);
      height: 80px;
      width: 375px;
      background-size: 375px 80px;
      background-repeat: no-repeat;
    }
    #login form p #user_login:focus, #login form .user-pass-wrap .wp-pwd #user_pass:focus, #login form p #rememberme:focus, #login form .user-pass-wrap .wp-pwd button span:focus{
      border: 1px solid #1F4290;
      border-color: none;
      box-shadow: none;
    }
    #login form .user-pass-wrap .wp-pwd button span{
      color: #1F4290;
    }
    #login form .user-pass-wrap .wp-pwd button.wp-hide-pw:focus{
      border-color: #1F4290;
      box-shadow: none;
    }
    #login form .forgetmenot input:focus{
      outline: none;
    }
    #login form .forgetmenot input:checked::before{
      content: url(<?php echo get_template_directory_uri(); ?>/img/check.png);
      margin: 0;
      width: 100%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    #login form .submit #wp-submit{
      background-color: #1F4290;
      border: 1px solid #1F4290;
    }
    #login #nav{
      text-align: center;
    }
    #login #backtoblog{
      text-align: center;
    }
    #login #nav a:hover, #login #backtoblog a:hover{
      color: #1F4290;
    }
    #login #nav a:focus, #login #backtoblog a:focus{
      transition-property: none;
    }
    .language-switcher{
      display: none;
    }
    body #login #login_error{
      border-left-color: #1F4290;
    }
  </style>
<?php }

add_action( 'login_enqueue_scripts', 'my_login_style' );

/* Modification URL de redirection sur l'image */

function my_login_logo_url() {
  return home_url();
}

add_filter( 'login_headerurl', 'my_login_logo_url' );

/* Personnalisation message d'erreur d'identification à la connexion */

function my_login_error() {
  return 'Informations de connexion incorrectes !';
}

add_filter( 'login_errors', 'my_login_error' );

/* Précochage par défaut de la case 'Se souvenir de moi' */

function my_login_remember_coche() {
  echo "<script>document.getElementById('rememberme').checked = true;</script>";
}

function my_login_remember() {
  add_filter( 'login_footer', 'my_login_remember_coche' );
}

add_action( 'init', 'my_login_remember' );

/* Modifier expiration cookie */

function wpm_cookie( $expirein ) {
  return 15552000; // cette valeur correspond à 6 mois en secondes
}

add_filter( 'auth_cookie_expiration', 'wpm_cookie');

/* Ajouter le support Widget pour le header */

register_sidebar( array(
  'id' => 'header-sidebar',
  'name' => 'Header',
  'before-widget' => '',
  'after-widget' => '',
) );

/* Ajouter le support Widget pour le footer */

register_sidebar( array(
    'id' => 'footer-sidebar',
    'name' => 'Pied de page',
    'before-widget' => '<div>',
    'after-widget' => '</div>',
) );


/* Customs Posts pour le site Juliot Électricité */


/* Ajouter un Custom Post pour la catégorie de navigation */

function cpt_menu_juliot() {

  $labels = array(
    'name' => 'Menu Navigation',
    'all_items' => 'Menus de navigation', // Sous-menu
    'singular_name' => 'Menu de navigation',
    'add_new' => 'Ajouter un Menu',
    'edit_item' => 'Editer un Menu',
    'menu_name' => 'Menu de Navigation',
  );
  
  $args = array(
    'labels' => $labels,
    'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
    'show_in_rest' => false,
    'hierarchical' => true,
    'public' => true,
    'has_archive' => true,
    'menu_position' => 20,
    'menu_icon' => 'dashicons-menu',
  );
  
  if (current_user_can('editor') ) :
    $args = array(
      'labels' => $labels,
      'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
      'show_in_rest' => false,
      'show_in_menu' => false,
      'hierarchical' => true,
      'public' => true,
      'has_archive' => true,
      'menu_position' => 20,
      'menu_icon' => 'dashicons-menu',
    );
  endif;

  register_post_type( 'navigation', $args );

  $labels = array(
    'name' => "Categrorie de menu",
    'new_product_name' => 'Nouveau Menu',
    'parent_item' => 'Type de Menu',
  );

  $args = array(
    'labels' =>$labels,
    'public' => true,
    'show_in_rest' => true,
    'hierarchical' => true,
  );

  register_taxonomy( 'bloc', 'navigation', $args );

}

add_action('init', 'cpt_menu_juliot', false); // Init de la fonction cpt_juliot

/* Ajouter un Custom Post pour les articles du site */

function cpt_articles_juliot() {

  $labels = array(
    'name' => 'Articles/RS',
    'all_items' => 'Articles du site', // Sous-menu
    'singular_name' => 'Article du site',
    'add_new' => 'Ajouter un article',
    'edit_item' => 'Éditer un article',
    'menu_name' => 'Articles',
    'not_found' => __( 'Non trouvée'),
    'not_found_in_trash' => __( 'Non trouvée dans la corbeille'),
  );

  $args = array(
    'labels' => $labels,
    'supports' => array( 'title', 'thumbnail', 'comments', 'custom-fields' ),
    'show_in_rest' => true,
    'query_var' => true,
    'rest_base' => 'art',
    'rest_controller_class' => 'WP_REST_Posts_Controller',
    'hierarchical' => true,
    'public' => true,
    'has_archive' => true,
    'menu_position' => 10,
    'menu_icon' => 'dashicons-admin-tools',
  );

  register_post_type( 'articles', $args );

  $labels = array(
    'name' => "Catégorie d'articles",
    'new_product_name' => 'Nouvelle catégorie',
    'parent_item' => 'Type de catégorie',
  );

  $args = array(
    'labels' =>$labels,
    'public' => true,
    'show_in_rest' => true,
    'hierarchical' => true,
  );

  register_taxonomy( 'cat-articles', 'articles', $args );

}

add_action('init', 'cpt_articles_juliot', false); // Init de la fonction cpt_articles_juliot

/* Ajouter un Custom Post pour l'affichage de realisations */

function cpt_realisations_juliot() {

  $labels = array(
    'name' => 'Realisations Juliot',
    'all_items' => 'Toutes les realisations', // Sous-menu
    'singular_name' => 'Realisation Juliot',
    'add_new' => 'Ajouter une realisation',
    'edit_item' => 'Editer une realisation',
    'menu_name' => 'Realisations Juliot',
  );
  
  $args = array(
    'labels' => $labels,
    'supports' => array( 'title', 'custom-fields' ),
    'show_in_rest' => false,
    'hierarchical' => true,
    'public' => true,
    'has_archive' => true,
    'menu_position' => 20,
    'menu_icon' => 'dashicons-admin-plugins',
  );

  register_post_type( 'realisations', $args );

  $labels = array(
    'name' => "Categrorie de Realisation",
    'new_product_name' => 'Nouveau Categorie',
    'parent_item' => 'Type de Categorie',
  );

  $args = array(
    'labels' =>$labels,
    'public' => true,
    'show_in_rest' => true,
    'hierarchical' => true,
  );

  register_taxonomy( 'type', 'realisations', $args );

}

add_action('init', 'cpt_realisations_juliot', false); // Init de la fonction cpt_realisations_juliot

/* Ajouter un Custom Post pour l'affichage des offres d'emploi */

function cpt_rejoindre_juliot() {

  $labels = array(
    'name' => 'Rejoindre Juliot',
    'all_items' => 'Toutes les offres', // Sous-menu
    'singular_name' => 'Offre d\'emploi Juliot',
    'add_new' => 'Ajouter une offre',
    'edit_item' => 'Editer une offre',
    'menu_name' => 'Rejoindre Juliot',
  );
  
  $args = array(
    'labels' => $labels,
    'supports' => array( 'title', 'custom-fields' ),
    'show_in_rest' => true,
    'hierarchical' => true,
    'public' => true,
    'has_archive' => true,
    'menu_position' => 20,
    'menu_icon' => 'dashicons-admin-users',
  );

  register_post_type( 'rejoindre', $args );

  $labels = array(
    'name' => "Categrorie d'offre",
    'new_product_name' => 'Nouvelle Categorie',
    'parent_item' => 'Type d\'offre',
  );

  $args = array(
    'labels' =>$labels,
    'public' => true,
    'show_in_rest' => true,
    'hierarchical' => true,
  );

  register_taxonomy( 'offre', 'rejoindre', $args );

}

add_action('init', 'cpt_rejoindre_juliot', false); // Init de la fonction cpt_rejoindre_juliot

?>