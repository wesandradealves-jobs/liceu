<?php 

    /**

    * Template Name: Home

    */

?>



<?php get_header(); ?>

    <?php 

    	$featured_post = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' =>  1, 'order' => 'DESC'));

		if($featured_post) : ?>

			<section class="destaques">

				<div class="container">

					<?php

						while ($featured_post->have_posts()) : $featured_post->the_post();

							$title = get_the_title();

							$excerpt = get_the_excerpt();

							$permalink = get_the_permalink();

							$enable = get_field('habilitado');

							$featured = get_field('destaque');

							$thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID), full);

							$cat = get_the_category();

							$exclude_post = $post->ID;



							if($enable && $featured) :

					            $tpl = '<div class="destaque">';

					              $tpl .= '<div onclick="document.location='."'".$permalink."'".';return false;" style="background-image:url('.$thumbnail.')" class="destaque-inner">';

					                $tpl .= '<div class="destaque-content">';

										if ( ! empty( $cat ) ) {

									    	$tpl .= '<p class="category">'.esc_html( $cat[0]->name ).'</p>';

										}	

					                  $tpl .= '<h2 class="title">'.$title.'</h2>';

					                $tpl .= '</div>';

					              $tpl .= '</div>';

					            $tpl .= '</div> ';

				        	endif;



				            echo $tpl;

						endwhile;	



						$posts = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' =>  2, 'post__not_in' => array($exclude_post), 'order' => 'DESC'));

						$tpl = "<ul>";

						while ($posts->have_posts()) : $posts->the_post();

							$title = get_the_title();

							$excerpt = get_the_excerpt();

							$permalink = get_the_permalink();

							$enable = get_field('habilitado');

							$featured = get_field('destaque');

							$thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID), full);

							$cat = get_the_category();



							if($enable && $featured) :

								$tpl .= '<li class="destaque">';

								$tpl .= '<div onclick="document.location='."'".$permalink."'".';return false;" style="background-image:url('.$thumbnail.')" class="destaque-inner">';

								  $tpl .= '<div class="destaque-content">';

									if ( ! empty( $cat ) ) {

								    	$tpl .= '<p class="category">'.esc_html( $cat[0]->name ).'</p>';

									}								  

								    $tpl .= '<h2 class="title">'.$title.'</h2>';

								  $tpl .= '</div>';

								$tpl .= '</div>';

								$tpl .= '</li>	';

							endif;

						endwhile;

						$tpl .= "</ul>";



						echo $tpl;

					?>

	          	</div>

	        </section>

	<?php

		endif; 

    ?>

    <?php 

    	$turmas = new WP_Query( array( 'post_type' => 'turmas', 'posts_per_page' =>  -1, 'order' => 'DESC'));

		if($turmas) : ?>

	        <section class="turmas">

	          <div class="container">

	            <h3 class="section-title">Encontros</h3>

	            <ul class="owl-carousel owl-theme">

	            	<?php  

						while ($turmas->have_posts()) : $turmas->the_post();

							$title = get_the_title();

							$excerpt = get_the_excerpt();

							$permalink = get_the_permalink();

							$enable = get_field('habilitado');

							$featured = get_field('destaque');

							$thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID), full);

							$terms = get_the_terms( $post->ID, 'turma_categories' );

							foreach ( $terms as $term ) {

								$cat = $term->name;

								$catURL = get_term_link($term->slug, $taxonomy);

							}

							if($enable && $featured) :

								$tpl = '<li class="item destaque">';

								$tpl .= '<div onclick="document.location='."'".$permalink."'".';return false;" style="background-image:url('.$thumbnail.')" class="destaque-inner">';

								  $tpl .= '<div class="destaque-content">';

								  	if($cat) :

								    	$tpl .= '<p class="category">'.$cat.'</p>';

								    endif;

								    $tpl .= '<h2 class="title">'.$title.'</h2>';

								  $tpl .= '</div>';

								$tpl .= '</div>';

								$tpl .= '</li>';

							endif;

	

							echo $tpl;

						endwhile;

	            	?>

	            </ul>

	          </div>

	        </section>

	<?php

		endif; 

    ?>

    <?php 

    	$dicas = new WP_Query( array( 'post_type' => 'dicas', 'posts_per_page' =>  5, 'order' => 'DESC'));

    	$dicas_stage = new WP_Query( array( 'post_type' => 'dicas', 'posts_per_page' =>  1, 'order' => 'DESC'));

		if($dicas) : ?>

        <section id="dicas-do-mestre" class="dicas-pe-diller pattern">

          <div class="container">

            <h3 class="section-title">Dicas do Mestre</h3>

            <div class="videos">

				<?php 

					$tpl = '<nav class="videos-navigation">';

					$tpl .= '<ul>';

					while ($dicas->have_posts()) : $dicas->the_post();

						$title = get_the_title();

						$excerpt = get_the_excerpt();

						$enable = get_field('habilitado');

						$featured = get_field('destaque');

						$embed = get_post_meta($post->ID, 'embed_externo', true);

						$url_externa = get_post_meta($post->ID, 'url_externa', false, false);

						$file = get_field('upload_de_arquivo', false);

						$thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID), full);

						if($enable && $featured) :

							$tpl .= '<li class="'.((!$dicas->current_post) ? '-active' : '').'" onclick="videos(this)" data-video="'.(($file) ? $file : $url_externa[0]).'">';

							$tpl .= '<div class="video-thumbnail" style="background-image:url('.$thumbnail.')"></div>';

							$tpl .= '<div>';

							$tpl .= '<h2 class="title">'.$title.' <small>'.get_the_date().'</small></h2>';

							$tpl .= '</div>';

							$tpl .= '</li>';

						endif;

					endwhile;

					$tpl .= '</ul>';

					$tpl .= '</nav>';



					echo $tpl;



					echo '<div class="videos-stage">';

					echo '<div class="embed-container">';

					while ($dicas_stage->have_posts()) : $dicas_stage->the_post();

						$title = get_the_title();

						$excerpt = get_the_excerpt();

						$enable = get_field('habilitado');

						$featured = get_field('destaque');

						$embed = get_post_meta($post->ID, 'embed_externo', true);

						$url_externa = get_post_meta($post->ID, 'url_externa', false, false);

						$file = get_field('upload_de_arquivo');

						$thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID), full);

						// Mostrar e tratar o último

						if($embed&&$url_externa) :

							if($enable && $featured) :

								$tpl = '<!-- Youtube -->';

								$tpl .= '<iframe width="100%" height="100%" src="'.$url_externa[0].'" />';  

							endif;

						else :

							if($enable && $featured) :

							$tpl = '<!-- Upload -->';

								$tpl .= '<video src="'.$file.'" width="100%" controls';

								$tpl .= ' poster="'.$thumbnail.'" data-setup="{}">';

								$tpl .= '</video>';   

							endif;

						endif;                 



						echo $tpl; 

					endwhile;

					echo '</div>';

					echo '</div>';

				?>





            </div>

          </div>

        </section>

	<?php

		endif; 

    ?>

    <?php 

    	$omura = new WP_Query( array( 'post_type' => 'omura', 'posts_per_page' =>  1, 'order' => 'DESC'));

		if($omura) : ?>

        <section id="omura" class="omura pattern">

          <div class="container">

            <h3 class="section-title">Memórias</h3>

            <div class="destaques -mini-grid">

              <div class="container">

				<?php

					while ($omura->have_posts()) : $omura->the_post();

					$title = get_the_title();

					$excerpt = get_the_excerpt();

					$permalink = get_the_permalink();

					$enable = get_field('habilitado');

					$featured = get_field('destaque');

					$thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID), full);

					$terms = get_the_terms( $post->ID, 'omura_categories' );

					foreach ( $terms as $term ) {

						$cat = $term->name;

						$catURL = get_term_link($term->slug, $taxonomy);

					}

					$exclude_post = $post->ID;



					if($enable && $featured) :

						$tpl = '<div class="destaque">';

						  $tpl .= '<div onclick="document.location='."'".$permalink."'".';return false;" style="background-image:url('.$thumbnail.')" class="destaque-inner">';

						    $tpl .= '<div class="destaque-content">';

								if ( ! empty( $cat ) ) {

							    	$tpl .= '<p class="category">'.$cat.'</p>';

								}	

						      $tpl .= '<h2 class="title">'.$title.'</h2>';

						    $tpl .= '</div>';

						  $tpl .= '</div>';

						$tpl .= '</div> '; 

					endif;



					echo $tpl;

					endwhile;	



					$omuras = new WP_Query( array( 'post_type' => 'omura', 'posts_per_page' =>  2, 'post__not_in' => array($exclude_post), 'order' => 'DESC'));

					$tpl = "<ul>";

					while ($omuras->have_posts()) : $omuras->the_post();

					$title = get_the_title();

					$excerpt = get_the_excerpt();

					$permalink = get_the_permalink();

					$enable = get_field('habilitado');

					$featured = get_field('destaque');

					$thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID), full);

					$terms = get_the_terms( $post->ID, 'omura_categories' );

					foreach ( $terms as $term ) {

						$cat = $term->name;

						$catURL = get_term_link($term->slug, $taxonomy);

					}



					if($enable && $featured) :

						$tpl .= '<li class="destaque">';

						$tpl .= '<div onclick="document.location='."'".$permalink."'".';return false;" style="background-image:url('.$thumbnail.')"  class="destaque-inner"></div>';

						$tpl .= '<div class="destaque-content">';

						  $tpl .= '<h2 class="title">'.$title.' <small>'.get_the_date().'</small></h2>';

						$tpl .= '</div>';               

						$tpl .= '</li>';

					endif;

					endwhile;

					$tpl .= "</ul>";



					echo $tpl;

				?>

              </div>

            </div>

          </div>

        </section>

	<?php

		endif; 

    ?>

    <?php 

    	$evento = new WP_Query( array( 'post_type' => 'eventos', 'posts_per_page' =>  1, 'order' => 'DESC'));

		if($evento) : ?>

        <section class="eventos">

          <div class="container">

            <h3 class="section-title">Eventos</h3>

            <div class="destaques -mini-grid -reverse">

              <div class="container">



				<?php

					while ($evento->have_posts()) : $evento->the_post();

					$title = get_the_title();

					$excerpt = get_the_excerpt();

					$permalink = get_the_permalink();

					$enable = get_field('habilitado');

					$featured = get_field('destaque');

					$thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID), full);

					$terms = get_the_terms( $post->ID, 'evento_categories' );

					foreach ( $terms as $term ) {

						$cat = $term->name;

						$catURL = get_term_link($term->slug, $taxonomy);

					}

					$exclude_post = $post->ID;



					if($enable && $featured) :

						$tpl = '<div class="destaque">';

						  $tpl .= '<div onclick="document.location='."'".$permalink."'".';return false;" style="background-image:url('.$thumbnail.')" class="destaque-inner">';

						    $tpl .= '<div class="destaque-content">';

								if ( ! empty( $cat ) ) {

							    	$tpl .= '<p class="category">'.$cat.'</p>';

								}	

						      $tpl .= '<h2 class="title">'.$title.'</h2>';

						    $tpl .= '</div>';

						  $tpl .= '</div>';

						$tpl .= '</div> '; 

					endif;



					echo $tpl;

					endwhile;	



					$eventos = new WP_Query( array( 'post_type' => 'eventos', 'posts_per_page' =>  2, 'post__not_in' => array($exclude_post), 'order' => 'DESC'));

					$tpl = "<ul>";

					while ($eventos->have_posts()) : $eventos->the_post();

					$title = get_the_title();

					$excerpt = get_the_excerpt();

					$permalink = get_the_permalink();

					$enable = get_field('habilitado');

					$featured = get_field('destaque');

					$thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID), full);

					$terms = get_the_terms( $post->ID, 'evento_categories' );

					foreach ( $terms as $term ) {

						$cat = $term->name;

						$catURL = get_term_link($term->slug, $taxonomy);

					}



					if($enable && $featured) :

						$tpl .= '<li class="destaque">';

						$tpl .= '<div onclick="document.location='."'".$permalink."'".';return false;" style="background-image:url('.$thumbnail.')"  class="destaque-inner"></div>';

						$tpl .= '<div class="destaque-content">';

						  $tpl .= '<h2 class="title">'.$title.' <small>'.get_the_date().'</small></h2>';

						$tpl .= '</div>';               

						$tpl .= '</li>';

					endif;

					endwhile;

					$tpl .= "</ul>";



					echo $tpl;

				?>



              </div>

            </div>

          </div>

        </section>

	<?php

		endif; 

    ?>

    <?php if(get_theme_mod('bg')||get_theme_mod('telefone')||get_theme_mod('endereco')||get_theme_mod('email')) : ?>

        <section class="cadastre-se" style="background-image:url(<?php echo (get_theme_mod('bg')) ? get_theme_mod('bg') : ''; ?>)">

          <div class="container">

            <h3 class="section-title">Contato</h3>

            <?php if(get_theme_mod('telefone')||get_theme_mod('endereco')||get_theme_mod('email')) : ?>

            <div>

              <p>

              	<?php 

              		echo (get_theme_mod('telefone')) ? "<span>".get_theme_mod('telefone')."</span><br/>" : '';

              		echo (get_theme_mod('email')) ? get_theme_mod('email')."<br/>" : '';

              		echo (get_theme_mod('endereco')) ? "<br/>".get_theme_mod('endereco') : '';

              	?>

              </p>

            </div>

			<?php

				endif; 

		    ?>

          </div>

        </section>

	<?php

		endif; 

    ?>

<?php get_footer(); ?>