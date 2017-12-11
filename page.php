<?php get_header(); ?>

	<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
		<?php
		$sb_imgs = get_field( 'sb_imgs' );	
		?>
		<article <?php post_class("page-content"); ?>>
			<header class="page-title">
				<div class="container-fluid">
					<h1><?php the_title(); ?></h1>
				</div>
			</header>
			<div class="container-fluid">
				<div class="entry">
				<?php if ( has_post_thumbnail() || !empty($sb_imgs)) { 
				$post_thumbnail_id = get_post_thumbnail_id();
				$feat_img = wp_get_attachment_image_src($post_thumbnail_id, array(750,750) );
				if ($feat_img[1] < $feat_img[2]) {
				$feat_img = wp_get_attachment_image_src($post_thumbnail_id, array(350,350) );	
				}	
				//echo '<pre class="debug">';print_r($sb_imgs);echo '</pre>';
				?>
				<div class="row">
					<div class="<?php echo ($feat_img[1] < $feat_img[2] || !empty($sb_imgs)) ? 'col-xs-3 col-xs-push-9 ':'' ?>col-md-4 col-md-push-8 page-sb">
						<figure class="feat-img">
							<img src="<?php echo $feat_img[0]; ?>" class="img-responsive">	
						</figure>
						<?php if (!empty($sb_imgs)) { ?>
						<?php foreach ($sb_imgs as $img) { 
						$caption = $img['caption'];
						?>
						<figure class="feat-img">
							<img src="<?php echo $img['img']; ?>" class="img-responsive">
							<?php if (!empty($caption)) { ?>
							<figcaption class="caption"><?php echo $caption; ?></figcaption>			
							<?php } ?>	
						</figure>
						<?php } ?>			
						<?php } ?>
					</div>
					<div class="<?php echo ($feat_img[1] < $feat_img[2] || !empty($sb_imgs)) ? 'col-xs-9 col-xs-pull-3 ':'' ?>col-md-8 col-md-pull-4">
				<?php } ?>
				<?php the_content(); ?>
				<?php if ( has_post_thumbnail() ) { ?>
					</div>
				</div>
				<?php } ?>
				</div>
			</div>
		</article>
		
	<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>