<?php
/**
 * Displays header site branding
 *
 * @subpackage nidavellir
 * @since 1.0.0
 */
?>
<div class="site-branding">

<?php if ( has_custom_logo() ) : ?>
        <div class="site-logo"><?php the_custom_logo(); ?></div>
      <?php endif; ?>

      <?php $blog_info = get_bloginfo( 'name' ); ?>

      <?php if ( ! empty( $blog_info ) ) : ?>

          <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

      <?php endif; ?>

      <?php
        $nidavellir_description = get_bloginfo( 'description', 'display' );
        if ( $nidavellir_description || is_customize_preview() ) :
      ?>
      
      <p class="site-description"><?php echo esc_html( $nidavellir_description ); /* WPCS: xss ok. */ ?></p>

      <?php endif; ?>
    
</div>