<?php /* Template Name: Eventos */ ?>

<?php get_header(); ?>
<div class="container">
  <div class="content">

    <?php 
      $blog = new WP_Query( array( 'post_type' => 'post', 'tax_query' => array(
		array(
			'taxonomy' => 'category',
			'field'    => 'slug',
			'terms'    => 'boa-semana',
		),
	), 'posts_per_page' =>  1, 'order' => 'DESC'));
    if($blog) : ?>
    <div class="featured-content">
      <?php  
        while ($blog->have_posts()) : $blog->the_post();
          $title = get_the_title();
          $excerpt = get_the_excerpt();
          $permalink = get_the_permalink();
          $enable = get_field('habilitado');
          $featured = get_field('destaque');
          $thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID), full);
          $terms = get_the_terms( $post->ID, 'evento_categories' );
          $exclude_post = $post->ID;
          $cat = get_the_category();
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
    $blogs = new WP_Query( array( 'post_type' => 'post', 	'tax_query' => array(
		array(
			'taxonomy' => 'category',
			'field'    => 'slug',
			'terms'    => 'boa-semana',
		),
	), 'posts_per_page' =>  3, /*'post__not_in' => array($exclude_post),*/ 'order' => 'DESC'));
    if($blogs) :
  ?>
    <h3 class="title -inner-session">Boa Semana</h3>
    <ul class="related column">
      <?php 
          while ($blogs->have_posts()) : $blogs->the_post();
            $title = get_the_title();
            $excerpt = get_the_excerpt();
            $permalink = get_the_permalink();
            $enable = get_field('habilitado');
            $featured = get_field('destaque');
            $thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID), full);
            $terms = get_the_terms( $post->ID, 'evento_categories' );
            $exclude_post = $post->ID;
            $cat = get_the_category();
            if($enable && $featured) :
              echo '<li onclick="document.location='."'".$permalink."'".';return false;">
                <div>
                  <div class="thumbnail" style="background-image:url('.$thumbnail.');"></div>
  			          <h3>'.get_the_title().'</h3>
  			          <p>'.substr(get_the_excerpt(), 0, 80) . '...'.'</p>
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