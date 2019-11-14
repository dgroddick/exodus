<?php
/**
 * Template part for displaying posts
 *
 * @package nidavellir
 */

?>
<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h2 class="entry-title">', '</h2>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				nidavellir_posted_on();
				nidavellir_posted_by();
				?>
			</div>
		<?php endif; ?>
	</header><!-- post-header -->
	<div class="post-content">
		<?php
		if ( the_post_thumbnail() ) {
			the_post_thumbnail();
		}
		the_content(
			sprintf(
				wp_kses( /* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'nidavellir' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nidavellir' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- post-content -->
</section>
