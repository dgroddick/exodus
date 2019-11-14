<?php
/**
 * The main theme template
 *
 * @package nidavellir
 */

get_header();
?>
<article role="article">
<?php
if ( have_posts() ) :
	if ( is_home() && ! is_front_page() ) :
		?>
		<header id="title">
			<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
		</header>
		<?php
	endif;

	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );

	endwhile;

	the_posts_navigation();
else :
	get_template_part( 'template-parts/content', 'none' );
endif;
?>
</article>
<?php
get_footer();
