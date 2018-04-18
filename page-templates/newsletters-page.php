<?php 
/*
Template Name: Newsletter Downloads Page
*/
 ?>

<?php get_header(); ?>

	<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
		<?php
		$newsletters = get_field( 'hwt_newsletters', 'options' );
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
				$feat_img = wp_get_attachment_image_src($post_thumbnail_id, array(350,350) );	
				//echo '<pre class="debug">';print_r($feat_img);echo '</pre>';
				?>
				<div class="row">
					<div class="col-xs-4">
						<figure class="feat-img">
							<img src="<?php echo $feat_img[0]; ?>" class="img-responsive">	
						</figure>
					</div>
					<div class="col-xs-8">
				<?php } ?>
				<?php the_content(); ?>
				<?php if ( has_post_thumbnail() ) { ?>
					</div>
				</div>
				<?php } ?>
				</div>
			</div>
			<?php if (!empty($newsletters)) { ?>
			<section id="newsletters-section" class="page-section downloads-list">
				<div class="container-fluid">
					<header class="section-header">
						<h2><i class="fa fa-download fa-lg text-muted"></i> Downloads</h2>
					</header>
					<div class="row">
						<?php foreach ($newsletters as $nl) { ?>
						<div class="col-xs-6 col-md-4">
							<a href="<?php echo $nl['newsletter'] ?>" target="_blank" class="download-link">
								<span class="title">Newsletter</span>
								<span class="date"><?php echo $nl['month'] ?> - <?php echo $nl['year'] ?></span>
							</a>
						</div>
					<?php } ?>
					</div>
				</div>
			</section>		
			<?php } ?>
		</article>
		
	<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>