<?php
$slides = get_field('hp_banner_slides', 'options');	
$strap_line = get_field('website_strap_line', 'options');	
//echo '<pre>';print_r($slides);echo '</pre>';
?>
<div class="banner-hp" style="background-image: url(<?php echo $slides[0]['bg_img']; ?>)">
	<div class="caption">
		 <h3><?php echo $slides[0]['title']; ?></h3>
		 <p><?php echo $slides[0]['txt']; ?></p>
	</div>
</div>

<h1 class="strap-line"><?php echo $strap_line; ?></h1>