<?php
/**
 * Theme header
 *
 * @package exodus
 *
 */
?>
<!DOCTYPE html>
<html <?php langauge_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
  <header id="masthead" class="site-header">
    <div class="site-branding">
      <?php
      the_custom_logo();
      if ( is_front_page() && is_home() ): ?>
        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
      <?php else: ?>
        <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
      <?php endif;

      $description = get_bloginfo('description', 'display');
      if ($description || is_customize_preview()): ?>
        <p class="site-description"><?php echo $description; ?></p>
      <?php 
      endif; 
      ?>
    </div>

    <nav id="site-navigation" class-"main-navigation">
      <?php
      wp_nav_menu(array(
        'theme_location' => 'main-menu',
        'menu_id' => 'primary_menu',
      ));
      ?>
    </nav>
  </header>
