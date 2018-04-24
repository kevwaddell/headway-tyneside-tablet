<?php 
/*
Template Name: Regular Meetings Page
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
			<?php
			$regular_meetings = get_field( 'hwt_reg_meetings', 'options' );
			?>
		<?php if (!empty($regular_meetings)) { ?>
		<section id="meetings-section" class="page-section events-list">
			<div class="container-fluid">
			<header class="section-header">
				<h2><i class="fa fa-users fa-lg text-muted"></i> <?php the_title(); ?></h2>
			</header>
				<?php foreach ($regular_meetings as $rm) { 
				$meeting_img = $rm['img'];
				$meeting_title = $rm['title'];
				$frequency = $rm['frequency'];
				$meeting_date = $rm['date'];
				$meeting_time = $rm['time'];
				$meeting_venue = $rm['venue'];
				$meeting_desc = $rm['description'];
				$meeting_contact_name = $rm['contact_name'];
				$meeting_contact_email = $rm['contact_email'];
				$meeting_contact_tel = $rm['contact_tel'];
				$feat_img = wp_get_attachment_image_src($meeting_img, 'medium' );
				//echo '<pre class="debug">';print_r($feat_img);echo '</pre>';	
				?>
				<div class="meeting-details">
					<div class="meeting-img" style="background-image: url(<?php echo $feat_img[0]; ?>)"></div>
					<div class="title"><?php echo $meeting_title; ?></div>
					<div class="frequency"><?php echo $frequency; ?></div>
					<div class="date">Date: <?php echo $meeting_date; ?></div>
					<div class="time">Time: <?php echo $meeting_time; ?></div>	
					<div class="venue">Venue: <?php echo $meeting_venue; ?></div>	
					<div class="desc"><?php echo $meeting_desc; ?></div>
					<div class="contact">Contact: <?php echo $meeting_contact_name; ?><br>
					Email: <a href="mailto:<?php echo $meeting_contact_email; ?>"><?php echo $meeting_contact_email; ?></a><br>
					Tel: <?php echo $meeting_contact_tel; ?>
					</div>
				</div>
				<?php } ?>
		</div>
		</section>		
		<?php } ?>
		</article>
		
	<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>