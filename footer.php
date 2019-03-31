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
      <div class="site-info">
        <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'exodus' ) ); ?>">
          <?php
          /* translators: %s: CMS name, i.e. WordPress. */
          printf( esc_html__( 'Proudly powered by %s', 'exodus' ), 'WordPress' );
          ?>
        </a>
        <span class="sep"> | </span>
          <?php
          /* translators: 1: Theme name, 2: Theme author. */
          printf( esc_html__( 'Theme: %1$s by %2$s.', 'exodus' ), 'exodus', 
                              '<a href="https://davidroddick.com/">David Roddick</a>' );
          ?>
      </div><!-- .site-info -->

      <?php wp_footer(); ?>
    </footer>

  </div> <!-- container -->
</body>
</html>
