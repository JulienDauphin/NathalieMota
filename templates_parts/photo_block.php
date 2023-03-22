
<?php $terms = get_terms('categorie');
 
 $select ="<section id='select_section'><div class='categories_select'><p>CATÉGORIES</p><select name='cat' id='cat' class='postform'>n";
 $select.= "<option value='-1'>Choisir une catégorie</option>n";

 foreach($terms as $term){
   if($term->count > 0){
       $select.= "<option value='".$term->slug."'>".$term->name."</option>";
   }
 }

 $select.= "</select> </div>";

 echo $select;
?>

<?php $terms = get_terms('format');
 
 $select = "<div class='formats_select'><p>FORMATS</p><select name='for' id='for' class='postform'>n";
 $select.= "<option value='-1'>Choisir un format</option>n";

 foreach($terms as $term){
   if($term->count > 0){
       $select.= "<option value='".$term->slug."'>".$term->name."</option>";
   }
 }

 $select.= "</select> </div>";

 echo $select;
?>
<div class="vide">&nbsp</div>
<div class='formats_select'><p>TRIER PAR</p><select name='for' id='for' class='postform'>n";
 <option value='-1'>Trier les photos</option>
 <option value='0'>Nouveautés</option>
 <option value='0'>Populaires</option>
 <option value='0'>Anciens</option>
 </select> </div> </section>

 


<?php

      // On place les critères de la requête dans un Array
        $args = array(
          'post_type' => 'photo',
          'posts_per_page' => 8,
          'paged' => 1,
        
          
        );
        //On crée ensuite une instance de requête WP_Query basée sur les critères placés dans la variables $args
        
        $query = new WP_Query($args);
        ?>
        <!-- //On vérifie si le résultat de la requête contient des articles -->
        <?php if ($query->have_posts()): ?>
          <div class="container_thumbnail_block" id="container_thumbnail_block">
            <!-- //On parcourt chacun des articles résultant de la requête -->
            <?php while ($query->have_posts()): ?>
              <?php $query->the_post(); ?>
              <div class="news_block">
                <?php if (has_post_thumbnail()): ?>
                  <div class="thumbnail-block">
                  <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(array(550, 550)); ?>
                    </a>
                  </div>
                <?php endif; ?>
              </div>
            <?php endwhile; ?>
           
          </div>
        <?php else: ?>
          <p>Désolé, aucun article ne correspond à cette requête</p>
        <?php endif;
        wp_reset_query();
        ?>

<div class="btn__wrapper">
  <a href="#!" class="btn btn__primary" id="load-more">Charger plus</a>
</div>


<script type="text/javascript"><!--
let contentdiv = document.getElementById("container_thumbnail_block"); 
let boutondiv = document.getElementById("load-more");
   var dropdown = document.getElementById("for");
   function onForChange() {
       if ( dropdown.options[dropdown.selectedIndex].value != -1 ) {
           $formats = dropdown.options[dropdown.selectedIndex].value;
       }
       contentdiv.style.display = "none";
       boutondiv.style.display = "none";
       console.log($formats);
      
   }
   dropdown.onchange = onForChange;

   var dropdowne = document.getElementById("cat");
   function onCatChange() {
       if ( dropdowne.options[dropdowne.selectedIndex].value != -1 ) {
           $catego = dropdowne.options[dropdowne.selectedIndex].value;
           console.log($catego);
           contentdiv.style.display = "none";
           boutondiv.style.display = "none";

       }
   }
   
   dropdowne.onchange = onCatChange;
--></script>

