	<?php get_template_part( 'parts/global/support', 'box' ); ?>
	
	</div><!-- .content-area -->
			
	<footer id="colophon" class="site-footer text-center" role="contentinfo">
	<?php
	$copyright = get_field('copyright_notice', 'options');	
	?>	
		<div class="copyright"><span>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> - <?php echo $copyright; ?></span></div>
	</footer><!-- #colophon -->
	
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
