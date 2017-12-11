<?php get_header(); ?>
	<article <?php post_class("page-content"); ?>>
		<header class="page-title">
			<div class="container-fluid">
				<h1><?php echo get_the_title(get_option('page_for_posts')); ?></h1>
			</div>
		</header>
	<?php if ( have_posts() ): ?>
		<section id="news-section" class="page-section post-grid">	
			<div class="container-fluid">
			<header class="section-header">
				<h2><i class="fa fa-newspaper-o fa-lg text-muted"></i> Headway News and Updates</h2>
			</header>
			<?php while ( have_posts() ) : the_post(); ?>	
			<?php
			$bg_img = get_the_post_thumbnail_url( $post , 'medium');
			//echo '<pre>';print_r($bg_img);echo '</pre>';
			$date = get_the_date('M j, Y', $post);
			?>
				<article id="grid-item-<?php echo $k; ?>" class="grid-item">
					<a href="<?php the_permalink(); ?>"><div class="img" style="background-image: url(<?php echo $bg_img; ?>)"></div></a>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<time><?php echo $date; ?></time>
					<?php the_excerpt(); ?>
				</article>
			<?php endwhile; ?>
			</div>	
		</section>
		<div class="post-paging">
			<div class="container-fluid">
			<?php pagination_bar(); ?>
			</div>
		</div>
	<?php endif; ?>
	</article>
	
<?php get_footer(); ?>