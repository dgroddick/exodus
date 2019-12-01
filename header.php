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
</head>
<body <?php body_class(); ?>>

	<div id="container" class="<?php echo apply_filters( 'nidavellir_change_layout', 'layout-left' ); ?>">

    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'nidavellir' ); ?></a>

    <header id="masthead" class="site-header" role="banner">

		<div class="site-branding">
			<?php if ( has_custom_logo() ) : ?>
			<div class="site-logo"><?php the_custom_logo(); ?></div>
			<?php endif; ?>

			<?php if ( get_header_image() ) : ?>
			<div id="site-header-image">
				<img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
			</div>
			<style type="text/css">
			.site-title {
				font-size:4vw;
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

			<?php if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$nidavellir_description = get_bloginfo( 'description', 'display' );
				if ( $nidavellir_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $nidavellir_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>

		</div> <!-- site-branding -->
	</header>

    <nav id="site-navigation" role="navigation">
      <?php
      wp_nav_menu( array(
        'theme_location' => 'main-menu',
        'menu_id'        => 'primary-menu',
      ) );
      ?>
    </nav>

    <main id="content" role="main"> <!-- start of main content section -->
