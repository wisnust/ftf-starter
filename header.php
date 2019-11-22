<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ftf_starter
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ftf_starter' ); ?></a>

	<header id="masthead" class="site-header">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		    <a class="navbar-brand" href="/">
		    	<?php 
				$header_logo = get_field('header_logo','option');
				if( !empty( $header_logo ) ): ?>
				    <img src="<?php echo esc_url($header_logo['url']); ?>" alt="<?php echo esc_attr($header_logo['alt']); ?>" />
				<?php endif; ?>
		    </a>
		    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		        <span class="navbar-toggler-icon"></span>
		    </button>

		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		        <ul class="navbar-nav mr-auto">
		            <?php if( have_rows('header_menu', 'option') ): ?>
						<?php while( have_rows('header_menu', 'option') ): the_row();  ?>
							<li class="nav-item">
								<a class="nav-link" href="<?php the_sub_field('url') ?>"><?php the_sub_field('text') ?></a>
							</li>
						<?php endwhile; ?>
					<?php endif; ?>

		        </ul>
	            <?php if( have_rows('header_cta', 'option') ): ?>
					<?php while( have_rows('header_cta', 'option') ): the_row();  ?>
			   			<a href="<?php the_sub_field('url') ?>" class="btn btn-primary"><?php the_sub_field('text') ?></a>
					<?php endwhile; ?>
				<?php endif; ?>

		    </div>
		</nav>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
