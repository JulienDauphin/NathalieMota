<?php 

// Ajout du fichier css
function custom_styles() {
	wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'custom_styles' );

function scripts_modal() {
   wp_enqueue_script( 
      'modal', 
      get_template_directory_uri() . '/js/scripts.js', 
      array( 'jquery' ), 
      '1.0', 
      true
   ); }
   add_action( 'wp_enqueue_scripts', 'scripts_modal' );


// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );

//ajout de deux zones de menu à mon thème
function register_my_menus() {
 register_nav_menus(
    array(
    'header-menu' => __( 'Menu Header' ),
    'footer-menu' => __( 'Menu Footer' ),
    )
    );
   }
   add_action( 'init', 'register_my_menus' );

  
   add_theme_support( 'post-thumbnails' );
   
   // Définir la taille des images mises en avant
   set_post_thumbnail_size( 564, 845, true );
   