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
				<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
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
