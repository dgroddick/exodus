<?php
/**
 * The Page template
 *
 * @package nidavellir
 */

get_header();
?>
<article role="article">
<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', 'page' );
	}
} else {
	esc_html_e( 'Sorry, no posts matched your criteria.', 'nidavellir' );
}
?>
</article>
<?php
get_footer();
