<?php /* Template Name: Contato */ ?>

<?php get_header(); ?>
<div class="container">
  <div class="content">
  	<h2 class="pg-title"><?php the_title(); ?></h2>
  	<?php echo do_shortcode('[contact-form-7 id="142" title="Contato"]'); ?>
  </div>
</div>
<?php get_footer(); ?>