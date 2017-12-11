<?php 
/*
Template Name: Team Page
*/
 ?>

<?php get_header(); ?>

	<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
		<?php
		$team = get_field( 'team', 'options' );	
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
			<?php if (!empty($team)) { ?>
			<section id="team-section" class="page-section profile-list">
				<div class="container-fluid">
					<header class="section-header">
					<h2><i class="fa fa-users fa-lg text-muted"></i> Who's Who?</h2>
					</header>
					<div class="row">
						<?php foreach ($team as $tm) { ?>
						<div class="col-xs-6">
							<div class="profile">
								<div class="profile-img" style="background-image: url(<?php echo $tm['profile_img']; ?>)"></div>
								<h3 class="name"><?php echo $tm['name']; ?></h3>
								<span class="role"><?php echo $tm['role']; ?></span>
								<div class="biog">
									<?php echo $tm['biog']; ?>
								</div>			
							</div>
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