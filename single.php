<?php get_header(); ?>
 	<?php if(function_exists('bcn_display')){ ?>
	<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
		<div class="container">
			<?php  bcn_display(); ?>
		</div>
	</div>
	<?php } ?>
	<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
		<?php
		$sb_imgs = get_field( 'sb_imgs' );	
		$date = get_the_date('F jS, Y', $post);
		?>
		<article <?php post_class("page-content"); ?>>
			<div class="container-fluid">
				<div class="entry">
				<?php if ( has_post_thumbnail() || !empty($sb_imgs)) { 
				$post_thumbnail_id = get_post_thumbnail_id();
				$feat_img = wp_get_attachment_image_src($post_thumbnail_id, array(750,750) );
				
				if ($feat_img[1] < $feat_img[2]) {
				$feat_img = wp_get_attachment_image_src($post_thumbnail_id, array(350,350) );	
				}	
				//echo '<pre class="debug">';print_r($feat_img);echo '</pre>';
				?>
				<div class="row">
					<div class="<?php echo ($feat_img[1] < $feat_img[2]) ? 'col-xs-3 col-xs-push-9 ':'' ?>col-md-4 col-md-push-8">
						<figure class="feat-img post-img">
							<img src="<?php echo $feat_img[0]; ?>" class="img-responsive">	
						</figure>
					</div>
				<div class="<?php echo ($feat_img[1] < $feat_img[2]) ? 'col-xs-9 col-xs-pull-3 ':'' ?>col-md-8 col-md-pull-4">
				<?php } ?>
				<header class="post-header">
					<h1><?php the_title(); ?></h1>
					<p class="article-info"><time><?php echo $date; ?></time>|<?php echo get_the_term_list( $post->ID, 'category', '<span>', ', ', '</span>|' ); ?></p>
				</header>
				<?php the_content(); ?>
				<?php if ( has_post_thumbnail() ) { ?>
					</div>
				</div>
				<?php } ?>
				<?php if (!empty($sb_imgs)) { ?>
				<div class="row">
					<?php foreach ($sb_imgs as $img) { 
					$caption = $img['caption'];
					?>
					<div class="col-xs-4">
					<figure class="feat-img post-img">
						<img src="<?php echo $img['img']; ?>" class="img-responsive">
						<?php if (!empty($caption)) { ?>
						<figcaption class="caption"><?php echo $caption; ?></figcaption>			
						<?php } ?>	
					</figure>
					</div>
					<?php } ?>		
				</div>
				<?php } ?>

				</div>
			</div>
		</article>
		
	<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>