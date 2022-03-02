<?php

/* Ajouter l'édition dans WordPress */

add_theme_support('customize-selective-refresh-widgets');

/* Ajouter un logo */

add_theme_support( 'custom-logo' );

/* Ajouter un background */

add_theme_support( 'custom-background' );

/* Ajouter le support des thmbnails (miniatures) */

add_theme_support( 'post-thumbnails' );

/* Ajouter différentes tailles d'image */

function taille_media() {
  add_image_size( '32x32', 32, 32, false );
  add_image_size( '192x192', 192, 192, false );
  add_image_size( 'taille_00', 60, 60, false );
  add_image_size( 'taille_01', 250, 200, false );
  add_image_size( 'taille_02', 500, 400, false );
  add_image_size( 'taille_03', 750, 600, false );
};

add_action('after_setup_theme', 'taille_media');

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

/* Ajouter le support du CSS, des polices d'écriture, de Font Awesome et du JS/JQuery */

function enqueue_style() {
  wp_enqueue_style( 'style', get_stylesheet_uri());
  wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap');
  wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
  wp_deregister_script('jquery');
  wp_register_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', false, '', true);
  wp_enqueue_script('jquery');
  if (is_page('accueil') ) :
    wp_enqueue_script('sliderjs', get_template_directory_uri() . '/js/slider.js', false, '', true);
    wp_enqueue_script('bannersliderjs', get_template_directory_uri() . '/js/banner-slider.js', false, '', true);
  endif;
  wp_enqueue_script('navjs', get_template_directory_uri() . '/js/navigation.js', false, '', true);
  if (!is_user_logged_in() ) :
    wp_enqueue_script('adminjs', get_template_directory_uri() . '/js/admin-log.js', false, '', true);
  endif;
};

add_action('wp_enqueue_scripts', 'enqueue_style');

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

add_action('after_setup_theme', function () {
  remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
}, 10, 0);

/* Ajouter la personnalisation du login form */

function my_login() { ?>
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
      border: 1px solid #202F86;
    }
    #login form .user-pass-wrap .wp-pwd button span{
      color: #202F86;
    }
    #login form .user-pass-wrap .wp-pwd button.wp-hide-pw:focus{
      border-color: #202F86;
      box-shadow: none;
    }
    #login form .submit #wp-submit{
      background-color: #202F86;
      border: 1px solid #202F86;
    }
    #login #nav{
      text-align: center;
    }
    #login #backtoblog{
      text-align: center;
    }
    #login #nav a:hover, #login #backtoblog a:hover{
      color: #202F86;
    }
    #login #nav a:focus, #login #backtoblog a:focus{
      transition-property: none;
    }
      .language-switcher{
      display: none;
    }
  </style>
<?php }

add_action( 'login_enqueue_scripts', 'my_login' );

/* Ajouter le support Widget pour le footer */

register_sidebar( array(
    'id' => 'footer-sidebar',
    'name' => 'Pied de page',
    'before-widget' => '<div>',
    'after-widget' => '</div>',
) );

?>