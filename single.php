<?php
/**
 * The Post template
 *
 * @package exodus
 */
get_header();
?>

<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

    <?php
    if ( 'post' === get_post_type() ) :
    ?>
    <div class="entry-meta">
        <?php
        exodus_posted_on();
        exodus_posted_by();
        ?>
    </div><!-- .entry-meta -->
    <?php endif; ?>

    <?php the_post_thumbnail( 'medium_large' ); ?>
    <?php the_content(); ?>

    <?php
    wp_link_pages( array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'exodus' ),
        'after'  => '</div>',
    ) );
	?>

    <?php
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
    ?>

</div> <!-- post -->

<?php endwhile; else: ?>
    <?php _e( 'Sorry, no posts matched your criteria.', 'exodus' ); ?>
<?php endif; ?>

<?php
get_footer();
