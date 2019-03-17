<?php
/**
 * The Page template
 *
 * @package exodus
 */
get_header();
?>

<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>

<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
<?php the_post_thumbnail( 'medium_large' ); ?>
<?php the_content(); ?>
<?php endwhile; else: ?>
    <?php _e( 'Sorry, no pages matched your criteria.', 'exodus' ); ?>
<?php endif; ?>

<?php
get_footer();
