<?php
/**
 * Template part for displaying results in search pages
 *
 * @package nidavellir
 */

?>
<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php nidavellir_posted_on(); ?>
		</div>
		<?php endif; ?>
	</div>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>
</section><!-- #post-<?php the_ID(); ?> -->
