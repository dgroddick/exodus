<?php
/**
 * Template for the footer
 *
 * @package exodus
 */
?>
</div><!-- site container -->

<footer id="site-footer">
  <div class="site-info">
    <p>Theme Developed by: <a href="<?php echo esc_url( __( 'https://www.davidroddick.com', 'exodus' ) ); ?>" 
                        title="<?php esc_attr_e( 'David Roddick', 'exodus' ); ?>"><strong>
                        <?php printf( __( 'David Roddick %s', 'exodus' ),''); ?></strong></a><p>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
