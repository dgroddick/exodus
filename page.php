<?php
/**
 * The Page template
 *
 * @package exodus
 */
get_header();
?>

<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

    <?php the_post_thumbnail( 'medium_large' ); ?>
    <?php the_content(); ?>

</div>

<?php endwhile; else: ?>
    <?php esc_html_e( 'Sorry, no pages matched your criteria.', 'exodus' ); ?>
<?php endif; ?>

<?php
get_footer();
