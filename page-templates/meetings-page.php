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
			$sg_meeting_active = get_field( 'hwt_SGmeeting_active', 'options' );	
			$ps_meeting_active = get_field( 'hwt_PSmeeting_active', 'options' );
			$sc_meeting_active = get_field( 'hwt_SCmeeting_active', 'options' );
			?>
		<?php if ($sg_meeting_active || $ps_meeting_active || $sc_meeting_active) { ?>
		<section id="meetings-section" class="page-section events-list">
			<div class="container">
			<header class="section-header">
				<h2><i class="fa fa-users fa-lg text-muted"></i> <?php the_title(); ?></h2>
			</header>
				<?php if ($sg_meeting_active) { 
				$sg_meeting_img = get_field( 'sg_meeting_img', 'options' );
				$sg_meeting_title = get_field( 'sg_meeting_title', 'options' );
				$sg_meeting_date = get_field( 'sg_meeting_date', 'options' );
				$sg_meeting_time = get_field( 'sg_meeting_time', 'options' );
				$sg_meeting_venue = get_field( 'sg_meeting_venue', 'options' );
				$sg_meeting_desc = get_field( 'sg_meeting_desc', 'options' );
				$sg_meeting_contact_name = get_field( 'sg_meeting_contact_name', 'options' );
				$sg_meeting_contact_email = get_field( 'sg_meeting_contact_email', 'options' );
				$sg_meeting_contact_tel = get_field( 'sg_meeting_contact_tel', 'options' );
				$feat_img = wp_get_attachment_image_src($sg_meeting_img, 'medium' );
				//echo '<pre class="debug">';print_r($feat_img);echo '</pre>';	
				?>
				<div class="meeting-details">
					<div class="meeting-img" style="background-image: url(<?php echo $feat_img[0]; ?>)"></div>
					<div class="title"><?php echo $sg_meeting_title; ?></div>
					<div class="date">Date: <?php echo $sg_meeting_date; ?></div>
					<div class="time">Time: <?php echo $sg_meeting_time; ?></div>	
					<div class="venue">Venue: <?php echo $sg_meeting_venue; ?></div>	
					<div class="desc"><?php echo $sg_meeting_desc; ?></div>
					<div class="contact">Contact: <?php echo $sg_meeting_contact_name; ?><br>
					Email: <a href="mailto:<?php echo $sg_meeting_contact_email; ?>"><?php echo $sg_meeting_contact_email; ?></a><br>
					Tel: <?php echo $sg_meeting_contact_tel; ?>
					</div>
				</div>
				<?php } ?>
				
				<?php if ($ps_meeting_active) { 
				$ps_meeting_img = get_field( 'ps_meeting_img', 'options' );
				$ps_meeting_title = get_field( 'ps_meeting_title', 'options' );
				$ps_meeting_date = get_field( 'ps_meeting_date', 'options' );
				$ps_meeting_time = get_field( 'ps_meeting_time', 'options' );
				$ps_meeting_venue = get_field( 'ps_meeting_venue', 'options' ); 
				$ps_meeting_desc = get_field( 'ps_meeting_desc', 'options' );
				$ps_meeting_contact_name = get_field( 'ps_meeting_contact_name', 'options' );
				$ps_meeting_contact_email = get_field( 'ps_meeting_contact_email', 'options' );
				$ps_meeting_contact_tel = get_field( 'ps_meeting_contact_tel', 'options' );
				$feat_img = wp_get_attachment_image_src($ps_meeting_img, 'medium' );
				?>
				<div class="meeting-details">
					<div class="meeting-img" style="background-image: url(<?php echo $feat_img[0]; ?>)"></div>
					<div class="title"><?php echo $ps_meeting_title; ?></div>
					<div class="date">Date: <?php echo $ps_meeting_date; ?></div>
					<div class="time">Time: <?php echo $ps_meeting_time; ?></div>	
					<div class="venue">Venue: <?php echo $ps_meeting_venue; ?></div>	
					<div class="desc"><?php echo $ps_meeting_desc; ?></div>
					<div class="contact">Contact: <?php echo $ps_meeting_contact_name; ?><br>
					Email: <a href="mailto:<?php echo $ps_meeting_contact_email; ?>"><?php echo $ps_meeting_contact_email; ?></a><br>
					Tel: <?php echo $ps_meeting_contact_tel; ?>
					</div>
				</div>
				<?php } ?>

				<?php if ($sc_meeting_active) { 
				$sc_meeting_img = get_field( 'sc_meeting_img', 'options' );
				$sc_meeting_title = get_field( 'sc_meeting_title', 'options' );
				$sc_meeting_date = get_field( 'sc_meeting_date', 'options' );
				$sc_meeting_time = get_field( 'sc_meeting_time', 'options' );
				$sc_meeting_venue = get_field( 'sc_meeting_venue', 'options' ); 
				$sc_meeting_desc = get_field( 'sc_meeting_desc', 'options' );
				$sc_meeting_contact_name = get_field( 'sc_meeting_contact_name', 'options' );
				$sc_meeting_contact_email = get_field( 'sc_meeting_contact_email', 'options' );
				$sc_meeting_contact_tel = get_field( 'sc_meeting_contact_tel', 'options' );
				$feat_img = wp_get_attachment_image_src($sc_meeting_img, 'medium' );
				?>
				<div class="meeting-details">
					<div class="meeting-img" style="background-image: url(<?php echo $feat_img[0]; ?>)"></div>
					<div class="title"><?php echo $sc_meeting_title; ?></div>
					<div class="date">Date: <?php echo $sc_meeting_date; ?></div>
					<div class="time">Time: <?php echo $sc_meeting_time; ?></div>	
					<div class="venue">Venue: <?php echo $sc_meeting_venue; ?></div>	
					<div class="desc"><?php echo $sc_meeting_desc; ?></div>
					<div class="contact">Contact: <?php echo $sc_meeting_contact_name; ?><br>
					Email: <a href="mailto:<?php echo $sc_meeting_contact_email; ?>"><?php echo $sc_meeting_contact_email; ?></a><br>
					Tel: <?php echo $sc_meeting_contact_tel; ?>
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