<?php
/**
 * Archive page template
 *
 * @package exodus
 */
get_header();
?>

    <?php if ( have_posts() ) : ?>

        <div class="page-header">
            <?php
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="archive-description">', '</div>' );
            ?>
        </div><!-- .page-header -->

        <?php
        while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/content', get_post_type() );
            
        endwhile;
        the_posts_navigation();
    else :
        get_template_part( 'template-parts/content', 'none' );
    endif;
    ?>
<?php
get_sidebar();
get_footer();