<?php
/**
 * Displays header site branding
 *
 * @package nidavellir
 */

?>
<div class="site-branding">

<?php if ( has_custom_logo() ) : ?>
<div class="site-logo"><?php the_custom_logo(); ?></div>
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
