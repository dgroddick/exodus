<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package exodus
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="page-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</div>

	<?php the_post_thumbnail(); ?>

	<div class="page-content">
		<?php
		the_content();
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'exodus' ),
			'after'  => '</div>',
		) );
		?>
	</div>

</article>