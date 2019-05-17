<?php
/**
 * Displays header site branding
 *
 * @subpackage nidavellir
 */
?>
<div class="site-branding">

<?php if ( has_custom_logo() ) : ?>
        <div class="site-logo"><?php the_custom_logo(); ?></div>
      <?php endif; ?>

      <?php $nidavellir_blog_info = get_bloginfo( 'name' ); ?>

      <?php if ( ! empty( $nidavellir_blog_info ) ) : ?>

          <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( $nidavellir_blog_info ); ?></a></h1>

      <?php endif; ?>

      <?php
        $nidavellir_description = get_bloginfo( 'description', 'display' );
        if ( $nidavellir_description || is_customize_preview() ) :
      ?>
      
      <p class="site-description"><?php echo esc_html( $nidavellir_description ); /* WPCS: xss ok. */ ?></p>

      <?php endif; ?>
    
</div>