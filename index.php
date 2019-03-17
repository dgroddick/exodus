<?php
/**
 * The main theme template
 *
 * @package exodus
 */
get_header();
?>

<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>

<div class="main">

	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

	<?php the_post_thumbnail( 'thumbnail' ); ?>
	<?php the_excerpt(); ?>

</div>
<?php endwhile; else: ?>
    <?php _e( 'Sorry, nothing matched your criteria.', 'exodus' ); ?>
<?php endif; ?>

<?php
get_footer();
