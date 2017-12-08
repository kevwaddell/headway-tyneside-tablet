<?php 
$diary_pg = get_page_by_path( 'diary' );
$event_args = array(
'post_type'	=> 'hw_events',
'posts_per_page' => -1,
'order'	=> 'ASC',
'meta_key'	=>	'start_date',
'orderby'	=> 'meta_value_num',
'meta_query' => array( 
		array (
		'value' => array( date('Ymd'), date('Ymd', strtotime('last day of next month')) ), 
		'compare' => 'BETWEEN'
		)
	)
);
$event_posts = get_posts($event_args);	
//echo '<pre>';print_r($event_args);echo '</pre>';
//echo '<pre>';print_r($event_posts);echo '</pre>';
?>
<?php if (!empty($event_posts)) { ?>
<section id="events-section" class="page-section events-list">
	<div class="container-fluid">
		<header class="section-header">
			<div class="row">
				<div class="col-xs-8 col-md-6">
					<h2><i class="fa fa-calendar fa-lg text-muted"></i> Headway Events</h2>
				</div>
				<div class="col-xs-4 col-md-6 text-right">
					<a href="<?php echo get_permalink( $diary_pg->ID );?>" class="btn btn-default text-uppercase">View All <i class="fa fa-angle-double-right"></i></a>
				</div>
			</div>
		</header>
		<?php foreach ( $event_posts as $k => $post ) : setup_postdata( $post ); ?>
		<?php
		$start_date_raw = get_field( 'start_date');
		$end_date_raw = get_field( 'end_date');
		$start_date = new DateTime($start_date_raw, new DateTimeZone(get_option('timezone_string')) );
		if ($end_date_raw != $start_date_raw) {
		$end_date = new DateTime($end_date_raw, new DateTimeZone(get_option('timezone_string')) );	
		}
		$start_time = get_field( 'start_time');
		$end_time = get_field( 'end_time');
		$start_all_day = get_field( 'all_day_start');
		//echo '<pre>';print_r($date);echo '</pre>';	
		?>
		<article id="grid-item-<?php echo $k; ?>" class="grid-item">
			<div class="calendar-date">
				<span class="mth"><?php echo $start_date->format('M'); ?></span>
				<span class="dy"><?php echo $start_date->format('j'); ?></span>
				<span class="wd"><?php echo $start_date->format('D'); ?></span>
			</div>
			<div class="list-entry">
				<header class="event-item-header">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<?php if ($start_all_day) { ?>
					<span class="times">All day</span>
					<?php } ?>
					<?php if (isset($end_date)) { ?>
					<span class="times"><?php echo $start_date->format('M j') ?> - <?php echo $end_date->format('M j') ?></span>
					<?php } ?>
					<?php if (!empty($start_time)) { ?>
					<span class="times"><?php echo $start_time; ?></span>
					<?php } ?>
					<?php if (!empty($end_time)) { ?>
					<span class="times"> - <?php echo $end_time; ?></span>
					<?php } ?>
				</header>
				<?php the_excerpt(); ?>
				<a href="<?php the_permalink(); ?>" class="goto-link"><i class="fa fa-arrow-right fa-lg"></i><span class="sr-only">Read more</span></a>
			</div>
		</article>
		<?php 
		endforeach; 
		wp_reset_postdata();
		?>
	</div>	
</section>					
<?php } ?>