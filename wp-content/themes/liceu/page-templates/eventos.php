<?php /* Template Name: Eventos */ ?>

<?php get_header(); ?>
<div class="container">
  <div class="content">

    <?php 
      $evento = new WP_Query( array( 'post_type' => 'eventos', 'posts_per_page' =>  1, 'order' => 'DESC'));
    if($evento) : ?>
    <div class="featured-content">
      <?php  
        while ($evento->have_posts()) : $evento->the_post();
          $title = get_the_title();
          $excerpt = get_the_excerpt();
          $permalink = get_the_permalink();
          $enable = get_field('habilitado');
          $featured = get_field('destaque');
          $thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID), full);
          $terms = get_the_terms( $post->ID, 'evento_categories' );
          $exclude_post = $post->ID;
          foreach ( $terms as $term ) {
            $cat = $term->name;
            $catURL = get_term_link($term->slug, $taxonomy);
          }
          if($enable && $featured) :
          echo '
          	<h2 class="title">'.get_the_title().'</h2>
            <div>
              <img src="'.$thumbnail.'">
            </div>
            <div>';
          the_content();        
          echo '</div>';
          endif;
        endwhile;
      ?>
    </div>
    <?php
      endif; 
      ?>
  <?php 
    $eventos = new WP_Query( array( 'post_type' => 'eventos', 'posts_per_page' =>  5, /*'post__not_in' => array($exclude_post),*/ 'order' => 'DESC'));
    if($eventos) :
  ?>
    <h3 class="title -inner-session">Eventos</h3>
    <ul class="related row">
      <?php 
          while ($eventos->have_posts()) : $eventos->the_post();
            $title = get_the_title();
            $excerpt = get_the_excerpt();
            $permalink = get_the_permalink();
            $enable = get_field('habilitado');
            $featured = get_field('destaque');
            $thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID), full);
            $terms = get_the_terms( $post->ID, 'evento_categories' );
            $exclude_post = $post->ID;
            foreach ( $terms as $term ) {
              $cat = $term->name;
              $catURL = get_term_link($term->slug, $taxonomy);
            }
            if($enable && $featured) :
		      echo '<li onclick="document.location='."'".$permalink."'".';return false;">
		        <div>
              <div class="thumbnail" style="background-image:url('.$thumbnail.');"></div>
  		        <div>
  		          <h3>'.get_the_title().'</h3>
  		          <p>'.get_the_excerpt().'</p>
  		        </div>
            </div>
		      </li>';

            endif;
          endwhile;
      ?>      
    </ul>
    <?php endif; ?>
  </div>
  <?php get_sidebar(); ?>              
</div> 
<?php get_footer(); ?>