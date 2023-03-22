
<?php 

// Ajout du fichier css
function custom_styles() {
	wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/css/style.css' );
   wp_enqueue_script( 'pagination', get_template_directory_uri() . '/js/pagination.js', array( 'jquery' ), '1.0', true);
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
   
   
   // On place les critères de la requête dans un Array
   function pagination() {
     $args = array(
       'post_type' => 'photo',
       'posts_per_page' => 8,
       'orderby' => 'date',
       'order' => 'DESC',
       'paged' => $_POST['paged'],
       
     );
     //On crée ensuite une instance de requête WP_Query basée sur les critères placés dans la variables $args
     $query = new WP_Query($args);
     ?>
     <!-- //On vérifie si le résultat de la requête contient des articles -->
     <?php if ($query->have_posts()): ?>
       <div class="container_thumbnail_new" style="display: flex;
    flex-wrap: wrap; gap:25px; justify-content: center;">
         <!-- //On parcourt chacun des articles résultant de la requête -->
         <?php while ($query->have_posts()): ?>
           <?php $query->the_post(); ?>
           <div class="news_block_new">
             <?php if (has_post_thumbnail()): ?>
               <div class="thumbnail-block_new">
               <a href="<?php the_permalink(); ?>">
                 <?php the_post_thumbnail(array(550, 550)); ?>
                 </a>
               </div>
             <?php endif; ?>
           </div>
         <?php endwhile; ?>
        
       </div>
     <?php else: ?>
       <p>Désolé, nous n'avons pas plus de photos pour le moment !</p>
     <?php endif;
     wp_reset_query(); }
     
         
     
     function weichie_load_more() {
      $ajaxposts = new WP_Query([
        'post_type' => 'photo',
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => $_POST['paged'],
      ]);
    
      $response = '';
    
      if($ajaxposts->have_posts()) {
        while($ajaxposts->have_posts()) : $ajaxposts->the_post();
          $response .= pagination();
        endwhile;
      } else {
        $response = '';
      }
    
      echo $response;
      exit;
    }
    add_action('wp_ajax_weichie_load_more', 'weichie_load_more');
    add_action('wp_ajax_nopriv_weichie_load_more', 'weichie_load_more');

    