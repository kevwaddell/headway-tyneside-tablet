<?php 
$news_args = array(
'numberposts' => 4,
'orderby'	=> 'date',
'order'	=> 'DESC'
);
$news_posts = get_posts($news_args);	

//echo '<pre>';print_r($news_posts);echo '</pre>';
?>

<?php if (!empty($news_posts)) { ?>
<section id="news-section" class="page-section post-grid">
	<div class="container-fluid">
		<header class="section-header">
			<div class="row">
				<div class="col-xs-8 col-md-6">
					<h2><i class="fa fa-newspaper-o fa-lg text-muted"></i> Headway News and Updates</h2>
				</div>
				<div class="col-xs-4 col-md-6 text-right">
					<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) );?>" class="btn btn-default  text-uppercase">View All <i class="fa fa-angle-double-right"></i></a>
				</div>
			</div>
		</header>
		<?php foreach ( $news_posts as $k => $post ) : setup_postdata( $post ); 
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
		<?php 
		endforeach; 
		wp_reset_postdata();
		?>
	</div>	
</section>			
<?php } ?>
