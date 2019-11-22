<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ftf_starter
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
		    <a class="footer-logo" href="/">
		    	<?php 
				$footer_logo = get_field('footer_logo','option');
				if( !empty( $footer_logo ) ): ?>
				    <img src="<?php echo esc_url($footer_logo['url']); ?>" width="200" alt="<?php echo esc_attr($footer_logo['alt']); ?>" />
				<?php endif; ?>
		    </a>

		    <div class="footer-menu">
		        <ul>
		            <?php if( have_rows('footer_menu', 'option') ): ?>
						<?php while( have_rows('footer_menu', 'option') ): the_row();  ?>
							<li>
								<a href="<?php the_sub_field('url') ?>"><?php the_sub_field('text') ?></a>
							</li>
						<?php endwhile; ?>
					<?php endif; ?>
		        </ul>
		    </div>

		    <div class="footer-copy">
		    	<?php the_field('footer_copyright', 'option') ?>
		    </div>
	    </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
