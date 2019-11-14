<?php
/**
 * The template for displaying comments
 *
 * @package nidavellir
 */

if ( post_password_required() ) {
	return;
}
?>
<section id="comments" class="comments-area">
	<?php
	if ( have_comments() ) :
		?>
		<h3 class="comments-title">
			<?php
			$nidavellir_comment_count = get_comments_number();
			if ( '1' === $nidavellir_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'nidavellir' ),
					'<span>' . esc_html( get_the_title() ) . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $nidavellir_comment_count, 'comments title', 'nidavellir' ) ),
					esc_html( number_format_i18n( $nidavellir_comment_count ) ),
					'<span>' . esc_html( get_the_title() ) . '</span>'
				);
			}
			?>
		</h3>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
				)
			);
			?>
		</ol>

		<?php
		the_comments_navigation();

		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'nidavellir' ); ?></p>
			<?php
		endif;

	endif;

	comment_form();
	?>
</section>
