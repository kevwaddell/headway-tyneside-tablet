<?php get_header(); ?>
	
	<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
	
	<?php get_template_part( 'parts/home-page/banner', 'hp' ); ?>
	
	<?php get_template_part( 'parts/home-page/news', 'updates' ); ?>
	
	<?php get_template_part( 'parts/home-page/events', 'updates' ); ?>		
	
	<?php get_template_part( 'parts/global/contact', 'form' ); ?>	
	
	<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>