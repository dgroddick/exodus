<?php
/**
 * Theme header
 *
 * @package exodus
 *
 */
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header id="site-header">
  <h1><a href="<?php echo site_url(); ?>"><?php bloginfo('sitename'); ?></a></h1>
</header>

<div id="site-container" class="site">

