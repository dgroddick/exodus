<?php
/**
 * Archive page template
 *
 * @package nidavellir
 */

get_header();
?>
<article>
<?php if ( have_posts() ) : ?>
	<div class="page-header">
	<?php
	the_archive_title( '<h1 class="page-title">', '</h1>' );
	the_archive_description( '<div class="archive-description">', '</div>' );
	?>
</div>
	<?php
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_type() );
	}
	the_posts_navigation();
else :
	get_template_part( 'template-parts/content', 'none' );
endif;
?>
</article>
<?php
get_footer();
