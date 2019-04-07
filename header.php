<?php
/**
 * Theme header
 *
 * @package exodus
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

<div class="container">

    <header id="site-header">

      <h1 class="site-title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
      </h1>
      <?php
        $nidavellir_description = get_bloginfo( 'description', 'display' );
        if ( $nidavellir_description || is_customize_preview() ) :
      ?>
      
      <p class="site-description"><?php echo esc_html( $nidavellir_description ); /* WPCS: xss ok. */ ?></p>

      <?php endif; ?>
    
    </header>

    <nav id="site-navigation">

      <?php
        wp_nav_menu( array(
          'theme_location' => 'main-menu',
          'menu_id'        => 'primary-menu',
        ) );
      ?>
  
    </nav>

    <main> <!-- start of main content section -->

