<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package nidavellir
 */

?>
<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>

	<div class="page-content">
	<?php
	if ( the_post_thumbnail() ) {
		the_post_thumbnail();
	}
	the_content();
	wp_link_pages(
		array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nidavellir' ),
			'after'  => '</div>',
		)
	);
	?>
	</div>
</section>
