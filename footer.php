<?php
/**
 * Template for the footer
 *
 * @package nidavellir
 */

?>
</main><!-- content -->

<?php get_sidebar(); ?>

<footer id="site-footer" role="contentinfo">
	<div class="site-info">
		<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'nidavellir' ) ); ?>">
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf( esc_html__( 'Proudly powered by %s', 'nidavellir' ), 'WordPress' );
			?>
		</a>
<span class="sep"> | </span>
<?php
/* translators: 1: Theme name, 2: Theme author. */
printf( esc_html__( 'Theme: %1$s by %2$s.', 'nidavellir' ), 'nidavellir',  '<a href="https://davidroddick.com/">David Roddick</a>' );
?>
</div>
</footer>
	</div> <!-- container -->
	<?php wp_footer(); ?>
</body>
</html>
