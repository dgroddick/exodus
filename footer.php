<?php
/**
 * Template for the footer
 *
 * @package exodus
 */
?>
    </main>

    <aside>
      <?php get_template_part( 'template-parts/footer', 'widgets' ); ?>
    </aside>

    <footer>
      <p>Theme Developed by: 
        <a href="<?php echo esc_url( __( 'https://www.davidroddick.com', 'exodus' ) ); ?>" 
          title="<?php esc_attr_e( 'David Roddick', 'exodus' ); ?>"><strong>
          <?php printf( __( 'David Roddick %s', 'exodus' ),''); ?></strong></a>
      <p>
      <?php wp_footer(); ?>
    </footer>

  </div> <!-- container -->
</body>
</html>
