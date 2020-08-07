<?php
/**
 * Theme header
 *
 * @package nidavellir
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
  <style type="text/css">
	a:hover { background: <?php echo esc_html( get_theme_mod( 'nidavellir_hover_color', '#FFFF00' ) ); ?>; }
</style>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<div id="container" class="<?php echo apply_filters( 'nidavellir_change_layout', 'layout-left' ); ?>">

    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'nidavellir' ); ?></a>

    <header id="masthead" class="site-header" role="banner">
		<div class="site-branding">

			<?php if ( get_header_image() ) : ?>
			<div id="site-header-image">
				<img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
			</div>
			<style type="text/css">
			#site-header-image > img {
				max-width: 100%;
				width: 100vw;
			}

			.site-title {
				position: absolute;
				top: 30%;
				left: 50%;
				transform: translate(-50%, -50%);
			}

			.site-description {
				position: absolute;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
			}
			</style>
			<?php endif; ?>
			
			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="color: <?php echo esc_html( get_theme_mod( 'nidavellir_header_textcolor', '#000000' ) ); ?>;"><?php bloginfo( 'name' ); ?></a>
			</h1>

			<?php
				$nidavellir_description = get_bloginfo( 'description', 'display' );
				if ( $nidavellir_description || is_customize_preview() ) :
					?>
					<p class="site-description" style="color: <?php echo esc_html( get_theme_mod( 'nidavellir_header_textcolor', '#000000' ) ); ?>;"><?php echo $nidavellir_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>

			

		</div> <!-- site-branding -->
	</header>

    <nav id="site-navigation" role="navigation">
      <?php
      wp_nav_menu( array(
        'theme_location' => 'main-menu',
      ) );
      ?>
    </nav>

	<main id="content" role="main"> <!-- start of main content section -->
