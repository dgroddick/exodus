<?php
/**
 * The Page template
 *
 * @package exodus
 */
get_header();

if ( have_posts() ) {
    while ( have_posts() ) { the_post();

        get_template_part( 'template-parts/content', 'page' );
        
        if ( comments_open() || get_comments_number() ) {
            comments_template();
        }
    }
}
else {
    esc_html_e( 'Sorry, no posts matched your criteria.', 'exodus' );
}


get_footer();
