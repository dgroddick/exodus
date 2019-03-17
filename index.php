<?php
/**
 * The main theme template
 *
 * @package exodus
 */
get_header();
?>

<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>

<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
<?php the_post_thumbnail( 'thumbnail' ); ?>
<?php the_excerpt(); ?>
<?php endwhile; else: ?>
    <?php _e( 'Sorry, nothing matched your criteria.', 'textdomain' ); ?>
<?php endif; ?>

<?php
get_footer();
