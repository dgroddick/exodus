<?php
/**
 * Displays the footer widget area
 *
 * @package nidavellir
 */

if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<aside id="widget" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'nidavellir' ); ?>">
		<?php
		if ( is_active_sidebar( 'sidebar-1' ) ) :
			?>
			<div class="widget-column footer-widget-1">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div>
		<?php endif; ?>
	</aside>
<?php endif; ?>
