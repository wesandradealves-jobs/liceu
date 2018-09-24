<?php 
    /**
    * Template Name: Turmas
    */
?>

<?php get_header(); ?>
<div class="container">
  <div class="content">
    <?php 
      $turma = new WP_Query( array( 'post_type' => 'turmas', 'posts_per_page' =>  1, 'order' => 'DESC'));
    if($turma) : ?>
    <div class="featured-content">
      <?php  
        while ($turma->have_posts()) : $turma->the_post();
          $title = get_the_title();
          $excerpt = get_the_excerpt();
          $permalink = get_the_permalink();
          $enable = get_field('habilitado');
          $featured = get_field('destaque');
          $thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID), full);
          $terms = get_the_terms( $post->ID, 'turma_categories' );
          $exclude_post = $post->ID;
          foreach ( $terms as $term ) {
            $cat = $term->name;
            $catURL = get_term_link($term->slug, $taxonomy);
          }
          if($enable && $featured) :
          echo '
            <div>
              <img src="'.$thumbnail.'">
            </div>
            <div><h2 class="title">'.get_the_title().'</h2>';
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
    $turmas = new WP_Query( array( 'post_type' => 'turmas', 'posts_per_page' =>  3, /*'post__not_in' => array($exclude_post),*/ 'order' => 'DESC'));
    if($turmas) :
  ?>
    <h3 class="title -inner-session">Encontros</h3>
    <ul class="related column">
      <?php 
          while ($turmas->have_posts()) : $turmas->the_post();
            $title = get_the_title();
            $excerpt = get_the_excerpt();
            $permalink = get_the_permalink();
            $enable = get_field('habilitado');
            $featured = get_field('destaque');
            $thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID), full);
            $terms = get_the_terms( $post->ID, 'turma_categories' );
            $exclude_post = $post->ID;
            foreach ( $terms as $term ) {
              $cat = $term->name;
              $catURL = get_term_link($term->slug, $taxonomy);
            }
            if($enable && $featured) :
              echo '<li onclick="document.location='."'".$permalink."'".';return false;">';
              echo '<div>
                  <div class="thumbnail" style="background-image:url('.$thumbnail.');"></div>
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