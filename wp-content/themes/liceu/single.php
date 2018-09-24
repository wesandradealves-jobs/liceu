<?php get_header(); ?>

	<div class="container">

		<div class="content">

		    <?php if ( have_posts () ) : while (have_posts()) : the_post();  ?>

		    <div class="attachment">

		    	<?php if(wp_get_attachment_url(get_post_thumbnail_id($post->ID), full)) : ?>

		      		<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), full); ?>" alt="<?php echo get_the_title(); ?>" />

		    	<?php endif; ?>

		    </div>

		    <div class="feed">

		    	<h2 class="title"><?php echo get_the_title(); ?></h2>

		    	<?php the_content(); ?>

		    </div>

		    <?php endwhile; endif; ?>	

			  <?php 

			    $blogs = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' =>  3, 'order' => 'DESC'));

			    if($blogs) :

			  ?>

			    <h3 class="title -inner-session">Blog</h3>

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

			            $cat = get_the_category();

			            if($enable && $featured) :

			              // echo '<li onclick="document.location='."'".$permalink."'".';return false;">

			              //   <div>

			              //     <div>

			              //       <img src="'.$thumbnail.'">

			              //     </div>

			              //     <div>

						        //   <h3>'.get_the_title().'</h3>

						        //   <p>'.substr(get_the_excerpt(), 0, 80) . '...'.'</p>

			              //     </div>

			              //   </div>

										// </li>';  
										
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