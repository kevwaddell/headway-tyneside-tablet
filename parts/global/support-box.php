<?php
$contact_pg = get_page_by_path( 'contact-us' );	
?>
<section id="help-and-support-section" class="page-section">
	<div class="container-fluid">
		<div class="get-in-touch-box text-center">
			<h3>Need Help or Support?</h3>
			<a href="<?php echo get_permalink( $contact_pg->ID ); ?>" class="btn btn-default btn-lg">Get In Touch Today</a>
		</div>
	</div>
</section>