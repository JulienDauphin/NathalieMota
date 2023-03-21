<?php
/**
 * Template pour les pages
 **/

get_header();

/* Lancement de la boucle */
while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/content/content-page' );

	// Si les commentaires sont autorisés et qu'il y a au moins un commentaire alors on charge le modèle de commentaire
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
endwhile; // Fin de la boucle


get_footer();
