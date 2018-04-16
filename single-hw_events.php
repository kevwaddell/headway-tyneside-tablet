<?php get_header(); ?>

	<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
		<?php
		$diary_pg = get_page_by_path( 'diary' );
		$sb_imgs = get_field( 'sb_imgs' );	
		$cats = wp_get_post_terms($post->ID, 'event_category');
		$cat_title = get_term_field('name', $cats[0]->term_id);
		$venue_name = get_field( 'venue_name' );
		$venue_address = get_field( 'venue_address' );
		$start_date_raw = get_field( 'start_date');
		$end_date_raw = get_field( 'end_date');
		$start_date = new DateTime($start_date_raw, new DateTimeZone(get_option('timezone_string')) );
		if ($end_date_raw != $start_date_raw) {
		$end_date = new DateTime($end_date_raw, new DateTimeZone(get_option('timezone_string')) );	
		}
		$start_time = get_field( 'start_time');
		$end_time = get_field( 'end_time');
		$start_all_day = get_field( 'all_day_start');
		$organiser_name = get_field( 'organiser_name');
		$organiser_tel = get_field( 'organiser_phone');
		$organiser_email = get_field( 'organiser_email');
		//echo '<pre>';print_r($cat_title);echo '</pre>';
		?>
		<article <?php post_class("page-content"); ?>>
			<header class="page-title">
				<div class="container-fluid">
					<h1><?php echo get_the_title($diary_pg->ID); ?> - <?php echo $cat_title;  ?></h1>
				</div>
			</header>
			<div class="container-fluid">
				<div class="entry">
				<div class="row">
					<div class="col-md-8">
					<?php get_template_part( 'parts/events/event', 'map' ); ?>
					</div>
					<div class="col-md-4">
						<div class="row">
							<div class="col-xs-6 col-md-12">
								<table class="table table-striped">
						<thead>
							<tr>
								<th colspan="2" class="text-uppercase text-muted">Event details</th>	
							</tr>
						</thead>
						<tbody>
							<tr>
								<th width="30%">Venue: </th>
								<td><?php echo $venue_name; ?></td>
							</tr>
							<tr>
								<th>Address: </th>
								<td><?php echo $venue_address; ?></td>
							</tr>
							<tr>
								<th>Date: </th>
								<td>
								<?php if (isset($start_date)) { ?>
								<span class="times"><?php echo $start_date->format('l, jS M, Y') ?></span>
								<?php } ?>
								<?php if (isset($end_date)) { ?>
								<br><span class="times"> - <?php echo $end_date->format('l, jS M, Y') ?></span>
								<?php } ?>
								</td>
							</tr>
							<tr>
								<th>Time: </th>
								<td>
								<?php if ($start_all_day) { ?>
								<span class="times">All day</span>
								<?php } ?>
								<?php if (!empty($start_time)) { ?>
								<span class="times"><?php echo $start_time; ?></span>
								<?php } ?>
								<?php if (!empty($end_time)) { ?>
								<span class="times"> - <?php echo $end_time; ?></span>
								<?php } ?>
								</td>
							</tr>
						</tbody>
					</table>
							</div>
							<div class="col-xs-6 col-md-12">
								<table class="table table-striped">
						<thead>
							<tr>
								<th colspan="2" class="text-uppercase text-muted">Organiser</th>	
							</tr>
						</thead>
						<tbody>
							<tr>
								<th width="30%">Name: </th>
								<td><?php echo $organiser_name; ?></td>
							</tr>
							<tr>
								<th>Tel: </th>
								<td><?php echo $organiser_tel; ?></td>
							</tr>
							<tr>
								<th>email: </th>
								<td>
									<?php if (empty($organiser_email)) { ?>
									-
									<?php } else { ?>
									<a href="mailto:<?php echo $organiser_email; ?>"><?php echo $organiser_email; ?></a>
									<?php } ?>
								</td>
							</tr>
						</tbody>
					</table>
							</div>
						</div>
					</div>
				</div>
				
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>

				</div>
			</div>
		</article>
		
	<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>