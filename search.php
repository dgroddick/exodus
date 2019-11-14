<?php
/**
 * Search results template
 *
 * @package nidavellir
 */

get_header();
?>
<article>
<?php
if ( have_posts() ) :
	?>
	<header class="page-header">
		<h2 class="page-title">
			<?php
			/* translators: %s: search query. */
			printf( esc_html__( 'Search Results for: %s', 'nidavellir' ), '<span>' . get_search_query() . '</span>' );
			?>
		</h2>
	</header>
	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', 'search' );
	endwhile;
	the_posts_navigation();

else :
	get_template_part( 'template-parts/content', 'none' );
endif;
?>
</article>
<?php
get_footer();
