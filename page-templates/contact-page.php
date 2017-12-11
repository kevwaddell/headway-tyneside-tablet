<?php 
/*
Template Name: Contact Us Page
*/
 ?>

<?php get_header(); ?>

	<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
	
		<?php get_template_part( 'parts/global/location', 'map' ); ?>
		
		<?php get_template_part( 'parts/global/contact', 'form' ); ?>	
				
	<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>