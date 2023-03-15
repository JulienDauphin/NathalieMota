<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> class="container">

    
    <?php wp_body_open(); ?>
<header id="header"> 
<div><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Logo" class="logo"></div><nav><?php 
 wp_nav_menu ( array (
 'theme_location' => 'header-menu' ,
 'menu_class' => 'header-menu', 
 ) ); ?> </nav>

</header>