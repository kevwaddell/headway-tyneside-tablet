<?php
$form = get_field( 'hp_form', 'options' );
$enquiries_message = get_field( 'enquiries_message', 'options' );
$contact_email = get_field( 'contact_email', 'options' );
$address = get_field( 'address', 'options' );
$contact_tel = get_field( 'contact_tel', 'options' );
$charity_number = get_field( 'charity_number', 'options' );
//echo '<pre class="debug">';print_r($form);echo '</pre>';	
?>

<section id="contact-section" class="page-section contact-form">
	<div class="container-fluid">
		<header class="section-header">
			<h2><i class="fa fa-comments fa-lg text-muted"></i> Getting in Touch</h2>
		</header>
		<div class="row">
			<div class="col-xs-7 col-md-8">

			<?php if( function_exists( 'ninja_forms_display_form' ) ){  ?>
			<?php ninja_forms_display_form($form); ?>
			<?php } ?>
			</div>
			<div class="col-xs-5 col-md-4">
				<div class="contact-info">
					<h4>For all information and enquiries</h4>
					<p><?php echo $enquiries_message; ?> 
					<a href="mailto:<?php echo $contact_email; ?>"><?php echo $contact_email; ?></a>
					</p>
					<p><?php echo $address; ?></p>
					<p>Tel: <?php echo $contact_tel; ?></p>
					<p>Charity number: <?php echo $charity_number; ?></p>
				</div>
			</div>
		</div>
	</div>	
</section>	