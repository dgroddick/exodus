<?php
/**
 * Theme header
 *
 * @package exodus
 *
 */
?>
<!DOCTYPE html <?php language_attributes(); ?>>
<html>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header id="site-header">
  <div class="site-branding">

      <h1 class="site-title">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
      </h1>
  <?php
    $exodus_description = get_bloginfo( 'description', 'display' );
    if ( $exodus_description || is_customize_preview() ) :
  ?>
    <p class="site-description"><?php echo $exodus_description; /* WPCS: xss ok. */ ?></p>
  <?php endif; ?>
  </div><!-- .site-branding -->

  <nav id="site-navigation" class="main-navigation">
    <?php
      wp_nav_menu( array(
        'theme_location' => 'main-menu',
        'menu_id'        => 'primary-menu',
      ) );
    ?>
  </nav> <!-- site-navigation -->
</header> <!-- site header -->

<div id="site-container" class="site">

